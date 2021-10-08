<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 小虎哥 <1105415366@qq.com>
 * Date: 2018-06-28
 */

namespace weapp\Messages\controller;

use think\Page;
use think\Db;
use app\common\controller\Weapp;
use weapp\Messages\model\MessagesModel;
/**
 * 插件的控制器
 */
class Messages extends Weapp
{
	/**
     * 实例化模型
     */
    private $model;

    /**
     * 实例化对象
     */
    private $db;

	/**
     * 插件基本信息
     */
    private $weappInfo;
	
    /**
     * 构造方法
     */
    public function __construct(){
        parent::__construct();
        $this->db = Db::name('WeappMessages');
		$this->dbread = Db::name('WeappMessagesRead');
		
		$this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);

    }

	/**
     * 插件安装的前置操作
     * @return [type] [description]
     */
    public function beforeInstall()
    {
        Db::name('users_menu')->where(['mca'=>'user/Messages/index'])->delete();
    }

    /**
     * 插件安装的后置操作
     * @return [type] [description]
     */
    public function afterInstall()
    {
        $result = Db::name('users_menu')->where(['mca'=>'user/Messages/index'])->find();
        if (empty($result)) {
            $data = [
                'title' => '站内通知',
                'mca'   => 'user/Messages/index',
                'sort_order'    => 100,
                'status'    => 1,
                'lang'  => $this->admin_lang,
                'add_time'  => getTime(),
            ];
            Db::name('users_menu')->save($data);
        }
        
        // 系统默认是自动调用，这里在安装完插件之后，更改为手工调用
        $savedata = [
            'tag_weapp' => 2,
            'update_time'   => getTime(),
        ];
        Db::name('weapp')->where(['code'=>'Messages'])->update($savedata);

        // 拷贝模板文件
        $this->recurse_copy(WEAPP_PATH.'Messages'.DS.'backup'.DS.'tpl', rtrim(ROOT_PATH, DS));
    }

    /**
     * 插件卸载的后置操作
     * @return [type] [description]
     */
    public function afterUninstall()
    {
        Db::name('users_menu')->where(['mca'=>'user/Messages/index'])->delete();
    }

    /**
     * 插件启用的后置操作（可无）
     * @return [type] [description]
     */
    public function afterEnable()
    {
        Db::name('users_menu')->where(['mca'=>'user/Messages/index'])->update([
            'status'    => 1,
            'update_time'   => getTime(),
        ]);
    }

    /**
     * 插件禁用的后置操作（可无）
     * @return [type] [description]
     */
    public function afterDisable()
    {
        Db::name('users_menu')->where(['mca'=>'user/Messages/index'])->update([
            'status'    => 0,
            'update_time'   => getTime(),
        ]);
    }
	
    /**
     * 插件使用指南
     */
    public function doc(){
        return $this->fetch('doc');
    }

    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
        $list = array();
        $keywords = input('keywords/s');

        $map = array();
        if (!empty($keywords)) {
            $map['title'] = array('LIKE', "%{$keywords}%");
        }

        $count = $this->db->where($map)->count('id');// 查询满足要求的总记录数
        $pageObj = new Page($count, config('paginate.list_rows'));// 实例化分页类 传入总记录数和每页显示的记录数
        $list = $this->db->where($map)->order('id desc')->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
        $pageStr = $pageObj->show(); // 分页显示输出
        $this->assign('list', $list); // 赋值数据集
        $this->assign('pageStr', $pageStr); // 赋值分页输出
        $this->assign('pageObj', $pageObj); // 赋值分页对象

        return $this->fetch('index');
    }

    /**
     * 插件后台管理 - 新增
     */
    public function add()
    {
        if (IS_POST) {
            $post = input('post.');

            /*组装存储数据*/
            $nowData = array(
                'add_time'    => getTime(),
                'update_time'    => getTime(),
            );
            $saveData = array_merge($post, $nowData);
            /*--end*/
			$this->db->insert($saveData);
            $insertId = $this->db->getLastInsID();
			
			$users_id = input('post.users_id/s');
            $messages = explode(",", $users_id);
			$messages = array_filter($messages);//去除数组空值

			$logData = $nowData = [];

			foreach ($messages as $key => $val) {
				if(!trim($val) !== '')
                {
				$AddData[] = array(
				    'users_id'  => $val,
			        'id'  => $insertId,
                    'add_time'    => getTime(),
                    'update_time'    => getTime(),
                );
				$logData[] = $val;
				}
			}
			$res = Db::name('weapp_messages_read')->insertAll($AddData);

            if (false !== $insertId) {
                adminLog('新增'.$this->weappInfo['name'].'：'.$post['users_id']); // 写入操作日志
                $this->success("操作成功", weapp_url('Messages/Messages/index'));
            }else{
                $this->error("操作失败");
            }
            exit;
        }

		$listname = Db::name('users')->order('users_id desc')->field('username')->select();
		$this->assign('listname', $listname);
        return $this->fetch('add');
    }
    
    /**
     * 插件后台管理 - 编辑
     */
    public function edit()
    {
        if (IS_POST) {
            $post = input('post.');
            $post['id'] = eyIntval($post['id']);
            if(!empty($post['id'])){

                /*组装存储数据*/
                $nowData = array(
                    'typeid'    => empty($post['typeid']) ? 1 : $post['typeid'],
                    'url'    => trim($post['url']),
                    'add_time'    => getTime(),
                );
                $saveData = array_merge($post, $nowData);
                /*--end*/

                $r = $this->db->where(array('id'=>$post['id']))->update($saveData);
                if ($r) {
                    adminLog('编辑'.$this->weappInfo['name'].'：'.$post['title']); // 写入操作日志
                    $this->success("操作成功!", weapp_url('Messages/Messages/index'));
                }
            }
            $this->error("操作失败!");
        }

        $id = input('id/d', 0);
        $row = $this->db->find($id);
        if (empty($row)) {
            $this->error('数据不存在，请联系管理员！');
            exit;
        }
        $listname = Db::name('users')->order('users_id desc')->field('username')->select();
		$this->assign('listname', $listname);

        $this->assign('row',$row);

        return $this->fetch('edit');
    }
    
    /**
     * 删除文档
     */
    public function del()
    {
        $id_arr = input('del_id/a');
        $id_arr = eyIntval($id_arr);
        if(!empty($id_arr) && IS_POST){
            $result = $this->db->where("id",'IN',$id_arr)->select();
            $title_list = get_arr_column($result, 'title');

            $r = $this->db->where("id",'IN',$id_arr)->delete();
            if($r){
                adminLog('删除'.$this->weappInfo['name'].'：'.implode(',', $title_list));
                $this->success("操作成功!");
            }else{
                $this->error("操作失败!");
            }
        }else{
            $this->error("参数有误!");
        }
    }
	/**
     * 自定义函数递归的复制带有多级子目录的目录
     * 递归复制文件夹
     *
     * @param string $src 原目录
     * @param string $dst 复制到的目录
     * @return string
     */                        
    //参数说明：            
    //自定义函数递归的复制带有多级子目录的目录
    private function recurse_copy($src, $dst)
    {
        $planPath_pc = "template/".TPL_THEME."pc/";
        $planPath_m = "template/".TPL_THEME."mobile/";
        $dir = opendir($src);

        /*pc和mobile目录存在的情况下，才拷贝会员模板到相应的pc或mobile里*/
        $dst_tmp = str_replace('\\', '/', $dst);
        $dst_tmp = rtrim($dst_tmp, '/').'/';
        if (stristr($dst_tmp, $planPath_pc) && file_exists($planPath_pc)) {
            tp_mkdir($dst);
        } else if (stristr($dst_tmp, $planPath_m) && file_exists($planPath_m)) {
            tp_mkdir($dst);
        }
        /*--end*/

        while (false !== $file = readdir($dir)) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $needle = '/template/'.TPL_THEME;
                    $needle = rtrim($needle, '/');
                    $dstfile = $dst . '/' . $file;
                    if (!stristr($dstfile, $needle)) {
                        $dstfile = str_replace('/template', $needle, $dstfile);
                    }
                    $this->recurse_copy($src . '/' . $file, $dstfile);
                }
                else {
                    if (file_exists($src . DIRECTORY_SEPARATOR . $file)) {
                        /*pc和mobile目录存在的情况下，才拷贝会员模板到相应的pc或mobile里*/
                        $rs = true;
                        $src_tmp = str_replace('\\', '/', $src . DIRECTORY_SEPARATOR . $file);
                        if (stristr($src_tmp, $planPath_pc) && !file_exists($planPath_pc)) {
                            continue;
                        } else if (stristr($src_tmp, $planPath_m) && !file_exists($planPath_m)) {
                            continue;
                        }
                        /*--end*/
                        $rs = @copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                        if($rs) {
                            // @unlink($src . DIRECTORY_SEPARATOR . $file);
                        }
                    }
                }
            }
        }
        closedir($dir);
    }
}
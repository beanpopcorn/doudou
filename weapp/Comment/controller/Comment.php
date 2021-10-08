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

namespace weapp\Comment\controller;

use think\Page;
use think\Db;
use app\common\controller\Weapp;
use weapp\Comment\logic\CommentLogic;

/**
 * 插件的控制器
 */
class Comment extends Weapp
{
    /**
     * 实例化对象
     */
    private $comment_db;

    /**
     * 实例化业务逻辑对象
     */
    private $logic;

    /**
     * 插件基本信息
     */
    private $weappInfo;

    /**
     * 插件标识
     */
    private $code = 'Comment';

    /**
     * 构造方法
     */
    public function __construct(){
        parent::__construct();
        $this->comment_db = Db::name('WeappComment');
        $this->logic = new CommentLogic;

        /*插件基本信息*/
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/
    }

    /**
     * 插件安装后置操作
     */
    public function afterInstall()
    {
        $this->logic->syn_comment_level();
    }

    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
        $list = array();

        /*查询、搜索条件*/        
        $keywords = input('keywords/s',"");
        $title = input('title',"");
        $username = input('username',"");
        $state = input('state',-1);
        $where = array();
        if (!empty($keywords)) {
            $where['a.content'] = array('LIKE', "%{$keywords}%");
        }
        if($title != ''){
            $title = trim($title);
            $aids = Db::name('archives')->where('title','like',$title)->field('aid')->select();
            $aid = array_column($aids,'aid');
            $where['a.aid'] = array('in', $aid);
        }
        if($username != ''){
            $username = trim($username);
            $where['a.username'] = array('LIKE', "%{$username}%");
        }
        if($state >= 0){
            $state = (int)$state;
            $where['a.is_review'] = array('eq', $state);
        }

        $this->assign('state', $state);
        $this->assign('keywords', $keywords);
        $this->assign('title', $title);
        $this->assign('username', $username);
        /* END */

        /*分页*/
        $count = $this->comment_db->alias('a')->where($where)->count('comment_id');
        $pageObj = new Page($count, config('paginate.list_rows'));
        $pageStr = $pageObj->show();
        $this->assign('pageStr', $pageStr);
        $this->assign('pageObj', $pageObj);
        /* END */

        /*文档评论查询*/
        $list = $this->comment_db->field('a.*, b.nickname')
            ->alias('a')
            ->join('__USERS__ b', 'a.users_id = b.users_id', 'LEFT')
            ->where($where)
            ->order('a.comment_id desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        /* END */

        /*获取有评论的文档数据*/
        $array_new = get_archives_data($list,'aid');
        /* END */

        /*数据处理*/
        foreach ($list as $key => $value) {
            // 访问前台url
            $list[$key]['arcurl'] = get_arcurl($array_new[$value['aid']]);
            //关联文章
            $list[$key]['article'] = $array_new[$value['aid']]['title'];
            // 处理评论者
            if (empty($value['nickname']) && -1 == $value['users_id']) $list[$key]['nickname'] = $value['username'];
            //是否允许会员评论
            if($value['users_id'] > 0){
                $list[$key]['user_comment'] = Db::name("users")->where('users_id',$value['users_id'])->value('is_comment');
            }else{
                $list[$key]['user_comment'] = 1;
            }
            // 内容处理
            $preg = '/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i';
            $value['content'] = htmlspecialchars_decode($value['content']);
            $value['content'] = preg_replace($preg,'[图片]',$value['content']);
            $value['content'] = strip_tags($value['content']);
            $list[$key]['content'] = msubstr($value['content'], 0, 90, true);
        }
        /* END */

        $this->assign('list', $list);

        /*各状态统计*/
        $count1 = $this->comment_db->count();
        $count2 = $this->comment_db->where('is_review',0)->count();
        $count3 = $this->comment_db->where('is_review',1)->count();
        $count_data = [
            'count1'=>$count1,
            'count2'=>$count2,
            'count3'=>$count3,
        ];
        $this->assign('count_data', $count_data);
        /* END */

        return $this->fetch('index');
    }
    
    /**
     * 删除文档
     */
    public function del()
    {
        $id_arr = input('del_id/a');
        $id_arr = eyIntval($id_arr);
        if(!empty($id_arr) && IS_AJAX_POST){
            $r = $this->comment_db->where("comment_id",'IN',$id_arr)->delete();
            if($r){
                $this->success("操作成功!");
            }else{
                $this->error("操作失败!");
            }
        }else{
            $this->error("参数有误!");
        }
    }

    // 批量审核评论
    public function review()
    {
        $comment_ids = input('ids/a');
        $comment_ids = eyIntval($comment_ids);
        if(!empty($comment_ids) && IS_AJAX_POST){
            $UpData = [
                'is_review' => 1,
                'update_time' => getTime(),
            ];
            $r = $this->comment_db->where("comment_id", 'IN', $comment_ids)->update($UpData);
            if($r){
                $this->success("审核成功！");
            }else{
                $this->error("审核失败！");
            }
        }else{
            $this->error("参数有误！");
        }
    }
    
    /**
     * 评论配置
     */
    public function conf()
    {
        // 同步评论级别
        $this->logic->syn_comment_level();

        $list = Db::name('weapp_comment_level')->field('a.*, b.level_name, b.level_value')
            ->alias('a')
            ->join('__USERS_LEVEL__ b', 'a.users_level_id = b.level_id', 'LEFT')
            ->where($where)
            ->order('b.level_value asc, b.level_id asc')
            ->select();
        $this->assign('list',$list);

        // 获取评论其他配置
        $comment = $this->getWeappData();
        $this->assign('comment',$comment);

        return $this->fetch('conf');
    }

    public function setData()
    {
        if (IS_AJAX_POST) {
            $name = input('post.name/s');
            $value = input('post.value/d');
            $data[$name] = $value;
            $saveData = array(
                'data' => serialize($data),
                'update_time' => getTime(),
            );
            $r = Db::name('weapp')->where(array('code' => $this->code))->update($saveData);
            if ($r) {
                adminLog('编辑' . $this->weappInfo['name'] . '成功'); // 写入操作日志
                $this->success("操作成功", weapp_url('Comment/Comment/conf'));
            }
        }
        $this->error('操作失败');
    }
    /**
     * 插件使用指南
     */
    public function doc(){
        return $this->fetch('doc');
    }
    /**
     * 获取数据
     */
    private function getWeappData()
    {
        static $_value = [];
        if (empty($_value[$this->code])) {
            $row = M('weapp')->where('code',$this->code)->find();
            if (!empty($row['data'])) {
                $row['data'] = unserialize($row['data']);
            }
            $_value[$this->code] = $row;
        }

        return $_value[$this->code];
    }

    /**
     * 允许评论
     */
    public function changeComment()
    {
        $users_id = input('users_id');
        $users_id = (int)$users_id;
        if($users_id <= 0){
            $this->error("游客默认都可以评论！");
        }
        $is_comment = Db::name("users")->where('users_id',$users_id)->value('is_comment');
        if($is_comment == 0){
            $new = 1;
        }else{
            $new = 0;
        }
        $res = Db::name("users")->where('users_id',$users_id)->update(['is_comment'=>$new]);
        if($res !== false){
            $this->success("操作成功！");
        }else{
            $this->error("操作失败！");
        }
    }


}
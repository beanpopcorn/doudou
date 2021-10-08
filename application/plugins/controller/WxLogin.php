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
 * Date: 2018-4-3
 */

namespace app\plugins\controller;

use think\Cookie;
use think\Db;
use app\user\model\Users;

class WxLogin extends Base
{
    public $cmsVersion = '';

    /**
     * 构造方法
     */
    public function __construct()
    {
        parent::__construct();
        $this->cmsVersion = getCmsVersion();
    }

    public function _initialize()
    {
        parent::_initialize();
        $this->users_db = Db::name('users');      // 会员数据表

        session('?users_id');

        /*会员ID*/
        $this->users_id = session('?users_id') ? session('users_id') : $this->users_id;
    }

    public function login()
    {
        $status = Db::name('weapp')->where('code', 'WxLogin')->getField('status');
        if ($status != 1) {
            $this->error('请后台启用微信扫码登录插件！');
        } else if (isMobile()) {
            $this->redirect('user/Users/users_select_login');
            exit;
        }

        /*上一个访问页面的URL*/
        $referurl = cookie('referurl');
        if (empty($referurl)) {
            $referurl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : url("user/Users/centre");
            cookie('referurl', $referurl);
        }
        /*end*/

        $fmdo = input('param.fmdo/s');
        if (empty($fmdo) && $this->users_id > 0) {
            $this->redirect('user/Users/centre');
            exit;
        }

        $redirect_uri = $this->request->domain() . $this->root_dir . '/index.php?m=plugins&c=WxLogin&a=callback&lang=' . $this->home_lang;
        $redirect_uri = urlencode($redirect_uri);//该回调需要url编码
        $data         = Db::name('weapp')->where('code', 'WxLogin')->getField('data');
        $data         = unserialize($data);
        $appID        = $data['appid'];
        $scope        = "snsapi_login";//写死，微信暂时只支持这个值
        //准备向微信发请求
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid=" . $appID . "&redirect_uri=" . $redirect_uri
            . "&response_type=code&scope=" . $scope . "&state=STATE#wechat_redirect";
        $this->redirect($url);
        exit;
    }

    public function callback()
    {
        $data   = Db::name('weapp')->where('code', 'WxLogin')->getField('data');
        $data   = unserialize($data);
        $appid  = $data['appid'];
        $secret = $data['secret'];
        //这个值决定了是自动生成用户还是弹出页面让用户选择绑定 1-用户可选择绑定或注册 0-自动生成用户
        $bind = $data['bind'];
        $code   = input('param.code/s');
        if (!empty($code))  //有code
        {
            //通过code获得 access_token + openid
            $url         = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid
                . "&secret=" . $secret . "&code=" . $code . "&grant_type=authorization_code";
            $jsonResult  = httpRequest($url);
            $resultArray = json_decode($jsonResult, true);
            if (!empty($resultArray['errcode'])) {
                $this->error($resultArray['errmsg']);
            }
            $access_token = $resultArray["access_token"];
            $openid       = $resultArray["openid"];
            $unionid      = $resultArray["unionid"];

            //通过access_token + openid 获得用户所有信息,结果全部存储在$infoArray里
            $infoUrl    = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $access_token . "&openid=" . $openid;
            $infoResult = httpRequest($infoUrl);
            $infoArray  = json_decode($infoResult, true);
            $nickname = filterNickname($infoArray['nickname']);

            if (!empty($infoArray['errcode'])) {
                $this->error($infoArray['errmsg']);
            }
            //先在主表判断unionid是否存在,如果已经存在则直接绑定
            $uni_user = [];
            if ($this->cmsVersion >= 'v1.5.5') {
                $uni_user = Db::name('users')->where('union_id', $unionid)->find();
            }
            //判断插件微信用户表是否存在该用户unionid
            $we_user = Db::name('weapp_wxlogin')->where('unionid', $unionid)->field('users_id,sta')->find();
            if (!empty($uni_user['users_id']) && empty($we_user)){
                //微信用户信息存在表里
                Db::name('weapp_wxlogin')->insert([
                    'users_id' => $uni_user['users_id'],
                    'headimgurl' => $infoArray['headimgurl'],
                    'openid'     => $openid,
                    'unionid'    => $unionid,
                    'nickname'   => $nickname,
                    'add_time'   => getTime(),
                ]);
                $users = $uni_user;
            }else{
                if (1 == $bind) {
                    //自行选择注册或者绑定
                    if (empty($we_user)) {
                        //微信用户信息存在表里
                        Db::name('weapp_wxlogin')->insert([
                            'headimgurl' => $infoArray['headimgurl'],
                            'openid'     => $openid,
                            'unionid'    => $unionid,
                            'nickname'   => $nickname,
                            'add_time'   => getTime(),
                        ]);
                        if (1 == config('global.opencodetype')) { // 特定场景专用
                            if (empty($this->users_id)) {
                                $this->redirect(url('plugins/WxLogin/bind', ['wxid' => $unionid]));
                            } else {
                                $this->redirect(url('plugins/WxLogin/bind_user', ['wxid' => $unionid]));
                            }
                        } else {
                            $this->redirect(url('plugins/WxLogin/bind', ['wxid' => $unionid]));
                        }
                    } else {
                        if (1 == config('global.opencodetype')) { // 特定场景专用
                            if (empty($we_user['sta'])) {
                                if (empty($this->users_id)) {
                                    $this->redirect(url('plugins/WxLogin/bind', ['wxid' => $unionid]));
                                } else {
                                    $this->redirect(url('plugins/WxLogin/bind_user', ['wxid' => $unionid]));
                                }
                            } else{
                                if (empty($this->users_id)) {
                                    $users_id = $we_user['users_id'];
                                } else {
                                    $this->redirect(url('plugins/WxLogin/bind_user', ['wxid' => $unionid]));
                                }
                            }
                        } else {
                            if (empty($we_user['sta'])) {
                                $this->redirect(url('plugins/WxLogin/bind', ['wxid' => $unionid]));
                            } else {
                                $users_id = $we_user['users_id'];
                            }
                        }
                    }

                    $users = $this->users_db->where('users_id',$users_id)->find();
                    if ( empty($users) ) {
                        $this->redirect(url('plugins/WxLogin/bind', ['wxid' => $unionid]));
                    }

                }else{
                    //如果用户不存在  创建新用户
                    if (empty($we_user)) {
                        Db::name('weapp_wxlogin')->insert([
                            'headimgurl' => $infoArray['headimgurl'],
                            'openid'     => $openid,
                            'unionid'    => $unionid,
                            'nickname'   => $nickname,
                            'add_time'   => getTime(),
                        ]);//微信用户信息存在表里
                        $users_id = $this->setReg($unionid, $infoArray);
                        if (!empty($users_id)) {
                            $this->changeUsername($users_id);//修改username为u+users_id格式
                            Db::name('weapp_wxlogin')->where('unionid',$unionid)->update([
                                'users_id' => $users_id,
                                'update_time'   => getTime(),]);
                        }
                    } else {
                        if (!empty($uni_user['users_id']) && $uni_user['users_id'] != $we_user['users_id']) {
                            $users_id = $uni_user['users_id'];
                            Db::name('weapp_wxlogin')->where('unionid',$unionid)->update([
                                'users_id' => $uni_user['users_id'],
                                'update_time'   => getTime(),
                            ]);
                        } else {
                            $users_id = $we_user['users_id'];
                        }
                    }
                    $users = $this->users_db->where([
                        'users_id' => $users_id,
                    ])->find();
                    if (empty($users)) {
                        //如果插件表的users_id=0,或者users_id不等于0,但是users表的数据已经不存在,那么再用union_id查找一下
                        $users_id = $this->findUnion($unionid);
                        if (empty($users_id)){
                            $users_id = $this->setReg($unionid, $infoArray);
                        }
                        if (!empty($users_id)) {
                            $this->changeUsername($users_id);//修改username为u+users_id格式
                            Db::name('weapp_wxlogin')->where('unionid', $unionid)->update([
                                'users_id'    => $users_id,
                                'update_time' => getTime(),
                            ]);
                            $users = $this->users_db->find($users_id);
                        } else {
                            $this->error('用户不存在,登录失败！', url('user/Users/login'));
                        }
                    } else {
                        if (empty($uni_user)) {
                            Db::name('users')->where('users_id', $users_id)->update([
                                'union_id'    => $unionid,
                                'update_time' => getTime(),
                            ]);
                        }
                    }
                }
            }

            if (empty($users['is_activation'])) {
                $this->error('该会员尚未激活，请联系管理员！', url('user/Users/login'));
            }

            // 会员users_id存入session
            model('EyouUsers')->loginAfter($users);

            // 跳转链接
            $referurl = cookie('referurl');
            if (strpos($referurl,'m=plugins&c=WxLogin&a=bind') || stripos($referurl, 'plugins/WxLogin/bind') || (!empty($uni_user['users_id']) && empty($we_user))) {
                $this->redirect(url('user/Users/centre'));
            }
            $this->redirect($referurl);
        }
    }

    /**
     * 注册
     */
    private function setReg($unionid,$infoArray)
    {
        // 生成用户名
        $username = $this->createUsername();
        // 用户昵称
        $nickname = filterNickname($infoArray['nickname']);
        // 创建用户账号
        $addData  = [
            'username'            => $username,//用户名-生成
            'nickname'            => !empty($nickname) ? $nickname : $username,//昵称，同微信用户名
            'level'               => 1,
            'thirdparty'          => 1,
            'open_id'             => $infoArray['openid'],
            'register_place'      => 2,
            'open_level_time'     => getTime(),
            'level_maturity_days' => 0,
            'reg_time'            => getTime(),
            'head_pic'            => !empty($infoArray['headimgurl']) ? $infoArray['headimgurl'] : ROOT_DIR . '/public/static/common/images/dfboy.png',
            'lang'                => $this->home_lang,
            'add_time'            => getTime(),
        ];
        if ($this->cmsVersion >= 'v1.5.5') {
            $addData['union_id'] = $unionid;
        }

        /*特定场景专用*/
        $opencodetype = config('global.opencodetype');
        if (1 == $opencodetype) {
            $origin_mid = cookie('origin_mid');
            if (!empty($origin_mid)) {
                $addData['origin_mid']          = intval($origin_mid);
            }
            $origin_type = cookie('origin_type');
            if (!empty($origin_type)) {
                $addData['origin_type']         = intval($origin_type);
            }
        }
        /*end*/
        
        $users_id = $this->users_db->insertGetId($addData);

        return $users_id;
    }

    /**
     *微信扫码登录绑定/注册账号
     */
    public function bind($wxid)
    {
        $userModel = new \app\user\model\Users();
        if (IS_POST) {
            $post = input('post.');
            $type     = $post['type'];
            $unionid     = $post['wxid'];
            $username     = $post['username'];
            $password     = $post['password'];
            $password2     = $post['password2'];
            $referurl = input('post.referurl/s', url("user/Users/centre"), 'htmlspecialchars_decode');
            
            //用户名查重
            $users_reg_notallow = explode(',', getUsersConfigData('users.users_reg_notallow'));
            if (!empty($users_reg_notallow)) {
                if (in_array($username, $users_reg_notallow)) {
                    $this->error('用户名为系统禁止注册！', null, ['status' => 1]);
                }
            }

            if (empty($username)) {
                $this->error('用户名不能为空！', null, ['status' => 1]);
            } else if (!preg_match("/^[\x{4e00}-\x{9fa5}\w\-\_\@\#]{2,30}$/u", $username)) {
                $this->error('请输入2-30位的汉字、英文、数字、下划线等组合', null, ['status' => 1]);
            }

            if (empty($password)) {
                $this->error('登录密码不能为空！', null, ['status' => 0]);
            }

            if ( 1 == $type && empty($password2)) {
                $this->error('确认密码不能为空！', null, ['status' => 0]);
            }

            if (1 == $type &&!empty($password) && !empty($password2)) {
                if( func_encrypt($password) !== func_encrypt($password2)){
                    $this->error('两次输入密码不相同!', null, ['status' => 4]);
                }
            }

            $info = Db::name('weapp_wxlogin')->where('unionid', $unionid)->find();
            if ( $type == 1 ) {//empty($info['users_id'])
                $count = $this->users_db->where([
                    'username' => $username,
                    'lang'     => $this->home_lang,
                ])->count();
                if (!empty($count)) {
                    $this->error('用户名已存在！', null, ['status' => 1]);
                }

                // 处理会员属性数据
                $ParaData = [];
                if (is_array($post['users_'])) {
                    $ParaData = $post['users_'];
                }
                unset($post['users_']);

                // 处理提交的会员属性中必填项是否为空
                // 必须传入提交的会员属性数组
                $EmptyData = $userModel->isEmpty($ParaData);
                if (!empty($EmptyData)) {
                    $this->error($EmptyData, null, ['status' => 5]);
                }

                // 处理提交的会员属性中邮箱和手机是否已存在
                // IsRequired方法传入的参数有2个
                // 第一个必须传入提交的会员属性数组
                // 第二个users_id，注册时不需要传入，修改时需要传入。
                $RequiredData = $userModel->isRequired($ParaData);
                if (!empty($RequiredData) && !is_array($RequiredData)) {
                    $this->error($RequiredData, null, ['status' => 5]);
                }

                if (!empty($RequiredData['email'])) {
                    // 查询会员输入的邮箱并且为找回密码来源的所有验证码
                    $RecordWhere = [
                        'source'   => 2,
                        'email'    => $RequiredData['email'],
                        'users_id' => 0,
                        'status'   => 0,
                        'lang'     => $this->home_lang,
                    ];
                    $RecordData  = [
                        'status'      => 1,
                        'update_time' => getTime(),
                    ];
                    // 更新数据
                    Db::name('smtp_record')->where($RecordWhere)->update($RecordData);
                }

                if (!empty($RequiredData['mobile'])) {
                    // 查询会员输入的邮箱并且为找回密码来源的所有验证码
                    $RecordWhere = [
                        'source' => 0,
                        'mobile' => $RequiredData['mobile'],
                        'is_use' => 0,
                        'lang'   => $this->home_lang
                    ];
                    $RecordData  = [
                        'is_use' => 1,
                        'update_time' => getTime()
                    ];
                    // 更新数据
                    Db::name('sms_log')->where($RecordWhere)->update($RecordData);
                }

                // 会员设置
                $users_verification = getUsersConfigData('users.users_verification');
                $users_verification = !empty($users_verification) ? $users_verification : 0;

                // 处理判断是否为后台审核，verification=1为后台审核。
                if (1 == $users_verification) $data['is_activation'] = 0;

                // 添加会员到会员表
                $data['username']       = $username;
                $data['nickname']       = !empty($info['nickname']) ? $info['nickname'] : $username;
                $data['password']       = func_encrypt($password);
                $data['is_mobile']      = !empty($ParaData['mobile_1']) ? 1 : 0;
                $data['is_email']       = !empty($ParaData['email_2']) ? 1 : 0;
                $data['last_ip']        = clientIP();
                $data['head_pic']       = !empty($info['headimgurl']) ? $info['headimgurl'] : ROOT_DIR . '/public/static/common/images/dfboy.png';
                $data['reg_time']       = getTime();
                $data['last_login']     = getTime();
                $data['register_place'] = 2;  // 注册位置，后台注册不受注册验证影响，1为后台注册，2为前台注册。
                $data['lang']           = $this->home_lang;
                $data['open_id']       = $info['openid'];
                if ($this->cmsVersion >= 'v1.5.5') {
                    $data['union_id']       = $unionid;
                }

                $level_id      = Db::name('users_level')->where([
                    'is_system' => 1,
                    'lang'      => $this->home_lang,
                ])->getField('level_id');
                $data['level'] = $level_id;

                $users_id = Db::name('users')->add($data);

                // 判断会员是否添加成功
                if (!empty($users_id)) {
                    Db::name('weapp_wxlogin')->where('unionid', $unionid)->update([
                            'users_id'    => $users_id,
                            'sta'         => 1,
                            'update_time' => getTime()
                        ]);
                    // 批量添加会员属性到属性信息表
                    if (!empty($ParaData)) {
                        $betchData    = [];
                        $usersparaRow = Db::name('users_parameter')->where([
                            'lang'      => $this->home_lang,
                            'is_hidden' => 0,
                        ])->getAllWithIndex('name');
                        foreach ($ParaData as $key => $value) {
                            if (preg_match('/(_code|_vertify)$/i', $key)) {
                                continue;
                            }

                            // 若为数组，则拆分成字符串
                            if (is_array($value)) $value = implode(',', $value);
                            
                            $para_id     = intval($usersparaRow[$key]['para_id']);
                            $betchData[] = [
                                'users_id' => $users_id,
                                'para_id'  => $para_id,
                                'info'     => $value,
                                'lang'     => $this->home_lang,
                                'add_time' => getTime(),
                            ];
                        }
                        Db::name('users_list')->insertAll($betchData);
                    }

                    // 查询属性表的手机号码和邮箱地址,拼装数组$UsersListData
                    $UsersListData                = $userModel->getUsersListData('*', $users_id);
                    $UsersListData['login_count'] = 1;
                    $UsersListData['update_time'] = getTime();
                    if (2 == $users_verification) {
                        // 若开启邮箱验证并且通过邮箱验证则绑定到会员
                        $UsersListData['is_email'] = 1;
                    } else if (3 == $users_verification) {
                        // 若开启手机验证并且通过手机验证则绑定到会员
                        $UsersListData['is_mobile'] = 1;
                    }
                    // 同步修改会员信息
                    Db::name('users')->where('users_id', $users_id)->update($UsersListData);
                    $users = Db::name('users')->where('users_id', $users_id)->find();
                    model('EyouUsers')->loginAfter($users);
                    //session('users_id', $users_id);
                    //if (session('users_id')) {
                        //cookie('users_id', $users_id);
                        if (empty($users_verification)) {
                            // 无需审核，直接登陆
                            $this->success('登录成功！', $referurl, ['status' => 2]);
                        } else if (1 == $users_verification) {
                            // 需要后台审核
                            //session('users_id', null);
                            $url = url('user/Users/login');
                            $this->success('注册成功，等管理员激活才能登录！', $url, ['status' => 5]);
                        } else if (2 == $users_verification) {
                            // 注册成功
                            $this->success('登录成功！', $referurl, ['status' => 2]);
                            //$this->success('注册成功，邮箱绑定成功，跳转至会员中心！', $url, ['status' => 0]);
                        } else if (3 == $users_verification) {
                            // 注册成功
                            $this->success('登录成功！', $referurl, ['status' => 2]);
                            //$this->success('注册成功，手机绑定成功，跳转至会员中心！', $url, ['status' => 0]);
                        }
                    /*} else {
                        $url = url('user/Users/login');
                        $this->success('注册成功，请登录！', $url, ['status' => 2]);
                    }*/
                }
                $this->error('注册失败', null, ['status' => 5]);
                
            /*} elseif ($type == 1 && $info['users_id'] > 0) {
                $count = $this->users_db->where([
                    'username' => $username,
                    'lang'     => $this->home_lang,
                ])->count();
                if (!empty($count)) {
                    $this->error('用户名已存在！', null, ['status' => 1]);
                }
                $users_id = $info['users_id'];
                //修改用户名
                $updateData = [
                    'username'    => $username,
                    'password'    => func_encrypt($password),
                    'open_id'             => $info['openid'],
                    'update_time' => getTime(),
                ];
                $res = $this->users_db->where('users_id',$users_id)->update($updateData);
                if ($res) {
                    Db::name('weapp_wxlogin')->where('users_id', $users_id)->update([
                            'sta'         => 1,
                            'update_time' => getTime()
                        ]);
                }*/
            } elseif ($type == 2) {
                //绑定已有账号
                $users = $this->users_db->where([
                    'username' => $username,
                    'is_del'   => 0,
                    'lang'     => $this->home_lang,
                ])->find();
                if ($users) {
                    $users_id = $users['users_id'];
                    //查询账号是否已绑定其他账号
                    $bind_user = Db::name('weapp_wxlogin')->where(['users_id'=> $users_id,'sta'=>1])->find();
                    if (empty($bind_user)) {
                        if (strval($users['password']) === strval(func_encrypt($post['password']))) {
                            Db::name('weapp_wxlogin')->where('unionid', $unionid)->update([
                                'users_id'    => $users_id,
                                'sta'         => 1,
                                'update_time' => getTime()
                            ]);
                            $openid = Db::name('weapp_wxlogin')->where(['unionid'=> $unionid])->value('openid');
                            $saveData = [
                                'open_id'=>$openid,
                                'update_time' => getTime(),
                            ];
                            if ($this->cmsVersion >= 'v1.5.5') {
                                $saveData['union_id'] = $unionid;
                            }
                            Db::name('users')->where(['users_id'=> $users_id])->update($saveData);
                        } else {
                            $this->error('密码不正确！', null, ['status' => 0]);
                        }
                    }else{
                        $this->error('用户名已绑定微信账号！', null, ['status' => 1]);
                    }
                    
                } else {
                    $this->error('用户不存在！', null, ['status' => 1]);
                }
            }
            $users = $this->users_db->where([
                'users_id' => $users_id,
            ])->find();
            if(empty($users)){
                $this->error('用户不存在,登录失败！', '', ['status' => 1]);
            }
            
            if (empty($users['is_activation'])) {
                $this->error('该会员尚未激活，请联系管理员！', url('user/Users/login'), ['status' => 3]);
            }

            // 会员users_id存入session
            model('EyouUsers')->loginAfter($users);

            $this->success('登录成功！', $referurl, ['status' => 2]);
        }
       
        // 默认主题颜色
        $theme_color = getUsersConfigData('theme_color');
        $theme_color = !empty($theme_color) ? $theme_color : '#ff6565'; 

        $this->assign('theme_color', $theme_color);
        $this->assign('wxid', $wxid);
        $usersConfig = getUsersConfigData('users');
        $this->assign('usersConfig', $usersConfig);
        // 会员属性资料信息
        $users_para = $userModel->getDataPara('reg');
        $this->assign('users_para', $users_para);

        $is_mobile = isMobile();
        $this->assign('is_mobile', $is_mobile);

        // 跳转链接
        $referurl = cookie('referurl');
        $this->assign('referurl', $referurl);

        $tpl_file = 'bind.htm';

        $domain = $this->request->rootDomain();
        if ($domain == '5fa.cn') {
            $tpl_file = 'bind_mobile.htm';
        }

        $html = $this->fetch('template/plugins/wxlogin/'.$tpl_file);
        if (isMobile()) {
            $str = <<<EOF
<div id="update_mobile_file" style="display: none;">
    <form id="form1" style="text-align: center;" >
        <input type="button" value="点击上传" onclick="up_f.click();" class="btn btn-primary form-control"/><br>
        <p><input type="file" id="up_f" name="up_f" onchange="MobileHeadPic();" style="display:none"/></p>
    </form>
</div>
</body>
EOF;
            $html = str_ireplace('</body>', $str, $html);
        }
        return $html;
        //return $this->fetch('template/plugins/wxlogin/bind.htm');
    }

     /**
     * 生成用户名，确保唯一性
     */
    public function createUsername($username = '')
    {
        if (empty($username)) {
            $username = 'WX' . get_rand_str(6, 0, 1);
        }
        $username = strtoupper($username);
        $count = $this->users_db->where('username', $username)->count();
        if (!empty($count)) {
            $username = 'WX' . get_rand_str(6, 0, 1);
            return $this->createUsername($username);
        }

        return $username;
    }

    /**
     * 注册绑定手机号码
     */
    public function bind_mobile($wxid)
    {
        $userModel = new \app\user\model\Users();
        if (IS_POST) {
            $post = input('post.');
            $type     = $post['type'];
            $unionid     = $post['wxid'];
            $referurl = input('post.referurl/s', url("user/Users/centre"), 'htmlspecialchars_decode');

            $info = Db::name('weapp_wxlogin')->where('unionid', $unionid)->find();
            if ($type == 1) {//注册

                // 处理会员属性数据
                $ParaData = [];
                if (is_array($post['users_'])) {
                    $ParaData = $post['users_'];
                }
                unset($post['users_']);

                // 处理提交的会员属性中必填项是否为空
                // 必须传入提交的会员属性数组
                $EmptyData = $userModel->isEmpty($ParaData, 'reg', 'array');
                if (!empty($EmptyData)) {
                    if (is_array($EmptyData)) {
                        $this->error($EmptyData['msg'], null, ['status' => 5, 'field'=>$EmptyData['field']]);
                    } else {
                        $this->error($EmptyData, null, ['status' => 5]);
                    }
                }

                // 处理提交的会员属性中邮箱和手机是否已存在
                // IsRequired方法传入的参数有2个
                // 第一个必须传入提交的会员属性数组
                // 第二个users_id，注册时不需要传入，修改时需要传入。
                $RequiredData = $userModel->isRequired($ParaData, 'reg', '', 'array');
                if (!empty($RequiredData)) {
                    if (!is_array($RequiredData)) {
                        $this->error($RequiredData, null, ['status' => 5]);
                    } else if (isset($RequiredData['code_status']) && 0 == $RequiredData['code_status']) {
                        $this->error($RequiredData['msg'], null, ['status' => 5, 'field'=>$RequiredData['field']]);
                    }
                }

                if (!empty($RequiredData['email'])) {
                    // 查询会员输入的邮箱并且为找回密码来源的所有验证码
                    $RecordWhere = [
                        'source'   => 2,
                        'email'    => $RequiredData['email'],
                        'users_id' => 0,
                        'status'   => 0,
                        'lang'     => $this->home_lang,
                    ];
                    $RecordData  = [
                        'status'      => 1,
                        'update_time' => getTime(),
                    ];
                    // 更新数据
                    Db::name('smtp_record')->where($RecordWhere)->update($RecordData);
                }

                if (!empty($RequiredData['mobile'])) {
                    // 查询会员输入的邮箱并且为找回密码来源的所有验证码
                    $RecordWhere = [
                        'source' => 0,
                        'mobile' => $RequiredData['mobile'],
                        'is_use' => 0,
                        'lang'   => $this->home_lang
                    ];
                    $RecordData  = [
                        'is_use' => 1,
                        'update_time' => getTime()
                    ];
                    // 更新数据
                    Db::name('sms_log')->where($RecordWhere)->update($RecordData);
                }

                // 会员设置
                $users_verification = getUsersConfigData('users.users_verification');
                $users_verification = !empty($users_verification) ? $users_verification : 0;

                // 处理判断是否为后台审核，verification=1为后台审核。
                if (1 == $users_verification) $data['is_activation'] = 0;

                if (!empty($info['nickname'])) {
                    $info['nickname'] = filterNickname($info['nickname']);
                }
                $head_pic = !empty($info['headimgurl']) ? $info['headimgurl'] : ROOT_DIR . '/public/static/common/images/dfboy.png';
                // 添加会员到会员表
                if (3 == $users_verification) {
                    $new_username = 'yun'.substr($RequiredData['mobile'], -6);
                } else {
                    $new_username = 'yun'.get_rand_str(8, 0, 2);
                }
                $new_username = rand_username($new_username);
                $data['username']       = !empty($post['username']) ? trim($post['username']) : $new_username;
                $data['nickname']       = !empty($info['nickname']) ? $info['nickname'] : $data['username'];
                $data['is_mobile']      = !empty($ParaData['mobile_1']) ? 1 : 0;
                $data['is_email']       = !empty($ParaData['email_2']) ? 1 : 0;
                $data['last_ip']        = clientIP();
                $data['head_pic']       = $head_pic;
                $data['reg_time']       = getTime();
                $data['last_login']     = getTime();
                $data['register_place'] = 2;  // 注册位置，后台注册不受注册验证影响，1为后台注册，2为前台注册。
                $data['lang']           = $this->home_lang;

                $level_id      = Db::name('users_level')->where([
                    'is_system' => 1,
                    'lang'      => $this->home_lang,
                ])->getField('level_id');
                $data['level'] = $level_id;

                /*特定场景专用*/
                $opencodetype = config('global.opencodetype');
                if (1 == $opencodetype) {
                    $origin_mid = cookie('origin_mid');
                    if (!empty($origin_mid)) {
                        $data['origin_mid']          = intval($origin_mid);
                    }
                    $origin_type = cookie('origin_type');
                    if (!empty($origin_type)) {
                        $data['origin_type']         = intval($origin_type);
                    }
                }
                /*end*/

                $users_id = Db::name('users')->insertGetId($data);
                // 判断会员是否添加成功
                if (!empty($users_id)) {
                    Db::name('weapp_wxlogin')->where('unionid', $unionid)->update([
                        'users_id'    => $users_id,
                        'sta'         => 1,
                        'update_time' => getTime()
                    ]);
                    // 批量添加会员属性到属性信息表
                    if (!empty($ParaData)) {
                        $betchData    = [];
                        $usersparaRow = Db::name('users_parameter')->where([
                            'lang'      => $this->home_lang,
                            'is_hidden' => 0,
                        ])->getAllWithIndex('name');
                        foreach ($ParaData as $key => $value) {
                            if (preg_match('/(_code|_vertify)$/i', $key)) {
                                continue;
                            }

                            // 若为数组，则拆分成字符串
                            if (is_array($value)) $value = implode(',', $value);

                            $para_id     = intval($usersparaRow[$key]['para_id']);
                            $betchData[] = [
                                'users_id' => $users_id,
                                'para_id'  => $para_id,
                                'info'     => $value,
                                'lang'     => $this->home_lang,
                                'add_time' => getTime(),
                            ];
                        }
                        Db::name('users_list')->insertAll($betchData);
                    }

                    // 查询属性表的手机号码和邮箱地址,拼装数组$UsersListData
                    $UsersListData                = $userModel->getUsersListData('*', $users_id);
                    $UsersListData['login_count'] = 1;
                    $UsersListData['update_time'] = getTime();
                    if (2 == $users_verification) {
                        // 若开启邮箱验证并且通过邮箱验证则绑定到会员
                        $UsersListData['is_email'] = 1;
                    } else if (3 == $users_verification) {
                        // 若开启手机验证并且通过手机验证则绑定到会员
                        $UsersListData['is_mobile'] = 1;
                    }
                    // 同步修改会员信息
                    Db::name('users')->where('users_id', $users_id)->update($UsersListData);
                    $users = Db::name('users')->where('users_id', $users_id)->find();
                    model('EyouUsers')->loginAfter($users);

                    cookie('origin_type', null);
                    cookie('origin_mid', null);
                    
                    if (empty($users_verification)) {
                        // 无需审核，直接登陆
                        $this->success('登录成功', $referurl, ['status' => 2]);
                    } else if (1 == $users_verification) {
                        // 需要后台审核
                        $url = url('user/Users/login');
                        $this->success('注册成功，等管理员激活才能登录！', $url, ['status' => 5]);
                    } else if (2 == $users_verification) {
                        // 注册成功
                        $this->success('登录成功，正在跳转中……', $referurl, ['status' => 2]);
                    } else if (3 == $users_verification) {
                        // 注册成功
                        $this->success('登录成功，正在跳转中……', $referurl, ['status' => 2]);
                    }
                }
                $this->error('注册失败', null, ['status' => 5]);
            }
            $users = Db::name('users')->where([
                'users_id' => $users_id,
            ])->find();
            if (empty($users)) {
                $this->error('用户不存在,登录失败！', '', ['status' => 1]);
            }
            //登录
            if (empty($users['is_activation'])) {
                $this->error('该会员尚未激活，请联系管理员！', url('user/Users/login'), ['status' => 3]);
            }

            // 会员users_id存入session
            model('EyouUsers')->loginAfter($users);

            $this->success('登录成功！', $referurl, ['status' => 2]);
        }
    }

    /**
     * 绑定账号
     * @return [type] [description]
     */
    public function bind_user()
    {
        $unionid = input('param.wxid/s');
        $result = Db::name("weapp_wxlogin")->where('unionid', $unionid)->find();
        if (!empty($result)) {
            if (!empty($result['users_id'])) {
                $this->error('当前微信已被绑定，请先解绑！', url('user/Users/info'));
            } else {
                $r = Db::name("weapp_wxlogin")->where([
                    'unionid'    => $unionid,
                    'sta'       => 0,
                ])->update([
                    'users_id'  => $this->users_id,
                    'sta'       => 1,
                    'update_time'   => getTime(),
                ]);
                if ($r !== false) {
                    $saveData = [
                        'open_id'     => $result['openid'],
                        'update_time' => getTime(),
                    ];
                    if ($this->cmsVersion >= 'v1.5.5') {
                        $saveData['union_id'] = $unionid;
                    }
                    Db::name("users")->where('users_id',$this->users_id)->update($saveData);
                    $this->success('微信绑定成功！', url('user/Users/info'));
                }
            }
        }

        $this->error('微信绑定失败！', url('user/Users/info'));
    }

    /**
     * 第三方绑定与解绑
     * @return [type] [description]
     */
    public function bindauth()
    {
        $fmdo = input('param.fmdo/s');
        if ('jiebang' == $fmdo) {
            if (IS_POST) {
                $wxloginInfo = Db::name('weapp_wxlogin')->where(['users_id'=>$this->users_id, 'sta'=>1])->find();
                if (!empty($wxloginInfo)) {
                    $r = Db::name('weapp_wxlogin')->where(['wxuser_id'=>$wxloginInfo['wxuser_id']])->update([
                        'users_id'  => 0,
                        'sta'       => 0,
                        'update_time'   => getTime(),
                    ]);
                    if ($r !== false) {
                        $this->success('解绑成功！');
                    }
                }
            }
            $this->error('解绑失败！');
        }
        // else if ('bangding' == $fmdo) {
        //     $data         = Db::name('weapp')->where('code', 'WxLogin')->getField('data');
        //     $data         = unserialize($data);
        //     $this->assign('data', $data);

        //     $redirect_uri = $this->request->domain() . $this->root_dir . '/index.php?m=plugins&c=WxLogin&a=callback&bangding=1&lang=' . $this->home_lang;
        //     $redirect_uri = urlencode($redirect_uri);//该回调需要url编码
        //     $this->assign('redirect_uri', $redirect_uri);

        //     $state = md5($data['appid'].getTime());
        //     session('weapp_wxlogin_state', $state);
        //     $this->assign('state', $state);

        //     return $this->fetch('template/plugins/wxlogin/bangding.htm');
        // }
    }

    public function changeUsername($users_id = 0)
    {
        if ($users_id){
            if (6 > strlen($users_id)){
                $users_id = sprintf("%06d",$users_id);//不足6位补0
            }
            Db::name('users')->where('users_id',$users_id)->update(['username'=>'U'.$users_id,'update_time'=>getTime()]);
        }
    }

    public function findUnion($unionid='')
    {
        if ($this->cmsVersion >= 'v1.5.5') {
            $users_id = Db::name('users')->where('union_id',$unionid)->value('users_id');
            if (!empty($users_id)){
                return $users_id;
            }
        }
        return 0;
    }
}
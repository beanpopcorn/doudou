<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"./application/admin/template/index\switch_map.htm";i:1623139969;s:71:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\layout.htm";i:1611051756;s:74:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\theme_css.htm";i:1622084942;s:71:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\footer.htm";i:1571728724;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="/doudou/public/plugins/layui/css/layui.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/doudou/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/doudou/public/static/admin/css/page.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/doudou/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/doudou/public/static/admin/font/css/font-awesome-ie7.min.css">
<![endif]-->
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
    var __root_dir__ = "/doudou";
    var __lang__ = "<?php echo $admin_lang; ?>";
</script>  
<link href="/doudou/public/static/admin/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="/doudou/public/static/admin/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<!-- <link type="text/css" rel="stylesheet" href="/doudou/public/plugins/tags_input/css/jquery.tagsinput.css?v=<?php echo $version; ?>"> -->
<style type="text/css">html, body { overflow: visible;}</style>
<link href="/doudou/public/static/admin/css/diy_style.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css" />

<!-- 官方内置样式表，升级会覆盖变动，请勿修改，否则后果自负 -->

<style type="text/css">
	/*左侧收缩图标*/
	#foldSidebar i { font-size: 24px;color:<?php echo $global['web_theme_color']; ?>; }
    /*左侧菜单*/
    .eycms_cont_left{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl dd a:hover,.eycms_cont_left dl dd a.on,.eycms_cont_left dl dt.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl dd a:active{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist dd{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl.jslist dd a:hover,.eycms_cont_left dl.jslist dd a.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist:hover{ background:<?php echo $global['web_assist_color']; ?>; }
    /*栏目操作*/
    .cate-dropup .cate-dropup-con a:hover{ background-color: <?php echo $global['web_theme_color']; ?>; }
    /*按钮*/
    a.ncap-btn-green { background-color: <?php echo $global['web_theme_color']; ?>; }
    a:hover.ncap-btn-green { background-color: <?php echo $global['web_assist_color']; ?>; }
    .flexigrid .sDiv2 .btn:hover { background-color: <?php echo $global['web_theme_color']; ?>; }
    .flexigrid .mDiv .fbutton div.add{background-color: <?php echo $global['web_theme_color']; ?>; border: none;}
    .flexigrid .mDiv .fbutton div.add:hover{ background-color: <?php echo $global['web_assist_color']; ?>;}
	.flexigrid .mDiv .fbutton div.adds{color:<?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;}
	.flexigrid .mDiv .fbutton div.adds:hover{ background-color: <?php echo $global['web_theme_color']; ?>;}
    /*选项卡字体*/
    .tab-base a.current,
    .tab-base a:hover.current { border-bottom: solid 2px <?php echo $global['web_theme_color']; ?> !important;color: <?php echo $global['web_theme_color']; ?> !important;}
    .addartbtn input.btn:hover{ border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>; }
    .addartbtn input.btn.selected{ color: <?php echo $global['web_theme_color']; ?>;border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>;}
	/*会员导航*/
	.member-nav-group .member-nav-item .btn.selected{background: <?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;box-shadow: -1px 0 0 0 <?php echo $global['web_theme_color']; ?>;}
	.member-nav-group .member-nav-item:first-child .btn.selected{border-left: 1px solid <?php echo $global['web_theme_color']; ?> !important;}
	/*搜索按钮图标*/
	.flexigrid .sDiv2 .fa-search{}
        
    /* 商品订单列表标题 */
   .flexigrid .mDiv .ftitle h3 {border-left: 3px solid <?php echo $global['web_theme_color']; ?>;} 
	
    /*分页*/
    .pagination > .active > a, .pagination > .active > a:focus, 
	.pagination > .active > a:hover, 
	.pagination > .active > span, 
	.pagination > .active > span:focus, 
	.pagination > .active > span:hover { border-color: <?php echo $global['web_theme_color']; ?>;color:<?php echo $global['web_theme_color']; ?>; }
    
    .layui-form-onswitch {border-color: <?php echo $global['web_theme_color']; ?> !important;background-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-enable.selected { background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-disable.selected {background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    input[type="text"]:focus,
    input[type="text"]:hover,
    input[type="text"]:active,
    input[type="password"]:focus,
    input[type="password"]:hover,
    input[type="password"]:active,
    textarea:hover,
    textarea:focus,
    textarea:active { border-color:<?php echo hex2rgba($global['web_theme_color'],0.8); ?>;box-shadow: 0 0 0 2px <?php echo hex2rgba($global['web_theme_color'],0.15); ?> !important;}
    .input-file-show:hover .type-file-button {background-color:<?php echo $global['web_theme_color']; ?> !important; }
    .input-file-show:hover {border-color: <?php echo $global['web_theme_color']; ?> !important;box-shadow: 0 0 5px <?php echo hex2rgba($global['web_theme_color'],0.5); ?> !important;}
    .input-file-show:hover span.show a,
    .input-file-show span.show a:hover { color: <?php echo $global['web_theme_color']; ?> !important;}
    .input-file-show:hover .type-file-button {background-color: <?php echo $global['web_theme_color']; ?> !important; }
    .color_z { color: <?php echo $global['web_theme_color']; ?> !important;}
    a.imgupload{
        background-color: <?php echo $global['web_theme_color']; ?> !important;
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    /*专题节点按钮*/
    .ncap-form-default .special-add{background-color:<?php echo $global['web_theme_color']; ?>;border-color:<?php echo $global['web_theme_color']; ?>;}
    .ncap-form-default .special-add:hover{background-color:<?php echo $global['web_assist_color']; ?>;border-color:<?php echo $global['web_assist_color']; ?>;}
    
    /*更多功能标题*/
    .on-off_panel .title::before {background-color:<?php echo $global['web_theme_color']; ?>;}

</style>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.js"></script>
<!-- <script type="text/javascript" src="/doudou/public/plugins/tags_input/js/jquery.tagsinput.js?v=<?php echo $version; ?>"></script> -->
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/doudou/public/plugins/layer-v3.1.0/layer.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/admin.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/common.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/doudou/public/plugins/layui/layui.js"></script>
<script src="/doudou/public/static/admin/js/myFormValidate.js"></script>
<script src="/doudou/public/static/admin/js/myAjax2.js?v=<?php echo $version; ?>"></script>
<script src="/doudou/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
</head>
<body class="bodystyle" style="min-width: auto;">
    <?php if(is_check_access('Index@switch_map') == '1'): if($main_lang == $admin_lang): ?>
        <div class="on-off_panel" id="mokuaikaiguan" style="display: none;">
            <div class="title">模块开关</div>
            <div class="on-off_btns">
                <form class="layui-form" action="">
                    <ul>
                        <?php if(is_check_access('Member@index') == '1'): ?>
                        <li class="more_li">
                            <div class="on-off_btn">
                                <div class="on-off_btn_l">
                                    <p>会员中心：</p>
                                </div>
                                <div class="on-off_btn_r">
                                    <input type="checkbox" name="web[web_users_switch]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                           data-authortoken="<?php echo $is_eyou_authortoken; ?>" data-is_online="<?php echo $is_online; ?>" <?php if($globalConfig['web_users_switch'] == '1'): ?>checked="" <?php endif; ?>
                                           data-type="web" data-name="web_users_switch" data-lmenuid="Member_users_index" value="<?php echo $globalConfig['web_users_switch']; ?>">
                                </div>
                            </div>
                        </li>
                        <li class="more_li">
                            <div class="on-off_btn">
                                <div class="on-off_btn_l">
                                    <p>会员投稿：</p>
                                </div>
                                <div class="on-off_btn_r">
                                    <input type="checkbox" name="users[users_open_release]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                           data-authortoken="<?php echo $is_eyou_authortoken; ?>" data-is_online="<?php echo $is_online; ?>" <?php if($userConfig['users_open_release'] == '1'): ?>checked="" <?php endif; ?>
                                           data-type="users" data-name="users_open_release" data-lmenuid="Archives_index_draft" value="<?php echo $userConfig['users_open_release']; ?>">
                                </div>
                            </div>
                        </li>
                        <li class="more_li">
                            <div class="on-off_btn">
                                <div class="on-off_btn_l">
                                    <p>会员升级：</p>
                                </div>
                                <div class="on-off_btn_r">
                                    <input type="checkbox" name="level[level_member_upgrade]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                           data-authortoken="<?php echo $is_eyou_authortoken; ?>" data-is_online="<?php echo $is_online; ?>" <?php if($userConfig['level_member_upgrade'] == '1'): ?>checked="" <?php endif; ?>
                                    data-type="level" data-name="level_member_upgrade" data-lmenuid="off" value="<?php echo $userConfig['level_member_upgrade']; ?>">
                                </div>
                            </div>
                        </li>
                        <?php endif; if(is_check_access('Shop@index') == '1'): if($php_servicemeal > 1): ?>
                            <li class="more_li">
                                <div class="on-off_btn">
                                    <div class="on-off_btn_l">
                                        <p>商城中心：</p>
                                    </div>
                                    <div class="on-off_btn_r">
                                        <input type="checkbox" name="shop[shop_open]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                               data-authortoken="<?php echo $is_eyou_authortoken; ?>" data-is_online="<?php echo $is_online; ?>" <?php if($userConfig['shop_open'] == '1'): ?>checked="" <?php endif; ?>
                                        data-type="shop" data-name="shop_open" data-lmenuid="Shop_home" value="<?php echo $userConfig['shop_open']; ?>">
                                    </div>
                                </div>
                            </li>
                            <?php endif; endif; if(is_check_access('Member@index') == '1'): ?>
                        <li class="more_li">
                            <div class="on-off_btn">
                                <div class="on-off_btn_l">
                                    <p>支付功能：</p>
                                </div>
                                <div class="on-off_btn_r">
                                    <input type="checkbox" name="pay[pay_open]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                           data-authortoken="<?php echo $is_eyou_authortoken; ?>" data-is_online="<?php echo $is_online; ?>" <?php if($userConfig['pay_open'] == '1'): ?>checked="" <?php endif; ?>
                                    data-type="pay" data-name="pay_open" data-lmenuid="off" value="<?php echo $userConfig['pay_open']; ?>">
            
                                </div>
                            </div>
                        </li>
                        <?php endif; if(is_check_access('Weapp@index') == '1'): if($weapp_switch == 'true'): ?>
                            <li class="more_li">
                                <div class="on-off_btn">
                                    <div class="on-off_btn_l">
                                        <p>插件应用：</p>
                                    </div>
                                    <div class="on-off_btn_r">
                                        <input type="checkbox" name="web[web_weapp_switch]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest2"
                                               data-type="web" data-name="web_weapp_switch" data-lmenuid="Weapp_index" value="<?php echo $globalConfig['web_weapp_switch']; ?>"
                                               <?php if($globalConfig['web_weapp_switch'] == '1'): ?>checked="" <?php endif; ?>>
                                    </div>
                                </div>
                            </li>
                            <?php endif; endif; if(is_check_access('Language@index') == '1'): if($php_servicemeal >= 1 || !empty($global['system_use_language'])): ?>
                            <li class="more_li">
                                <div class="on-off_btn">
                                    <div class="on-off_btn_l">
                                        <p>多语言：</p>
                                    </div>
                                    <div class="on-off_btn_r">
                                        <input type="checkbox" name="web[web_language_switch]" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchTest"
                                               data-type="web" data-name="web_language_switch" data-lmenuid="Language_index" value="<?php echo $globalConfig['web_language_switch']; ?>"
                                               <?php if($globalConfig['web_language_switch'] == '1'): ?>checked="" <?php endif; ?>>
                                    </div>
                                </div>
                            </li>
                            <?php endif; endif; ?>
                    </ul>
                </form>
            </div>
        </div>
        <?php endif; endif; ?>

    <div class="on-off_panel" id="gengduogongneng" style="display: none;">
       <!-- <div class="title">更多功能</div> -->
            <div class="on-off_list">
                <div class="son-tit" id="wendangxiagnguan" style="display: none;">
                    <div class="title">文档相关</div>
                </div>
                <div class="on-off_list" id="wendangxiagnguan_child" style="display: none;">
                    <ul>
                        <?php if(is_check_access('ArchivesFlag@index') == '1'): if($main_lang == $admin_lang): ?>
                            <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('ArchivesFlag/index'); ?>" data-leftmenu="Index_switch_map" onclick="openFullframe(this, '文档属性配置');"><img src="/doudou/public/static/admin/images/map_icon_wendang.png?v=<?php echo $version; ?>" ><span>文档属性</span></a></li>
                            <?php endif; endif; if(is_check_access('System@water') == '1'): if($main_lang == $admin_lang): ?>
                            <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('System/water'); ?>" data-leftmenu="Index_switch_map" onclick="openFullframe(this, '水印配置', '100%', '100%');"><img src="/doudou/public/static/admin/images/map_icon_shuiyin.png?v=<?php echo $version; ?>" ><span>水印配置</span></a></li>
                            <?php endif; endif; if(is_check_access('System@thumb') == '1'): if($main_lang == $admin_lang): ?>
                            <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('System/thumb'); ?>" data-leftmenu="Index_switch_map" onclick="openFullframe(this, '缩略图配置', '100%', '100%');"><img src="/doudou/public/static/admin/images/map_icon_suoluetu.png?v=<?php echo $version; ?>" ><span>缩略图配置</span></a></li>
                            <?php endif; endif; if(is_check_access('Tags@index') == '1'): ?>
                        <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Tags/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_tag.png?v=<?php echo $version; ?>" ><span>TAG管理</span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                $(function(){
                    if ($('#mokuaikaiguan').find('.more_li').length > 0) {
                        $('#mokuaikaiguan').show();
                    }
                });
            </script>
         
            <div class="son-tit" id="gaojixuanxiang" style="display: none;">
                <div class="title">高级选项</div>
            </div>
            <div class="on-off_list" id="gaojixuanxiang_child" style="display: none;">
                <ul>
                    <?php if(is_check_access('Admin@admin_pwd') == '1'): ?>
                    <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Admin/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_guanliyuan.png?v=<?php echo $version; ?>" ><span>管理员</span></a></li>
                    <?php endif; if(is_check_access('RecycleBin@arctype_index') == '1'): if($main_lang == $admin_lang): if($recycle_switch != '1'): ?>
                            <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('RecycleBin/archives_index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_huishouzhan.png?v=<?php echo $version; ?>" ><span>回收站</span></a></li>
                            <?php endif; endif; endif; if(is_check_access('Tools@index') == '1'): if($main_lang == $admin_lang): ?>
                        <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Tools/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_beifenhuanyuan.png?v=<?php echo $version; ?>" ><span>备份还原</span></a></li>
                        <?php endif; endif; if(is_check_access('Channeltype@index') == '1'): if($main_lang == $admin_lang): ?>
                        <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Channeltype/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_pindao.png?v=<?php echo $version; ?>" ><span>频道模型</span></a></li>
                        <?php endif; endif; if(is_check_access('Field@arctype_index') == '1'): if($main_lang == $admin_lang): ?>
                        <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Field/arctype_index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_lanmuziduan.png?v=<?php echo $version; ?>" ><span>栏目字段</span></a></li>
                        <?php endif; endif; if(is_check_access('Filemanager@index') == '1'): ?>
                    <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Filemanager/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><img src="/doudou/public/static/admin/images/map_icon_moban.png?v=<?php echo $version; ?>" ><span>模板管理</span></a></li>
                    <?php endif; ?>
                    <!-- <?php if(is_check_access('Notify@index') == '1'): ?>
                    <li class="more_li"><a href="javascript:void(0);" data-href="<?php echo url('Notify/index'); ?>" data-leftmenu="Index_switch_map" onclick="gourl2(this,1);"><i class="fa fa-volume-up"></i><span>通知管理</span></a></li>
                    <?php endif; ?> -->
                </ul>
            </div>
            <script type="text/javascript">
                $(function(){
                    if ($('#gengduogongneng').find('.more_li').length > 0) {
                        $('#gengduogongneng').show();
                    }
                    if ($('#gaojixuanxiang_child').find('.more_li').length > 0) {
                        $('#gaojixuanxiang').show();
                        $('#gaojixuanxiang_child').show();
                    }
                    if ($('#wendangxiagnguan_child').find('.more_li').length > 0) {
                        $('#wendangxiagnguan').show();
                        $('#wendangxiagnguan_child').show();
                    }
                });
            </script>
        </div>
    </div>
    <input type="hidden" name="is_themeusers_exist" id="is_themeusers_exist" value="<?php echo $is_themeusers_exist; ?>">
    <input type="hidden" name="is_themeshop_exist" id="is_themeshop_exist" value="<?php echo $is_themeshop_exist; ?>">
    <script>
        layui.use(['form'], function() {
            var form = layui.form,
                layer = layui.layer
            //监听指定开关
            form.on('switch(switchTest)', function(data) {
                var name = $(this).attr('data-name');
                var type = $(this).attr('data-type');
                if (this.checked) {
                    $(this).val(1);
                    ajax_submit(this, type, name, 1);
                } else {
                    $(this).val(0);
                    ajax_submit(this, type, name, 0);
                }
            });
            form.on('switch(switchTest2)', function(data) {
                var name = $(this).attr('data-name');
                var type = $(this).attr('data-type');
                if (this.checked) {
                    $(this).val(1);
                    ajax_submit(this, type, name, 1);
                } else {
                    $(this).val(0);
                    ajax_submit(this, type, name, -1);
                }
            });
        });

        // 提交表单
        function ajax_submit(obj, inc_type, name, value){
            var _parent = parent;
            var lmenuid = $(obj).attr('data-lmenuid');
            var url = "<?php echo url('Index/switch_map', ['_ajax'=>1]); ?>";
            var syn_open_users = false; // 是否同步开启会员中心
            // 验证
            switch (name)
            {
                case 'shop_open':
                case 'pay_open':
                case 'users_open_release':
                case 'level_member_upgrade':
                    if (-1 < $.inArray(name, ['shop_open','pay_open']))
                    {
                        if(false == check_shop_open())
                        {
                            return false;
                        }
                    } else if (-1 < $.inArray(name, ['users_open_release','level_member_upgrade']))
                    {
                        if(false == check_users_open_release())
                        {
                            return false;
                        }
                    }
                    // 是否同时开启会员中心
                    if (1 == value) {
                        syn_open_users = true;
                    } else {
                        syn_open_users = false;
                    }
                    break;
            }
            // 同时开启会员中心
            if (true == syn_open_users) {
                $('input[name="web[web_users_switch]"]').attr('checked', 'checked');
                $('input[name="web[web_users_switch]"]').val(1);
                $('input[name="web[web_users_switch]"]').next().addClass('layui-form-onswitch');
                $('input[name="web[web_users_switch]"]').next().html('<em>开启</em><i></i>');
            }
            // 标签调用按钮的显示与隐藏
            if (1 == value) {
                $('#guide_'+name).show();
            } else {
                $('#guide_'+name).hide();
            }

            if (1 == $('#is_themeusers_exist').val()) {
                $('#is_themeusers_exist').val(0)
                loadmsg = '初始化中';
            } else if (1 == $('#is_themeshop_exist').val()) {
                $('#is_themeshop_exist').val(0)
                loadmsg = '初始化中';
            } else {
                loadmsg = '正在处理';
            }
            parent_layer_loading(loadmsg);

            $.ajax({
                type: "POST",
                url: url,
                data: {inc_type:inc_type,name:name,value:value},
                dataType: 'json',
                success: function (res) {
                    if(res.code == 1){
                        // 第一次模板同步下载
                        if ('web_users_switch' == name && 1 == res.data.is_syn) { // 会员中心模板下载
                            syn_theme_users(value,lmenuid);
                            return false;
                        } else if ('shop_open' == name && 1 == res.data.is_syn) { // 订单中心模板下载
                            syn_theme_shop(value,lmenuid);
                            return false;
                        } else {
                            _parent.layer.closeAll();
                            // 根据不同场景进行页面加载的处理
                            _parent.layer.msg(res.msg, {icon: 1, time: 1000}, function(){
                                if (1 == res.data.reload) {
                                    window.location.reload();
                                } else if (2 == res.data.reload) {
                                    top.window.location.reload();
                                }
                            });
                        }
                    }else{
                        if (1 == res.data.code) {
                            $('input[name="shop[shop_open]').removeAttr('checked');
                            $('input[name="shop[shop_open]').val(0);
                            $('input[name="shop[shop_open]').next().removeClass('layui-form-onswitch');
                            $('input[name="shop[shop_open]').next().html('<em>关闭</em><i></i>');
                            _parent.layer.closeAll();
                            _parent.layer.alert(res.msg, {btn: ['购买授权'], icon: 4, title:false}, function(){
                                _parent.layer.closeAll();
                                window.location.reload();
                                window.open('https://www.eyoucms.com/buy');
                            });
                        } else {
                            _parent.layer.closeAll();
                            _parent.layer.alert(res.msg, {icon: 5, title:false, closeBtn:false}, function(){
                                _parent.layer.closeAll();
                                window.location.reload();
                            });
                        }
                    }

                    // 控制顶部与左侧菜单的显示与隐藏
                    try{
                        if (1 == value) {
                            $('#'+lmenuid, window.parent.document).show();
                            if (-1 < $.inArray(name, ['shop_open','users_open_release','level_member_upgrade','pay_open'])) {
                                $('#Member_users_index', window.parent.document).show();
                            } else if ('web_users_switch' == name && 1 == $("input[name='shop[shop_open]']:checked").val()) {
                                $('#Shop_home', window.parent.document).show();
                            }
                        } else {
                            $('#'+lmenuid, window.parent.document).hide();
                            if (-1 < $.inArray(name, ['web_users_switch'])) {
                                $('#Shop_home', window.parent.document).hide();
                                $('#Archives_index_draft', window.parent.document).hide();

                                $('input[name="users[users_open_release]').removeAttr('checked');
                                $('input[name="users[users_open_release]').val(0);
                                $('input[name="users[users_open_release]').next().removeClass('layui-form-onswitch');
                                $('input[name="users[users_open_release]').next().html('<em>关闭</em><i></i>');

                                $('input[name="level[level_member_upgrade]').removeAttr('checked');
                                $('input[name="level[level_member_upgrade]').val(0);
                                $('input[name="level[level_member_upgrade]').next().removeClass('layui-form-onswitch');
                                $('input[name="level[level_member_upgrade]').next().html('<em>关闭</em><i></i>');

                                $('input[name="shop[shop_open]').removeAttr('checked');
                                $('input[name="shop[shop_open]').val(0);
                                $('input[name="shop[shop_open]').next().removeClass('layui-form-onswitch');
                                $('input[name="shop[shop_open]').next().html('<em>关闭</em><i></i>');

                                $('input[name="pay[pay_open]').removeAttr('checked');
                                $('input[name="pay[pay_open]').val(0);
                                $('input[name="pay[pay_open]').next().removeClass('layui-form-onswitch');
                                $('input[name="pay[pay_open]').next().html('<em>关闭</em><i></i>');
                            }
                        }
                    }catch(e){}
                },
                error:function(e){
                    _parent.layer.closeAll();
                    _parent.layer.alert(e.responseText, {icon: 5, title:false, closeBtn: false}, function(){
                        _parent.layer.closeAll();
                        window.location.reload();
                    });
                }
            });
        }

        //左侧菜单栏有二级菜单的type=2
        function gourl2(obj,type)
        {
            var leftmenu = $(obj).data('leftmenu');
            var href = $(obj).data('href');
            $('.eycms_cont_left .sub-menu a', window.parent.document).removeClass('on');
            $('.eycms_cont_left .sub-menu dl.jslist dt', window.parent.document).removeClass('on');

            if (2 == type) {
                $('#'+leftmenu+' dt', window.parent.document).addClass('on');
            } else {
                $('#'+leftmenu, window.parent.document).addClass('on');
            }
            window.location.href = href;
        }

        // 会员模板初始化下载
        function syn_theme_users(value,lmenuid)
        {
            $.ajax({
                type : 'get',
                url : "<?php echo url('Member/ajax_syn_theme_users', ['_ajax'=>1]); ?>",
                data : {},
                dataType : 'json',
                success : function(res){
                    parent.layer.closeAll();
                    if(res.code == 1){
                        parent.layer.msg(res.msg, {icon: 1, time: 1000});
                    }else{
                        parent.layer.alert(res.msg, {icon: 5, title:false, closeBtn:false}, function(){
                            parent.layer.closeAll();
                            window.location.reload();
                        });
                    }
                    // 控制顶部与左侧菜单的显示与隐藏
                    if (1 == value) {
                        $('#'+lmenuid, window.parent.document).show();
                    } else {
                        $('#'+lmenuid, window.parent.document).hide();
                    }
                },
                error: function(e){
                    parent.layer.closeAll();
                    parent.layer.alert(e.responseText, {icon: 5, title:false, closeBtn:false}, function(){
                        parent.layer.closeAll();
                        window.location.reload();
                    });
                }
            })
        }

        // 订单模板初始化下载
        function syn_theme_shop(value,lmenuid)
        {
            $.ajax({
                type : 'get',
                url : "<?php echo url('Shop/ajax_syn_theme_shop', ['_ajax'=>1]); ?>",
                data : {},
                dataType : 'json',
                success : function(res){
                    parent.layer.closeAll();
                    if(res.code == 1){
                        parent.layer.msg(res.msg, {icon: 1, time: 1000});
                    }else{
                        var icon = 5;
                        if (res.data.icon) {icon = res.data.icon;}
                        parent.layer.alert(res.msg, {icon: icon, title:false, closeBtn:false}, function(){
                            parent.layer.closeAll();
                            window.location.reload();
                        });
                    }
                    // 控制顶部与左侧菜单的显示与隐藏
                    try{
                        if (1 == value) {
                            $('#Member_users_index', window.parent.document).show();
                            $('#'+lmenuid, window.parent.document).show();
                        }
                    }catch(e){}
                },
                error: function(e){
                    parent.layer.closeAll();
                    parent.layer.alert(e.responseText, {icon: 5, title:false, closeBtn: false}, function(){
                        parent.layer.closeAll();
                        window.location.reload();
                    });
                }
            })
        }

        function check_shop_open()
        {
            var obj = $('input[name="shop[shop_open]"]:checked');
            var is_online = $(obj).attr('data-is_online');
            if (1 == is_online) {
                var shop_open = $(obj).val();
                if (1 == shop_open && $(obj).attr('data-authortoken') == -1) {

                    $('input[name="shop[shop_open]').removeAttr('checked');
                    $('input[name="shop[shop_open]').val(0);
                    $('input[name="shop[shop_open]').next().removeClass('layui-form-onswitch');
                    $('input[name="shop[shop_open]').next().html('<em>关闭</em><i></i>');

                    var alert1 = layer.alert('订单功能只限于授权域名！', {
                        icon: 4,
                        title:false,
                        btn: ['购买授权']
                    }, function(){
                        window.open('https://www.eyoucms.com/buy');
                        layer.close(alert1);
                    });
                    return false;
                }
            }
            return true;
        }

        function check_users_open_release()
        {
            var obj = $('input[name="users[users_open_release]"]:checked');
            var is_online = $(obj).attr('data-is_online');
            if (1 == is_online) {
                var users_open_release = $(obj).val();
                if (1 == users_open_release && $(obj).attr('data-authortoken') == -1) {

                    $('input[name="users[users_open_release]"]').removeAttr('checked');
                    $('input[name="users[users_open_release]"]').val(0);
                    $('input[name="users[users_open_release]"]').next().removeClass('layui-form-onswitch');
                    $('input[name="users[users_open_release]"]').next().html('<em>关闭</em><i></i>');

                    var alert1 = layer.alert('会员投稿功能只限于授权域名！', {
                        icon: 4,
                        title:false,
                        btn: ['购买授权']
                    }, function(){
                        window.open('https://www.eyoucms.com/buy');
                        layer.close(alert1);
                    });
                    return false;
                }
            }
            return true;
        }
    </script>
<br/>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop">
        <i class="fa fa-angle-up"></i>
    </a>
    <a href="JavaScript:void(0);" id="btnbottom">
        <i class="fa fa-angle-down"></i>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#think_page_trace_open').css('z-index', 99999);
    });
</script>
</body>
</html>

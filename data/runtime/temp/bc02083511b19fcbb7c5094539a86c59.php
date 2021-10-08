<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"./application/admin/template/index\index.htm";i:1623139969;s:74:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\theme_css.htm";i:1622084942;s:72:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\menubox.htm";i:1571728724;s:69:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\left.htm";i:1623030355;}*/ ?>
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
<link rel="shortcut icon" type="image/x-icon" href="/doudou/favicon.ico" media="screen"/>
<title><?php echo (isset($global['web_name']) && ($global['web_name'] !== '')?$global['web_name']:''); ?>-<?php if(!(empty($is_eyou_authortoken) || (($is_eyou_authortoken instanceof \think\Collection || $is_eyou_authortoken instanceof \think\Paginator ) && $is_eyou_authortoken->isEmpty()))): ?>易优CMS企业网站管理系统<?php endif; ?><?php echo $version; ?></title>
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var SITEURL = window.location.host + eyou_basefile + "/" + module_name;
    var GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
    var __root_dir__ = "/doudou";
    var __lang__ = "<?php echo $admin_lang; ?>";
    var VarSecurityPatch = "<?php echo (isset($security_patch) && ($security_patch !== '')?$security_patch:'0'); ?>";
</script>

<link href="/doudou/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/doudou/public/static/admin/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/doudou/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
<link href="/doudou/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
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
<script type="text/javascript" src="/doudou/public/static/admin/js/common.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.bgColorSelector.js"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/admincp.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/jquery.validation.min.js"></script>

<!-- <script type="text/javascript" src="/doudou/public/plugins/layer/layer.js"></script> -->
<script type="text/javascript" src="/doudou/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/doudou/public/static/admin/js/dialog/dialog.js?v=<?php echo $version; ?>" id="dialog_js"></script>
<script src="/doudou/public/static/admin/js/upgrade.js?v=<?php echo $version; ?>"></script>
<script src="/doudou/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
</head>
<body>

  <script type="text/javascript">
  //固定层移动
  $(function(){
      //管理显示与隐藏
      $('img[tptype="admin_avatar"], #admin-manager-btn').click(function () {
          if ($(".manager-menu").css("display") == "none") {
              $(".manager-menu").css('display', 'block'); 
              $("#admin-manager-btn").attr("title","关闭快捷管理"); 
              $("#admin-manager-btn").removeClass().addClass("arrow-close");
          }
          else {
              $(".manager-menu").css('display', 'none');
              $("#admin-manager-btn").attr("title","显示快捷管理");
              $("#admin-manager-btn").removeClass().addClass("arrow");
          }           
      });
  });
  </script> 
<style>
.scroll-wrapper {   
  height: 100%;
  -webkit-overflow-scrolling: touch;   
  overflow-y: auto;   
} 
</style>
<div class="admincp-container unfold">
<div class="eycms_cont_left hidden-xs">
    <dl class="eylogo">
        <?php if(!(empty($is_eyou_authortoken) || (($is_eyou_authortoken instanceof \think\Collection || $is_eyou_authortoken instanceof \think\Paginator ) && $is_eyou_authortoken->isEmpty()))): ?>
        <a href="<?php echo \think\Request::instance()->url(); ?>"><img id="web_adminlogo" src="<?php echo (handle_subdir_pic($global['web_adminlogo']) ?: '/doudou/public/static/admin/images/logo_ey.png'); ?>?v=<?php echo time(); ?>" alt="点击刷新" title="点击刷新"></a>
        <?php else: ?>
        <a href="<?php echo \think\Request::instance()->url(); ?>"><img id="web_adminlogo" src="<?php echo (handle_subdir_pic($global['web_adminlogo']) ?: '/doudou/public/static/admin/images/logo.png'); ?>?v=<?php echo time(); ?>" alt="点击刷新" title="点击刷新"></a>
        <?php endif; ?>
    </dl>
    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <dl style="<?php if($vo['is_menu'] == 0): ?>display: none;<?php endif; ?>">
         <!--   <?php if(!(empty($vo['name']) || (($vo['name'] instanceof \think\Collection || $vo['name'] instanceof \think\Paginator ) && $vo['name']->isEmpty()))): ?><dt><?php echo $vo['name']; ?></dt><?php endif; ?> -->
            <dd class="sub-menu">
            <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $k2 = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2;if(empty($v2['child']) || empty($v2['is_subshowmenu'])): ?>
                    <a data-child='0' id="<?php echo $v2['controller']; ?>_<?php echo $v2['action']; ?>" href="<?php echo (isset($v2['url']) && ($v2['url'] !== '')?$v2['url']:'javascript:void(0);'); ?>" <?php if(empty($v2['url']) || (($v2['url'] instanceof \think\Collection || $v2['url'] instanceof \think\Paginator ) && $v2['url']->isEmpty())): ?>data-param="<?php echo $v2['controller']; ?>|<?php echo $v2['action']; ?>"<?php endif; ?> target="<?php echo $v2['target']; ?>" style="<?php if($v2['is_menu'] == 0): ?>display: none;<?php endif; ?>"><i class="<?php echo (isset($v2['icon']) && ($v2['icon'] !== '')?$v2['icon']:'fa fa-minus'); ?>"></i><?php echo $v2['name']; ?></a>
                <?php else: ?>
                    <dl class="jslist" id="<?php echo $v2['controller']; ?>_<?php echo $v2['action']; ?>" style="border-bottom:none;<?php if($v2['is_menu'] == 0): ?>display: none;<?php endif; ?>">
                        <dt><i class="<?php echo (isset($v2['icon']) && ($v2['icon'] !== '')?$v2['icon']:'fa fa-minus'); ?>"></i><?php echo $v2['name']; ?><i class="fa fa-angle-right"></i></dt>
                        <dd style="display: none;">
                            <?php if(is_array($v2['child']) || $v2['child'] instanceof \think\Collection || $v2['child'] instanceof \think\Paginator): $k3 = 0; $__LIST__ = $v2['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?>
                                <a data-child='1' id="<?php echo $v3['controller']; ?>_<?php echo $v3['action']; ?>" href="<?php echo (isset($v3['url']) && ($v3['url'] !== '')?$v3['url']:'javascript:void(0);'); ?>" <?php if(empty($v3['url']) || (($v3['url'] instanceof \think\Collection || $v3['url'] instanceof \think\Paginator ) && $v3['url']->isEmpty())): ?>data-param="<?php echo $v3['controller']; ?>|<?php echo $v3['action']; ?>"<?php endif; ?> target="<?php echo $v3['target']; ?>" style="<?php if($v3['is_menu'] == 0): ?>display: none;<?php endif; ?>"><i class="<?php echo (isset($v3['icon']) && ($v3['icon'] !== '')?$v3['icon']:'fa fa-minus'); ?>"></i><?php echo $v3['name']; if($v3['controller'] == 'Upgrade' and !empty($upgradeMsg)): endif; ?></a>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>
                    </dl>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </dd>
        </dl>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

  <div class="admincp-container-right">
    <div class="admincp-header">
      <div class="wraper">
        <div class="bgSelector"></div>
        <div id="foldSidebar"><i class="fa fa-bars"  title="展开/收起侧边导航"></i></div>
        <div class="admincp-name" id="foldSidebar2">
        </div>
        <div class="admincp-header-r">
          <div class="manager">
            <dl>
              <dt class="name"><?php echo $admin_info['user_name']; ?></dt>
              <dd class="group"><?php echo $admin_info['role_name']; ?></dd>
            </dl>
            <div class="btn-group pull-left ey-tool">

              <a class="btn btn-default dropdown-toggle" target="_blank" href="<?php echo $home_url; ?>">
                <i class="fa fa-desktop"></i>
                <span class="hidden-xs">网站首页</span>
              </a>

              <?php if(is_check_access('System@clear_cache') == '1'): ?>
                <a class="btn btn-default dropdown-toggle" href="javascript:void(0);" onclick="clear_cache();">
                  <i class="fa fa-refresh"></i>
                  <span class="hidden-xs">清除缓存</span>
                </a>
              <?php endif; if(!(empty($is_eyou_authortoken) || (($is_eyou_authortoken instanceof \think\Collection || $is_eyou_authortoken instanceof \think\Paginator ) && $is_eyou_authortoken->isEmpty()))): ?>
              <!-- 商业授权 -->   
              <em class="eyou_tool em_authortoken" data-expanded="close">
                <a class="btn btn-default dropdown-toggle" href="javascript:void(0);" onclick="valide(this);">
                  <i class="fa fa-bookmark"></i>
                  <span class="hidden-xs">购买授权</span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="shouquan">
                    <li class="ey-tool-list text-center"><a target="_blank" class="liaojie" href="https://www.eyoucms.com/buy/"  title="购买后可去除所有版权提示">了解商业授权</a></li>
                    <li class="ey-tool-list text-center">
                      <input class="btn btn-primary" type="button" onclick="$('.em_authortoken').toggleClass('open');openItem('Index|authortoken');" value="检测是否正版" />
                    </li>
                </ul>
               </em>
              <!-- 商业授权 -->   
              <?php endif; ?>

              <!-- 多语言 -->
              <?php if($php_servicemeal >= 1 || !empty($global['system_use_language'])): ?>
              <em id="Language_index" class="eyou_tool em_lang" data-expanded="close" <?php if(empty($web_language_switch)): ?>style="display: none;"<?php endif; ?>>
                <a class="btn btn-default dropdown-toggle" title="支持多语言切换" href="javascript:void(0);" onclick="valide(this);">
                  <i class="fa fa-globe"></i>
                  <span class="hidden-xs" id="language_title"><?php echo (isset($languages[$admin_lang]['title']) && ($languages[$admin_lang]['title'] !== '')?$languages[$admin_lang]['title']:'简体中文'); ?></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="shouquan">
                  <?php if(is_array($languages) || $languages instanceof \think\Collection || $languages instanceof \think\Paginator): $i = 0; $__LIST__ = $languages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="ey-tool-list text-center lang"><a class="liaojie" href="?lang=<?php echo $vo['mark']; ?>"><?php echo $vo['title']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="ey-tool-list text-center" id="addlang">
                      <button class="btn btn-primary" type="button" onclick="$('.em_lang').toggleClass('open');openItem('Language|index');" /><i class="fa fa-globe"></i>&nbsp;多语言设置</button>
                    </li>
                </ul>
               </em>
              <?php endif; ?>
              <!-- 多语言 -->   

              <!-- 小程序 start --> 
              <?php if(is_check_access('Diyminipro@page_edit') == '1'): ?>
              <a id="Diyminipro_theme_index" class="btn btn-default dropdown-toggle" href="<?php echo url('Diyminipro/page_edit'); ?>" target="_blank" <?php if($web_diyminipro_switch == -1): ?> style="display: none;" <?php endif; ?> title="可视化小程序">
                <i class="fa fa-compass"></i>
                <span class="hidden-xs">小程序</span>
              </a>
              <?php endif; ?>
              <!-- 小程序 end --> 

              <!-- 服务器升级 -->
              <?php if(empty($security_patch) || (($security_patch instanceof \think\Collection || $security_patch instanceof \think\Paginator ) && $security_patch->isEmpty())): if($upgrade == 'true'): ?>
                <div id="upgrade_filelist" style="display:none;"></div> 
                <div id="upgrade_intro" style="display:none;"></div> 
                <div id="upgrade_notice" style="display:none;"></div> 
                <a class="btn btn-default dropdown-toggle" style="display: none;color:#F00;" title="不升级可能有安全隐患" href="javascript:void(0);" id="a_upgrade" data-version="" data-max_version="" data-iframe="parent" data-tips_url="<?php echo url('Upgrade/setPopupUpgrade'); ?>" data-upgrade_url="<?php echo url('Upgrade/OneKeyUpgrade'); ?>" data-check_authority="<?php echo url('Upgrade/check_authority'); ?>">
                  <i class="fa fa-info-circle"></i>
                  <span class="hidden-xs">系统更新</span>
                </a>
                <?php endif; endif; ?>
              <!-- 服务器升级 end -->
            </div>
            
            <div class="admin_user_dropup">
              <div class="admin_user_dropup_bt">
                <img id="admin_head_pic" tptype="admin_avatar" src="<?php echo get_head_pic($admin_info['head_pic']); ?>" style="cursor: pointer;width: 34px;height: 34px;">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                <?php if(empty($is_eyou_authortoken) || (($is_eyou_authortoken instanceof \think\Collection || $is_eyou_authortoken instanceof \think\Paginator ) && $is_eyou_authortoken->isEmpty())): ?>
                <span class="info-num UnreadNotify1615518028 <?php if(empty($notice_count) || (($notice_count instanceof \think\Collection || $notice_count instanceof \think\Paginator ) && $notice_count->isEmpty())): ?>none<?php endif; ?>"><?php echo $notice_count; ?></span>
                <?php endif; ?>
              </div>
              <div class="admin_user_dropup_con">
                <ul>
                  <li><a href="javascript:void(0);" onclick="openItem('Admin|admin_edit|id|<?php echo $admin_info['admin_id']; ?>');">个人信息</a></li>
                  <li><a href="javascript:void(0);" data-href="<?php echo url('Encodes/theme_conf'); ?>" onclick="openFullframe(this, '皮肤设置', '80%', '80%');">皮肤设置</a></li>
                  <?php if(empty($is_eyou_authortoken) || (($is_eyou_authortoken instanceof \think\Collection || $is_eyou_authortoken instanceof \think\Paginator ) && $is_eyou_authortoken->isEmpty())): ?>
                  <li><a href="javascript:void(0);" onclick="openItem('UsersNotice|admin_notice_index');">站内通知</a><span class="info-num UnreadNotify1615518028 <?php if(empty($notice_count) || (($notice_count instanceof \think\Collection || $notice_count instanceof \think\Paginator ) && $notice_count->isEmpty())): ?>none<?php endif; ?>"><?php echo $notice_count; ?></span></li>
                  <?php endif; ?>
                  <li><a href="<?php echo url('Admin/logout'); ?>">安全退出</a></li>
                </ul>
              </div>
            </div>
            <script type="text/javascript">
              $(".admin_user_dropup").mouseover(function(){
                 $(".admin_user_dropup_con").show();
                 $(".admin_user_dropup_bt").children('i').removeClass('fa-angle-down').addClass('fa-angle-up');
              });
              $(".admin_user_dropup").mouseout(function(){
                 $(".admin_user_dropup_con").hide();
                 $(".admin_user_dropup_bt").children('i').removeClass('fa-angle-up').addClass('fa-angle-down');
              });
            </script>
            
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="top-border"></div>
    <div class="scroll-wrapper">
      <iframe src="" id="workspace" name="workspace" style="overflow-y: auto" frameborder="0" width="100%" height="95%" scrolling="yes" onload="window.parent"></iframe>
      <script type="text/javascript">ajax_system_1610425892();</script>
    </div>
  </div>
</div>
<script type="text/javascript">

  /* 定时查询未读的站内信 --- 暂定为60秒查询一次 */
  $(function() {
    var is_author = <?php echo (isset($is_eyou_authortoken) && ($is_eyou_authortoken !== '')?$is_eyou_authortoken:'0'); ?>;
    if (is_author == 0) {
        window.setInterval(UnreadNotify1615518028, 60000);
    }
    function UnreadNotify1615518028() {
      $.ajax({
          url : "<?php echo url('Notify/count_unread_notify'); ?>",
          type: 'post',
          data: {'_ajax': 1},
          dataType: 'JSON',
          success: function(res) {
              if (1 == res.code) {
                $('.UnreadNotify1615518028').empty().html(res.data.notice_count);
              }
          }
      });
    }
  });
  /* END */

  function valide(obj)
  {
    var cls = $(obj).parent().attr('class');
    $('.eyou_tool').removeClass('open');
    if(cls.indexOf("open") > 0) {
      $(obj).parent().addClass('open');
    }
    $(obj).parent().toggleClass('open');
  }

  // 清除缓存
  function clear_cache()
  {
      layer_loading('正在清除');
      $.ajax({
          url: "<?php echo url('System/clear_cache', ['_ajax'=>1]); ?>",
          type: 'post',
          dataType: 'JSON',
          data: {clearall: 1},
          success: function(res){
              layer.closeAll();
              if (res.code == 1) {
                  layer.msg(res.msg, {time:1000}, function(){
                    top.window.location.reload();
                  });
              } else {
                  showErrorMsg(res.msg);
              }
          },
          error: function(e){
              showErrorMsg(e.responseText);
          }
      });
  }

  // 功能地图
  // function switch_map()
  // {
  //     $('.eycms_cont_left .sub-menu a', window.parent.document).removeClass('on');
  //     $('.eycms_cont_left .sub-menu dl.jslist dt', window.parent.document).removeClass('on');
  //     $('#Index_switch_map', window.parent.document).addClass('on');
  //     var url = "<?php echo url('Index/switch_map'); ?>";
  //     workspace.window.location.href = url;
  // }
</script>
</body>
</html>
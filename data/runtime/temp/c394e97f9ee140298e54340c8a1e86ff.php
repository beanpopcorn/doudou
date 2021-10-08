<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:43:"./application/admin/template/custom\add.htm";i:1623464539;s:71:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\layout.htm";i:1611051756;s:74:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\theme_css.htm";i:1622084942;s:89:"D:\phpstudy_pro\WWW\doudou\application\admin\template\archives\get_field_addonextitem.htm";i:1622084942;s:71:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\footer.htm";i:1571728724;}*/ ?>
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
<script type="text/javascript" src="/doudou/public/plugins/laydate/laydate.js"></script>

<?php if($editor['editor_select'] == '1'): ?>
    <script type="text/javascript" src="/doudou/public/plugins/Ueditor/ueditor.config.js?v=v1.5.4"></script>
    <script type="text/javascript" src="/doudou/public/plugins/Ueditor/ueditor.all.min.js?v=v1.5.4"></script>
    <script type="text/javascript" src="/doudou/public/plugins/Ueditor/lang/zh-cn/zh-cn.js?v=v1.5.4"></script>
<?php else: ?>
    <script type="text/javascript" src="/doudou/public/plugins/ckeditor/ckeditor.js?v=v1.5.4"></script>
<?php endif; ?>

<body style="background-color: #FFF; overflow: auto;min-width:auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page" style="min-width:auto;box-shadow:none;">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-angle-double-left"></i>返回</a>
            <div class="subject">
                <h3>新增</h3>
                <h5></h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="javascript:void(0);" data-index='1' class="tab current"><span>常规选项</span></a></li>
                <li><a href="javascript:void(0);" data-index='2' class="tab"><span>SEO选项</span></a></li>
                <li><a href="javascript:void(0);" data-index='3' class="tab"><span>其他选项</span></a></li>
                <!-- #weapp_diy001_tab# -->
                <!-- #weapp_diy002_tab# -->
            </ul>
        </div>
    </div>
    <form class="form-horizontal" id="post_form" action="<?php echo url('Custom/add'); ?>" method="post">
        <!-- 常规信息 -->
        <div class="ncap-form-default tab_div_1 tab_div_body">
            <dl class="row">
                <dt class="tit">
                    <label for="title"><em>*</em>标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="title" value="" id="title" class="input-txt" maxlength="100" <?php if($channelRow['is_repeat_title'] == '0'): ?> oninput="check_title_repeat(this,0);" <?php endif; ?>>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="title"><em>*</em>所属栏目</label>
                </dt>
                <dd class="opt"> 
                    <select name="typeid" id="typeid">
                        <option value="0">请选择栏目…</option>
                        <?php echo $arctype_html; ?>
                    </select>
                    <span class="err"></span>
                    <p class="notic">谨慎切换，自定义字段的内容会随着栏目切换而清空，在保存之前不受影响！</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>文档属性</label>
                </dt>
                <dd class="opt">
                    <?php if(is_array($archives_flags) || $archives_flags instanceof \think\Collection || $archives_flags instanceof \think\Paginator): $i = 0; $__LIST__ = $archives_flags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <label><input type="checkbox" name="<?php echo $vo['flag_fieldname']; ?>" value="1"><?php echo $vo['flag_name']; ?>[<?php echo $vo['flag_attr']; ?>]</label>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row none dl_jump">
                <dt class="tit">
                    <label>跳转网址</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="jumplinks" id="jumplinks" class="input-txt" placeholder="http://">
                    <span class="err"></span>
                    <p class="notic">请输入完整的URL网址（包含http或https），设置后访问该条信息将直接跳转到设置的网址</p>
                </dd>
            </dl>
            <?php if(!empty($channelfield_row['litpic']) AND 1 == $channelfield_row['litpic']['ifeditable']): ?>
            <dl class="row">
                <dt class="tit">
                  <label>缩略图</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show div_litpic_local">
                        <span class="show">
                            <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="javascript:void(0);">
                                <i id="img_i" class="fa fa-picture-o" onmouseover="" onmouseout="layer.close(layer_tips);"></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input type="text" id="litpic_local" name="litpic_local" value="" class="type-file-text" autocomplete="off">
                            <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                            <input class="type-file-file" onClick="GetUploadify(1,'','allimg','img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo"
                                 title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <input type="text" id="litpic_remote" name="litpic_remote" value="" placeholder="http://" class="input-txt" onKeyup="keyupRemote(this, 'litpic');" style="display: none;">
                    &nbsp;
                    <label><input type="checkbox" name="is_remote" id="is_remote" value="1" onClick="clickRemote(this, 'litpic');">远程图片</label>
                    <span class="err"></span>
                    <p class="notic">当没有手动上传图片时候，会自动提取相册的第一张图片作为封面</p>
                </dd>
            </dl>
            <?php endif; ?>

            <span id="FieldAddonextitem"></span>
<script type="text/javascript">
    $(function() {
        var aidNew = <?php echo (isset($field['aid']) && ($field['aid'] !== '')?$field['aid']:'0'); ?>;
        var typeidNew = <?php echo (isset($typeid) && ($typeid !== '')?$typeid:'0'); ?>;
        if (!typeidNew) typeidNew = <?php echo (isset($field['typeid']) && ($field['typeid'] !== '')?$field['typeid']:'0'); ?>;
        var channeltypeNew = <?php echo (isset($channeltype) && ($channeltype !== '')?$channeltype:'0'); ?>;
        var ControllerName = '<?php echo CONTROLLER_NAME; ?>';
        GetAddonextitem(0, typeidNew, channeltypeNew, aidNew, false, ControllerName);
    });
    
    function GetAddonextitem(init, typeidNew, channeltypeNew, aidNew, is_destroy, ControllerName) {
        var loadingTxt = 1 == init ? '正在切换' : '正在加载';
        layer_loading(loadingTxt);
        ControllerName = ControllerName ? ControllerName : '';
        
        $.ajax({
            url: "<?php echo url('Archives/ajax_get_addonextitem'); ?>",
            data: {typeid: typeidNew, channeltype: channeltypeNew, aid: aidNew, controller_name: ControllerName, _ajax:1},
            type:'get',
            success:function(res) {
                layer.closeAll();
                if (res.code == 0) {
                    layer.alert(res.msg, {icon: 2, title:false});
                } else {
                    var EditorSelect = <?php echo $editor['editor_select']; ?>;
                    if (2 == EditorSelect) {
                        // 编辑器内容数据提取
                        var contentData = [];
                        $.each(res.data.htmltextField, function (index, value) {
                            var contentID = 'addonFieldExt_' + value;
                            var getContent = '';
                            for (instance in CKEDITOR.instances) {
                                CKEDITOR.instances[contentID].updateElement();
                                getContent = CKEDITOR.instances[contentID].getData();
                            }
                            contentData.push(getContent);
                        });
                        // 覆盖原先的编辑器HTML
                        $('#FieldAddonextitem').empty().html(res.data.html);
                        // 追加编辑器的内容
                        $.each(res.data.htmltextField, function (index, value) {
                            if (contentData[index]) {
                                var contentID = 'addonFieldExt_' + value;
                                CKEDITOR.instances[contentID].setData(contentData[index]);
                            }
                        });
                    } else if (1 == EditorSelect) {
                        $('#FieldAddonextitem').empty().html(res.data.html);
                        
                        if (1 == init) {
                            $.each(res.data.htmltextField, function (index, value) {
                                showEditor_1597892187('addonFieldExt_'+value);
                            });
                        }
                    }
                }
            },
            error: function(e){
                layer.closeAll();
                layer.alert(e.responseText, {icon: 2, title:false});
            }
        });
    }

    // 渲染编辑器
    function showEditor_1597892187(elemtid) {
        var content = '';
        try{
            content = UE.getEditor(elemtid).getContent();
            UE.getEditor(elemtid).destroy();
        }catch(e){}
        var serverUrl = eyou_basefile+'?m=admin&c=Ueditor&a=index&savepath=ueditor&lang='+__lang__;
        var options = {
            serverUrl : serverUrl,
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 450, //初化高度            
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999,
            removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: false,
            toolbars: ueditor_toolbars
        };
        eval("ue_"+elemtid+" = UE.getEditor(elemtid, options);ue_"+elemtid+".ready(function() {ue_"+elemtid+".setContent(content);});");
    }
</script>
            <!-- #weapp_diy001_excel# -->
            <!-- #weapp_diy002_excel# -->
        </div>
        <!-- 常规信息 -->
        <!-- SEO设置 -->
        <div class="ncap-form-default tab_div_2 tab_div_body" style="display:none;">
            <dl class="row" style="z-index:2;">
                <dt class="tit">
                    <label>TAG标签</label>
                </dt>
                <dd class="opt">          
                    <input type="text" value="" name="tags" id="tags" class="input-txt" placeholder="多个标签之间以逗号隔开" autocomplete="off" oninput="get_common_tagindex_input(this);" onfocus="$('#often_tags').hide();" onkeyup="this.value=this.value.replace(/[\，]/g,',');" onpaste="this.value=this.value.replace(/[\，]/g,',')">&nbsp;
                    <a href="javascript:void(0);" onclick="get_common_tagindex(this);">显示常用标签</a>&nbsp;<img id="tag_loading" src="/doudou/public/static/common/images/loading.gif" style="display: none;" />
                    <div class="often_tags" id="often_tags" style="display: none;"></div>
                    <div class="often_tags" id="often_tags_input" style="display: none;"></div>
                    <input type="hidden" id="tags_click_count">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="seo_title">SEO标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="seo_title" id="seo_title" class="input-txt">
                    <p class="notic">一般不超过80个字符，为空时系统自动构成，可以到 <a href="<?php echo url('Seo/index', array('inc_type'=>'seo')); ?>">SEO设置 - SEO基础</a> 中设置构成规则。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>SEO关键词</label>
                </dt>
                <dd class="opt">          
                    <textarea rows="5" cols="60" id="seo_keywords" name="seo_keywords" style="height:40px;"></textarea>
                    <span class="err"></span>
                    <p class="notic">一般不超过100个字符，多个关键词请用英文逗号（,）隔开，建议3到5个关键词。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>SEO描述</label>
                </dt>
                <dd class="opt">          
                    <textarea rows="5" cols="60" id="seo_description" name="seo_description" style="height:60px;"></textarea>
                    <span class="err"></span>
                    <p class="notic">一般不超过200个字符，不填写时系统自动提取正文的前200个字符</p>
                </dd>
            </dl>
        </div>
        <!-- SEO设置 -->
        <!-- 其他参数 -->
        <div class="ncap-form-default tab_div_3 tab_div_body" style="display:none;">
            <?php if(!empty($channelfield_row['author']) AND 1 == $channelfield_row['litpic']['ifeditable']): ?>
            <dl class="row">
                <dt class="tit">
                    <label for="author">作者</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php echo (\think\Session::get('admin_info.pen_name') ?: '小编'); ?>" name="author" id="author" class="input-txt">
                    &nbsp;<a href="javascript:void(0);" onclick="set_author();" class="ncap-btn ncap-btn-green">设置</a>
                    <p class="notic">设置作者默认名称（将同步至管理员笔名）</p>
                </dd>
            </dl>
            <?php endif; ?>
            <dl class="row">
                <dt class="tit">
                    <label>浏览量</label>
                </dt>
                <dd class="opt">    
                    <input type="text" value="<?php echo $rand_arcclick; ?>" name="click" id="click" class="input-txt">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>阅读权限</label>
                </dt>
                <dd class="opt">
                    <select name="arcrank" id="arcrank" <?php if($admin_info['role_id']>0&&$auth_role_info['check_oneself']<1): ?> disabled="disabled" <?php endif; ?>>
                        <?php if(is_array($arcrank_list) || $arcrank_list instanceof \think\Collection || $arcrank_list instanceof \think\Paginator): $i = 0; $__LIST__ = $arcrank_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['rank']; ?>" <?php if($admin_info['role_id']>0&&$auth_role_info['check_oneself']<1&&$vo['rank']==-1): ?> selected="selected" <?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="articleForm">发布时间</label>
                </dt>
                <dd class="opt">
                    <input type="text" class="input-txt" id="add_time" name="add_time" value="<?php echo date('Y-m-d H:i:s') ?>" autocomplete="off">        
                    <span class="add-on input-group-addon">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    </span> 
                    <span class="err"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="tempview">文档模板</label>
                </dt>
                <dd class="opt">
                    <select name="tempview" id="tempview">
                        <?php if(is_array($templateList) || $templateList instanceof \think\Collection || $templateList instanceof \think\Paginator): $i = 0; $__LIST__ = $templateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo; ?>" <?php if($vo == $tempview): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <input type="hidden" name="type_tempview" value="<?php echo $tempview; ?>" />
                    <span class="err"></span>
                </dd>
            </dl>
            <dl class="row" <?php if(!in_array(($seo_pseudo), explode(',',"2"))): ?>style="display: none;"<?php endif; ?>>
                <dt class="tit">
                    <label>自定义文件名</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="htmlfilename" id="htmlfilename" autocomplete="off" onkeyup="this.value=this.value.replace(/[^\w\-]/g,'-');" onpaste="this.value=this.value.replace(/[^\w\-]/g,'-');" class="input-txt">.html
                    <span class="err"></span>
                    <p class="notic">自定义文件名可由字母、数字、下划线(_)、连接符(-)等符号组成，除此之外其他字符将自动转为连接符(-)</p>
                </dd>
            </dl>
        </div>
        <!-- 其他参数 -->

        <!-- #weapp_diy001_body# -->
        <!-- #weapp_diy002_body# -->

        <div class="ncap-form-default">
            <div class="bot">
                <input type="hidden" name="gourl" value="<?php echo (isset($gourl) && ($gourl !== '')?$gourl:''); ?>">
                <input type="hidden" name="channel" value="<?php echo (\think\Request::instance()->param('channel') ?: ''); ?>">
                <a href="JavaScript:void(0);" onclick="check_submit();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a>
            </div>
        </div> 
    </form>
</div>
<script type="text/javascript">

    $(function () {
        $('#add_time').layDate();   
     
        //选项卡切换列表
        $('.tab-base').find('.tab').click(function(){
            $('.tab-base').find('.tab').each(function(){
                $(this).removeClass('current');
            });
            $(this).addClass('current');
            var tab_index = $(this).data('index');
            $(".tab_div_body").hide();          
            $(".tab_div_"+tab_index).show();
        });

        $('input[name=is_jump]').click(function(){
            if ($(this).is(':checked')) {
                $('.dl_jump').show();
            } else {
                $('.dl_jump').hide();
            }
        });

        var dftypeid = <?php echo (isset($typeid) && ($typeid !== '')?$typeid:'0'); ?>;
        $('#typeid').change(function(){
            var current_channel = $(this).find('option:selected').data('current_channel');
            if (0 < $(this).val() && <?php echo $channeltype; ?> != current_channel) {
                showErrorMsg('请选择对应模型的栏目！');
                $(this).val(dftypeid);
            } else if (<?php echo $channeltype; ?> == current_channel) {
                layer.closeAll();
            }
            GetAddonextitem(1, $(this).val(), <?php echo $channeltype; ?>, 0, true, 'Custom');
        });

        $(document).click(function(){
            $('#often_tags').hide();
            $('#often_tags_input').hide();
            event.stopPropagation();
        });

        $('#often_tags').click(function(){
            $('#often_tags').show();
            event.stopPropagation();
        });
    });

    // 判断输入框是否为空
    function check_submit(){
        if($.trim($('input[name=title]').val()) == ''){
            showErrorMsg('标题不能为空！');
            $($('.tab-base').find('.tab')[0]).trigger('click'); 
            $('input[name=title]').focus();
            return false;
        }
        if ($('#typeid').val() == 0) {
            showErrorMsg('请选择栏目…！');
            $($('.tab-base').find('.tab')[0]).trigger('click'); 
            $('#typeid').focus();
            return false;
        }
        
        layer_loading('正在处理');
        if(!ajax_check_htmlfilename())
        {
            layer.closeAll();
            showErrorMsg('自定义文件名已存在！');
            $('input[name=htmlfilename]').focus();
            return false;
        }

        $('#post_form').submit();
    }

    function img_call_back(fileurl_tmp)
    {
        $("#litpic_local").val(fileurl_tmp);
        $("#img_a").attr('href', fileurl_tmp);
        $("#img_i").attr('onmouseover', "layer_tips=layer.tips('<img src="+fileurl_tmp+" class=\\'layer_tips_img\\'>',this,{tips: [1, '#fff']});");
        $("input[name=is_litpic]").attr('checked', true); // 自动勾选属性[图片]
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
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"./application/admin/template/archives\index.htm";i:1622084942;s:74:"D:\phpstudy_pro\WWW\doudou\application\admin\template\public\theme_css.htm";i:1622084942;}*/ ?>
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
    <title>内容管理</title>
    <link rel="shortcut icon" type="image/x-icon" href="/doudou/favicon.ico" media="screen"/>
    <!-- <link rel="stylesheet" href="/doudou/public/plugins/ztree/css/amazeui.min.css"> -->
    <link rel="stylesheet" href="/doudou/public/plugins/ztree/css/iframe.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="/doudou/public/plugins/ztree/css/zTreeStyle/zTreeStyle.css?v=<?php echo $version; ?>" type="text/css">
    <link href="/doudou/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/doudou/public/static/admin/css/left_nav_tree.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
    <style type="text/css">
        .ztree{padding-top: 0;}
        .ztree li{line-height: 22px;}
        .ztree .node_name{font-size: 13px !important;}
        .ui-layout-west{background-color: #fff;}
        .title-cate{padding:6px 6px 8px 6px;border-bottom: 1px solid #eee;color: #999;font-size: 14px;}
        .allshow{padding:10px 4px 6px;font-size: 13px;color: #333;cursor: pointer;}
        .allshow i{font-style: normal;border: 1px solid #ddd;width: 12px;height: 12px;display:inline-block;line-height: 12px;text-align: center;color: #333;}
    </style>
    
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
    <script src="/doudou/public/static/admin/js/jquery.layout-latest.min.js"></script>
    <script type="text/javascript" src="/doudou/public/plugins/ztree/js/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/doudou/public/plugins/layer-v3.1.0/layer.js"></script>
    <!--[if lt IE 9]>
    <script src="/doudou/public/static/admin/js/html5shiv.js"></script>
    <script src="/doudou/public/static/admin/js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var myLayout;
        $(document).ready(function () {
            myLayout = $("body").layout({
            /*  全局配置 */
                closable:                   true    /* 是否显示点击关闭隐藏按钮*/
            ,   resizable:                  true    /* 是否允许拉动*/
            ,   maskContents:               true    /* 加入此参数，框架内容页就可以拖动了*/
            /*  顶部配置 */
            ,   north__spacing_open:        0       /* 顶部边框大小*/
            /*  底部配置 */
            ,   south__spacing_open:        0       /* 底部边框大小*/
            /*  some pane-size settings*/
            ,   west__minSize:              160     /*左侧最小宽度*/
            ,   west__maxSize:              160     /*左侧最大宽度*/
            /*  左侧配置 */
            ,   west__slidable:             false
            ,   west__animatePaneSizing:    false
            ,   west__fxSpeed_size:         "slow"  /* 'fast' animation when resizing west-pane*/
            ,   west__fxSpeed_open:         1000    /* 1-second animation when opening west-pane*/
            ,   west__fxSettings_open:      { easing: "easeOutBounce" } // 'bounce' effect when opening*/
            ,   west__fxName_close:         "none"  /* NO animation when closing west-pane*/
            ,   stateManagement__enabled:   false   /*是否读取cookies*/
            ,   showDebugMessages:          false 
            }); 
        });

        var zNodes = <?php echo $zNodes; ?>;
        var setting = {
            view:{
                dblClickExpand:false
                ,showLine:true
                 ,showIcon: false
            },
            data:{
                simpleData:{
                    enable:true
                }
            },
            callback:{
                beforeExpand:beforeExpand
                ,onExpand:onExpand
                ,onClick:onClick
            }
        };
        var curExpandNode=null;
        function beforeExpand(treeId,treeNode) {
            var pNode=curExpandNode?curExpandNode.getParentNode():null;
            var treeNodeP=treeNode.parentTId?treeNode.getParentNode():null;
            var zTree=$.fn.zTree.getZTreeObj("tree");
            for(var i=0,l=!treeNodeP?0:treeNodeP.children.length;i<l; i++){
                if(treeNode!==treeNodeP.children[i]){zTree.expandNode(treeNodeP.children[i],false);}
            };
            while (pNode){
                if(pNode===treeNode){break;}
                pNode=pNode.getParentNode();
            };
            if(!pNode){singlePath(treeNode);}
        };
        function singlePath(newNode) {
            if (newNode === curExpandNode) return;
            if (curExpandNode && curExpandNode.open==true) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (newNode.parentTId === curExpandNode.parentTId) {
                    zTree.expandNode(curExpandNode, false);
                } else {
                    var newParents = [];
                    while (newNode) {
                        newNode = newNode.getParentNode();
                        if (newNode === curExpandNode) {
                            newParents = null;
                            break;
                        } else if (newNode) {
                            newParents.push(newNode);
                        }
                    }
                    if (newParents!=null) {
                        var oldNode = curExpandNode;
                        var oldParents = [];
                        while (oldNode) {
                            oldNode = oldNode.getParentNode();
                            if (oldNode) {
                                oldParents.push(oldNode);
                            }
                        }
                        if (newParents.length>0) {
                            zTree.expandNode(oldParents[Math.abs(oldParents.length-newParents.length)-1], false);
                        } else {
                            zTree.expandNode(oldParents[oldParents.length-1], false);
                        }
                    }
                }
            }
            curExpandNode = newNode;
        };

        function onExpand(event,treeId,treeNode){curExpandNode=treeNode;};
        
        function onClick(e,treeId,treeNode){
            var zTree=$.fn.zTree.getZTreeObj("tree");
            zTree.expandNode(treeNode,null,null,null,true);
        }

        $(function(){
            $.fn.zTree.init($("#tree"),setting,zNodes);
            $(".ui-layout-north li:first-child").click();
        });

        function expandAll(obj){
            var expand = $(obj).attr('data-expand');
            var zTree = $.fn.zTree.getZTreeObj("tree");
            if ('shrink' == expand) { // 展开时收缩
                zTree.expandAll(false);
                $(obj).attr('data-expand', 'spread').attr('title', '点击全部展开').html('<i>+</i>全部展开');
            } else { // 收缩时展开
                zTree.expandAll(true);
                $(obj).attr('data-expand', 'shrink').attr('title', '点击全部收缩').html('<i>─</i>全部收缩');
            }
        }
    </script>

    <script type="text/javascript">
        function quick_release()
        {
            //iframe窗
            layer.open({
                type: 2,
                title: '快捷发布文档',
                fixed: true, //不固定
                shadeClose: false,
                shade: 0.3,
                maxmin: true, //开启最大化最小化按钮
                area: ['600px', '520px'],
                content: "//<?php echo \think\Request::instance()->host(); ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=release&iframe=1&lang=<?php echo \think\Request::instance()->param('lang'); ?>"
            });
        }
    </script>
</head>
<body style="padding: 20px 10px 20px 15px;background-color: #f4f4f4;">
    <div class="ui-layout-west">
        <div class="title-cate">内容栏目</div>
        <div class="allshow" onclick="expandAll(this);" data-expand="init" title="点击全部展开"><i>+</i>全部展开</div>
        <div id="tree" class="ztree"></div>
    </div>
    <div class="index_archives ui-layout-center"><iframe name="content_body" id="content_body" src="//<?php echo \think\Request::instance()->host(); ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=index_archives&lang=<?php echo \think\Request::instance()->param('lang'); ?>" style="padding-left: 10px;background-color: #f4f4f4; width: calc(100% -15px);" width="100%" height="100%" frameborder="0"></iframe></div>
</body>
</html>
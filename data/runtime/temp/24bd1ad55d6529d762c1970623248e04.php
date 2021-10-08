<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"./template/pc/lists_corner.htm";i:1632707206;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\header.htm";i:1631599279;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\footer.htm";i:1631534659;}*/ ?>
<!DOCTYPE html>
<html>
    <head> 
        <title><?php echo $eyou['field']['seo_title']; ?></title> 
        <meta name="renderer" content="webkit" /> 
        <meta charset="utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0,minimal-ui" /> 
        <meta name="description" content="<?php echo $eyou['field']['seo_description']; ?>" /> 
        <meta name="keywords" content="<?php echo $eyou['field']['seo_keywords']; ?>" />
		<link media="screen and (min-width:768px)" rel="stylesheet" type="text/css" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/css/css.css">
		<link media="screen and (max-width:768px)" rel="stylesheet" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/css/mobile.css">
		<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/font-awesome/css/font-awesome.min.css","","",""); echo $__VALUE__; ?>
	</head>

    <!-- 角落 -->
    <body>
		<!--header——开始-->
		<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/jquery.min.js","","",""); echo $__VALUE__; ?>

<header class="header" id="sideHeader">
    <div class="header_box">
        <div class="navlist">
            <ul id="nav">
                <li>
                    <a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>" class="web_title"><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_name"); echo $__VALUE__; ?></a>
                </li>
                <li<?php if(\think\Request::instance()->param('m') == 'Index'): ?> class="current"<?php endif; ?>>
                    <a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>" title="主页">
                        <i class="fa fa-home"></i>主页
                    </a>
                </li>
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "current", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                <li class="<?php echo $field['currentstyle']; ?>">
                    <a href="<?php echo $field['typeurl']; ?>">
                        <i class="fa <?php echo $field['englist_name']; ?>"></i><?php echo $field['typename']; ?>
                    </a>
                    <!-- 二级导航Begin -->
                    <?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
                    <ul>
                        <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                        <li>
                            <a href="<?php echo $field2['typeurl']; ?>"><i class="fa <?php echo $field2['englist_name']; ?>"></i><?php echo $field2['typename']; ?></a>
                        </li>
                        <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?>   
                    </ul>
                    <?php endif; ?>
                    <!-- 二级导航End -->
                </li>
                <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
            </ul>
        </div>

        <div class="search_box">
            <i class="fa fa-search"></i>
        </div>
    </div>
</header>

<div class="pop_search">
    <div class="search_close"></div>
    <div class="search_container">
        <div class="search_tips">输入后按回车搜索 ...</div>
        <div class="search_form">
            <?php  $tagSearchform = new \think\template\taglib\eyou\TagSearchform; $_result = $tagSearchform->getSearchform("","","","","","default"); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
            <form method="get" action="<?php echo $field['action']; ?>" onsubmit="return searchForm();" autocomplete="off">
                <i></i>
                <input type="text" name="keywords" id="keywords" value="Search" onFocus="this.value=''" onBlur="if(!value){value=defaultValue}"/>
                <?php echo $field['hidden']; ?>
            </form>
            <?php ++$e; endforeach;endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
        </div>
    </div>
</div>


		<!--header——结束-->

        <div class="page">
            <div class="cover_bg">
                <div class="cover_pic">
                    <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/corner_bg.jpg">
                </div>
                <div class="cover_content">
                    <div class="cover_inner">
                        <h1>角落</h1>
                    </div>
                </div>
            </div>
            <div class="corner_list">
                <div class="ns">
                    <div class="ns_article">
                        <?php  $typeid = "";  if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> "",      "keyword"=> "", ); $tagList = new \think\template\taglib\eyou\TagList; $_result_tmp = $tagList->getList($param, 10, "", "article_content", "desc", "on","off");if(is_array($_result_tmp) || $_result_tmp instanceof \think\Collection || $_result_tmp instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $_result = $_result_tmp["list"]; $__PAGES__ = $_result_tmp["pages"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 60, false);$field["seo_description"] = text_msubstr($field["seo_description"], 0, 160, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                        <div class="ns_article_item">
                            <div class="ns_article_pic">
                                <a href="<?php echo $field['arcurl']; ?>">
                                    <img src="<?php echo $field['litpic']; ?>">
                                </a>
                            </div>
                            <div class="ns_article_content">
                                <div class="ns_article_date">
                                    <span><?php echo MyDate('Y-m-d',$field['add_time']); ?></span>
                                </div>
                                <a class="ns_article_title" href="<?php echo $field['arcurl']; ?>">
                                    <h3><?php echo $field['title']; ?></h3>
                                </a>
                                <div class="ns_article_meta">
                                    <span class="ns_article_count"><?php echo $field['click']; ?> 热度</span>
                                    <span class="ns_article_tag">
                                        <?php  $typeid = ""; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(!isset($aid) || empty($aid)) : $aid = $field['aid']; endif; $tagTag = new \think\template\taglib\eyou\TagTag; $_result = $tagTag->getTag(0, $typeid, $aid, 100, "new", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, 100, true) : $_result->slice(0, 100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
                                        <a href='<?php echo $field2['link']; ?>'><?php echo $field2['tag']; ?></a>
                                        <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; unset($aid); $field2 = []; ?>
                                    </span>
                                    <span class="ns_article_catname">
                                        <a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?></a>
                                    </span>
                                </div>
                                <div class="ns_article_summary">
                                    <p><?php echo html_msubstr($field['seo_description'],0,120,true); ?></p>
                                </div>
                            </div>
                            <div class="ns_article_bottom">
                                <a class="ns_article_more" href="<?php echo $field['arcurl']; ?>">...</a>
                            </div>
                        </div>
                        <?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
                    </div>
                    <div class="book_page">
                        <ul class="pagination">
                             <?php  $__PAGES__ = isset($__PAGES__) ? $__PAGES__ : ""; $tagPagelist = new \think\template\taglib\eyou\TagPagelist; $__VALUE__ = $tagPagelist->getPagelist($__PAGES__, "index,pre,pageno,next,end", "9"); echo $__VALUE__; ?>
                         </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--网站公用底部——开始-->
		<div class="side">
    <a onclick="window.scrollTo('0','0')" rel="nofollow" class="side_back" id="side_back" title="返回顶部">
        <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/back.png">
    </a>
    <a class="side_wy" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/whisper/" id="" title="微言">
        <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/weiyan.png">
    </a>
    <a class="side_ly" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/message/" id="" title="留言">
        <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/write.png">
    </a>
</div>

<footer class="footer">
    <div class="site_info">
        <p class="footer_logo"></p>
        <p class="powered">Powered by <i class="fa fa-vimeo"></i> <span>Doudou</span> with <i class="fa fa-heart"></i> <span>Heidi</span></p>
        <p class="copyright">© 2021 Doudou <a href="https://beian.miit.gov.cn" target="_blank"><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_recordnum"); echo $__VALUE__; ?></a></p>
    </div>
</footer>

<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/js/clicklove.js","","",""); echo $__VALUE__; ?>

<script>
    // 弹出、隐藏搜索框
    $('.fa-search').click(function(){
        $('.pop_search').addClass('visable')
    });
    $('.search_close').click(function(){
        $('.pop_search').removeClass('visable')
    });

    // 滑动显示、隐藏导航栏
    $(function(){ 
        // 滑动滚动条
        $(window).scroll(function(){
            // 滚动条距离顶部的距离 大于 65px时
            if($(window).scrollTop() >= 65){
                $(".header").addClass('header_srcoll');
                $(".header_box").addClass('header_box_scroll');
                $('.side_back').show()
            } else{
                $(".header").removeClass('header_srcoll');
                $(".header_box").removeClass('header_box_scroll');
                $('.side_back').hide()
            }
        })
    })

    // 刷新页面回到顶部
    $('html ,body').animate({ scrollTop:0 },800);
</script>

<!-- 应用插件标签 start --> 
 <?php  $tagWeapp = new \think\template\taglib\eyou\TagWeapp; $__VALUE__ = $tagWeapp->getWeapp("default"); echo $__VALUE__; ?> 
<!-- 应用插件标签 end -->
		<!--网站公用底部——结束-->
    </body>
</html>
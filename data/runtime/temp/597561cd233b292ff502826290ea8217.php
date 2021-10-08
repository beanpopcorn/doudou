<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:29:"./template/pc/view_corner.htm";i:1632280984;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\header.htm";i:1631599279;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\footer.htm";i:1631534659;}*/ ?>
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
      <link href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmspath"); echo $__VALUE__; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
  <link media="screen and (min-width:768px)" rel="stylesheet" type="text/css" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/css/css.css">
  <link media="screen and (max-width:768px)" rel="stylesheet" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/css/mobile.css">
  <?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("skin/Lib/font-awesome/css/font-awesome.min.css","","",""); echo $__VALUE__; ?>
  </head>

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

  <div class="view_bg">
      <div class="view_pic">
          <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/post_bg.jpg">
      </div>
      <div class="view_content">
          <div class="view_inner">
              <h1><?php echo $eyou['field']['title']; ?></h1>
              <div class="view_meta">
                  <span class="view_avatar">
                      <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/avatar.jpg">
                      <span class="view_num"><?php  if(!isset($aid) || empty($aid)) : $aid = "0"; endif; $tagArcclick = new \think\template\taglib\eyou\TagArcclick; $__VALUE__ = $tagArcclick->getArcclick($aid, "", ""); echo $__VALUE__; ?>次浏览</span>
                      <time class="view_time"><?php echo MyDate('Y-m-d',$eyou['field']['add_time']); ?></time>
                  </span>
                  <div class="view_author">Doudou</div>
              </div>
          </div>
      </div>
  </div>

  <div class="view_article">

      <hr>

      <div class="view_article_text"><?php echo $eyou['field']['article_content']; ?></div>
      <div class="view_article_tag">
            <?php if(!(empty($eyou['field']['tags']) || (($eyou['field']['tags'] instanceof \think\Collection || $eyou['field']['tags'] instanceof \think\Paginator ) && $eyou['field']['tags']->isEmpty()))):  $typeid = ""; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(!isset($aid) || empty($aid)) : $aid = "0"; endif; $tagTag = new \think\template\taglib\eyou\TagTag; $_result = $tagTag->getTag(0, $typeid, $aid, 100, "new", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, 100, true) : $_result->slice(0, 100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
                <a href="<?php echo $field['link']; ?>" <?php echo $field['target']; ?>><i class="fa fa-tag"></i><?php echo $field['tag']; ?></a>
                <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; unset($aid); $field = []; endif; ?>
      </div>
      <div class="view_article_nav">
          <div class="view_prev">
              <?php  $tagPrenext = new \think\template\taglib\eyou\TagPrenext; $_result = $tagPrenext->getPrenext("pre");if(!empty($_result) || (($_result instanceof \think\Collection || $_result instanceof \think\Paginator ) && $_result->isEmpty())): $field = $_result; $field["title"] = text_msubstr($field["title"], 0, 30, false); ?>
                  <a href="<?php echo $field['arcurl']; ?>">
                      <div class="view_black"></div>
                      <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/view_prev.jpg">
                      <div class="view_left">
                          <span class="view_prev_cc">上一篇</span>
                          <span class="view_prev_title"><?php echo $field['title']; ?></span>
                      </div>
                  </a>
              <?php else: ?>
                  <a>
                      <div class="view_black"></div>
                      <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/view_prev.jpg">
                      <div class="view_left">
                          <?php  $tagLang = new \think\template\taglib\eyou\TagLang; $__VALUE__ = $tagLang->getLang('a:1:{s:4:"name";s:5:"sys11";}'); echo $__VALUE__; ?>：<?php  $tagLang = new \think\template\taglib\eyou\TagLang; $__VALUE__ = $tagLang->getLang('a:1:{s:4:"name";s:5:"sys10";}'); echo $__VALUE__; ?>
                      </div>
                  </a>
							<?php endif; $field = []; ?>
          </div>
          <div class="view_next">
              <?php  $tagPrenext = new \think\template\taglib\eyou\TagPrenext; $_result = $tagPrenext->getPrenext("next");if(!empty($_result) || (($_result instanceof \think\Collection || $_result instanceof \think\Paginator ) && $_result->isEmpty())): $field = $_result; $field["title"] = text_msubstr($field["title"], 0, 30, false); ?>
                  <a href="<?php echo $field['arcurl']; ?>">
                      <div class="view_black"></div>
                      <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/view_next.jpg">
                      <div class="view_right">
                          <span class="view_prev_cc">下一篇</span>
                          <span class="view_prev_title"><?php echo $field['title']; ?></span>
                      </div>
                  </a>
                  <?php else: ?>
                  <a>
                      <div class="view_black"></div>
                      <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/view_next.jpg">
                      <div class="view_left">
                          <?php  $tagLang = new \think\template\taglib\eyou\TagLang; $__VALUE__ = $tagLang->getLang('a:1:{s:4:"name";s:5:"sys12";}'); echo $__VALUE__; ?>：<?php  $tagLang = new \think\template\taglib\eyou\TagLang; $__VALUE__ = $tagLang->getLang('a:1:{s:4:"name";s:5:"sys10";}'); echo $__VALUE__; ?>
                      </div>
                  </a>
              <?php endif; $field = []; ?>
          </div>
      </div>

      <hr>

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
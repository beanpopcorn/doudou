<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:27:"./template/pc/view_note.htm";i:1630501021;}*/ ?>
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
        <link rel="stylesheet" type="text/css" href="https://www.eyoucms.com/skin/css/model-style.css" />
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="description">
                    <h1><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_name"); echo $__VALUE__; ?></h1>
                    <h2></h2>
                    <nav>
                        <div class="bitcron_nav_container">
                            <div class="bitcron_nav">
                                <div class="mixed_site_nav_wrap site_nav_wrap">
                                    <ul class="mixed_site_nav site_nav sm sm-base">
                                         <li><a href="/" class="active current">首页</a></li>
                                         <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "selected", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                                         <li><a href="<?php echo $field['typeurl']; ?>" class="<?php echo $field['currentstyle']; ?>"><?php echo $field['typename']; ?></a></li>
                                         <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
                                    </ul>
                                    <div class="clear clear_nav_inline_end"></div>
                                </div>
                            </div>
                            <div class="clear clear_nav_end">
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <main>
                <article class="content">
                    <h1><?php echo $eyou['field']['title']; ?></h1>
                    <div class="meta">
                        <span class="item"><time><?php echo MyDate('Y-m-d H:i:s',$eyou['field']['add_time']); ?></time></span>
                        <span class="item"><?php  if(!isset($aid) || empty($aid)) : $aid = "0"; endif; $tagArcclick = new \think\template\taglib\eyou\TagArcclick; $__VALUE__ = $tagArcclick->getArcclick($aid, "", ""); echo $__VALUE__; ?> °C</span>
                        <span><?php echo $eyou['field']['author']; ?></span>
                    </div>
                    <div class="post">
                        <!-- #product# -->
                        <!-- #images# -->
                        <!-- #download# -->
                        <!-- #media# -->
                        <!-- #content# -->
                        <!-- #special# -->
                    </div>
                </article>
                <section class="pager">
                    <p>
                        上一篇：
                        <?php  $tagPrenext = new \think\template\taglib\eyou\TagPrenext; $_result = $tagPrenext->getPrenext("pre");if(!empty($_result) || (($_result instanceof \think\Collection || $_result instanceof \think\Paginator ) && $_result->isEmpty())): $field = $_result; $field["title"] = text_msubstr($field["title"], 0, 100, false); ?>
                        <a href="<?php echo $field['arcurl']; ?>" title="<?php echo $field['title']; ?>"><?php echo html_msubstr($field['title'],0,20); ?></a>  
                        <?php else: ?>
                        没有了
                        <?php endif; $field = []; ?>
                    </p>
                    <p>
                        下一篇：
                        <?php  $tagPrenext = new \think\template\taglib\eyou\TagPrenext; $_result = $tagPrenext->getPrenext("next");if(!empty($_result) || (($_result instanceof \think\Collection || $_result instanceof \think\Paginator ) && $_result->isEmpty())): $field = $_result; $field["title"] = text_msubstr($field["title"], 0, 100, false); ?>
                        <a href="<?php echo $field['arcurl']; ?>" title="<?php echo $field['title']; ?>"><?php echo html_msubstr($field['title'],0,20); ?></a>  
                        <?php else: ?>
                        没有了
                        <?php endif; $field = []; ?>
                    </p>
                </section>
            </main>
        </div>
        <footer><span><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_copyright"); echo $__VALUE__; ?></span></footer>
    </body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:33:"./template/pc/lists_guestbook.htm";i:1631927634;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\header.htm";i:1631599279;s:49:"D:\phpstudy_pro\WWW\doudou\template\pc\footer.htm";i:1631534659;}*/ ?>
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

	<!-- 留言 -->
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
                    <img src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_basehost"); echo $__VALUE__; ?>/template/pc/skin/images/message_bg.jpg">
                </div>
                <div class="cover_content">
                    <div class="cover_inner">
                        <h1>留言</h1>
                    </div>
                </div>
            </div>
            <div class="ms">
				<div class="ms_box">
					<div class="ms_left"></div>
					<div class="ms_right"></div>
					<h1>一言</h1>
					<div class="ms_text">
						<p id="poem"></p>
						<p id="info"></p>
					</div>
				</div>
				<div class="ms_words">
					<p>《从你的全世界路过》· 张嘉佳</p>
					<p>我希望有个如你一般的人</p>
					<p>如山间清爽的风，如古城温暖的光</p>
					<p>清晨到夜晚，从山野到书房</p>
					<p>只要最后是你，就好。</p>
				</div>
				<hr>
				<div class="ms_form">
					<?php  $typeid = ""; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagGuestbookform = new \think\template\taglib\eyou\TagGuestbookform; $_result = $tagGuestbookform->getGuestbookform($typeid, "default", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<form method="POST" <?php echo $field['formhidden']; ?> action="<?php echo $field['action']; ?>" onsubmit="return checkForm();">
						<h3>评论</h3>
						<div class="ms_header">
							<div class="ms_li">
								<span class="ms_title"><?php echo $field['itemname_26']; ?></span>
								<span class="ms_cc">
									<input type='text' id='attr_26' name='<?php echo $field['attr_26']; ?>' placeholder="<?php echo $field['itemname_26']; ?>" value=""/>
								</span>
							</div>
							<div class="ms_li">
								<span class="ms_title"><?php echo $field['itemname_27']; ?></span>
								<span class="ms_cc">
									<input type='text' id='attr_27' name='<?php echo $field['attr_27']; ?>' placeholder="<?php echo $field['itemname_27']; ?>" value=""/>
								</span>
							</div>
							<div class="ms_li">
								<span class="ms_title"><?php echo $field['itemname_28']; ?></span>
								<span class="ms_cc">
									<input type='text' id='attr_28' name='<?php echo $field['attr_28']; ?>' placeholder="<?php echo $field['itemname_28']; ?>" value=""/>
								</span>
							</div>
						</div>
						<div class="ms_area">
							<textarea class="textarea" id='attr_29' name='<?php echo $field['attr_29']; ?>' placeholder="请填写邮箱信息以便及时收到回复哦(。・∀・)ノ" value="" /></textarea>
						</div>
						<div class="ms_submit">
							<input type="submit" value="发送"/>
						</div>
						<?php echo $field['hidden']; ?>
					</form>
					<?php ++$e; endforeach;endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
				</div>
            </div>
        </div>

		<script>
			$.get("https://v1.hitokoto.cn?c=ia&c=b&c=c&c=d&c=e&c=f&c=g&c=h&c=i&c=j&c=k&c=l",function(data,status){
				if(status=='success'){
					$('#poem').html(data.hitokoto);
					if(data.from_who!=null){
						$('#info').html(data.from_who + " · " + "《 " + data.from + " 》");
					}
					else{
						$('#info').html(data.from);
					}
				}
				else{
					$('#poem').html("获取出错啦");
				}
			});
		</script>

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
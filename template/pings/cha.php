<!DOCTYPE html><!-- This web page is copied by "https://bazhan.wang" --><html lang="zh-Hans"><head><meta name="bing-analysis-id" content="1h333036382z2s">  <meta charset="utf-8">  

    
    <!--强制极速模式模式-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <!--移动适配-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">  
    <!--UC强制全屏-->
    <meta name="full-screen" content="yes">  
    <!--UC应用模式-->
    <meta name="browsermode" content="application">  
    <!--QQ强制全屏-->
    <meta name="x5-fullscreen" content="true">  
    <!--QQ应用模式-->
    <meta name="x5-page-mode" content="app">  
    <!--删除默认的苹果工具栏和菜单栏-->
    <meta content="yes" name="apple-mobile-web-app-capable">  
    <meta name="apple-mobile-web-app-title" content="浩涵留言箱">  
    <!--Cache-Control头域-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">  
    <!-- 作者 -->
    <meta name="author" content="忘心"> 
    <!-- 标题 -->
     <title>
      <?php echo $config[ 'title'] ?>
        </title>    <!-- 关键词 -->
    <meta name="keywords" content="<?php echo $config['keywords'] ?>"> 
    <!-- 内容标签简介 -->
    <meta name="description" content="<?php echo $config['description'] ?>"> 
    <!-- 图标 -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo $config['logo'] ?>">
    <!-- 主体css -->
  <link rel="stylesheet" href="../template/pings/css/css.css" type="text/css">
  <link rel="stylesheet" href="../template/pings/css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="../template/pings/css/style.css" type="text/css">
  <!-- 限制hr标签的上下行距 -->
  <style type="text/css">
      hr
      {
          margin-top: 15px;
          margin-bottom: 14px;
      }
  </style>  
  <!-- 限制hr标签的上下行距 -->
  <!-- 主体sj -->
  <script src="../template/pingsjs/jquery.js"></script>  
  <script src="../template/pingsjs/skel.js"></script>  
  <script src="../template/pingsjs/util.js"></script>  
  <script src="../template/pingsjs/respond.js"></script>  
  <!-- 随机一言 -->
  <script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>  
</head>
<body>
    <div id="wrapper">
	<!--主页-->
        <article id="home" class="panel special" style="display: flex;">
			 <div class="content">
                <ul class="actions spinX">
                    <li><a href="./" class="button small back">返回</a>
                    </li>
                </ul>
                <div class="inner"><b>
                    <header>
                        <h2>查留言</h2>
                        <blockquote><span id="hitokoto">获取中...</span></blockquote>
                    </header>
                    </b>
				<form action="?tp=pings&action=cha" method="post" name="tijiao">
	          <input type="text" name="name" placeholder="请输入姓名或者暗号查看留言" style="background-color:transparent; border:0px; height:30px; font-size:18px; width:100%">
                <center>
                 <hr>
				 <ul class="actions">
                        <li>
						<input type="submit" name="go" class="css_btn_class" style="background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;" value="查询留言">
                    </li>
					</ul>
							<center>
		<div id="info_comment"
    <center>------------------留言记录------------------</center>
    <?php if($_POST[ "go"]){ include_once( "admin/common.php"); $sqlcx="select * from fanall where name='" .$_POST[ "name"]. "'"; $sqlcxgo=mysqli_query($connect,$sqlcx); if($sqlcxgo>0){ while($myrow=mysqli_fetch_array($sqlcxgo)){ echo '
    <div style="padding:20px;border:1px solid #BEBEBE;background:#ffc7c6">'; echo "时间:".$myrow['time']."
        <br>
        <hr>"; $atte = $myrow['text']; echo htmlentities($atte,ENT_QUOTES,"UTF-8"); echo "</div>
    </p>"; } }else{ echo "未查询到留言"; } } ?>
    <br><br>
    </div>
      </center>
                 
                </center></form></div>
            </div>
        </article>
		
         <?php include_once 'footer.php'; ?>
    </div>
   
    <script>
        (function($) {
            skel.breakpoints({
                xlarge: '(max-width: 1680px)',
                large: '(max-width: 1280px)',
                medium: '(max-width: 980px)',
                small: '(max-width: 736px)',
                xsmall: '(max-width: 480px)',
                xxsmall: '(max-width: 360px)'
            });
            $(function() {
                var $window = $(window),
                    $document = $(document),
                    $body = $('body'),
                    $wrapper = $('#wrapper'),
                    $footer = $('#footer');
                $window.on('load', function() {
                    window.setTimeout(function() {
                        $body.removeClass('is-loading-0');
                        window.setTimeout(function() {
                            $body.removeClass('is-loading-1');
                        }, 1500);
                    }, 100);
                });
                $('form').placeholder();
                var $wrapper = $('#wrapper'),
                    $panels = $wrapper.children('.panel'),
                    locked = true;
                $panels.not($panels.first()).addClass('inactive').hide();
                $panels.each(function() {
                    var $this = $(this),
                        $image = $this.children('.image'),
                        $img = $image.find('img'),
                        position = $img.data('position');
                    $image.css('background-image', 'url(' + $img.attr('src') + ')');
                    if (position) $image.css('background-position', position);
                    $img.hide();
                });
                window.setTimeout(function() {
                    locked = false;
                }, 1250);
                $('a[href^="#"]').on('click', function(event) {
                    var $this = $(this),
                        id = $this.attr('href'),
                        $panel = $(id),
                        $ul = $this.parents('ul'),
                        delay = 0;
                    event.preventDefault();
                    event.stopPropagation();
                    if (locked) return;
                    locked = true;
                    $this.addClass('active');
                    if ($ul.hasClass('spinX') || $ul.hasClass('spinY')) delay = 250;
                    window.setTimeout(function() {
                        $panels.addClass('inactive');
                        $footer.addClass('inactive');
                        window.setTimeout(function() {
                            $panels.hide();
                            $panel.show();
                            $document.scrollTop(0);
                            window.setTimeout(function() {
                                $panel.removeClass('inactive');
                                $this.removeClass('active');
                                locked = false;
                                $window.triggerHandler('--refresh');
                                window.setTimeout(function() {
                                    $footer.removeClass('inactive');
                                }, 250);
                            }, 100);
                        }, 350);
                    }, delay);
                });
                if (skel.vars.IEVersion < 12) {
                    $window.on('--refresh', function() {
                        $wrapper.css('height', 'auto');
                        window.setTimeout(function() {
                            var h = $wrapper.height(),
                                wh = $window.height();
                            if (h < wh) $wrapper.css('height', '100vh');
                        }, 0);
                        if (skel.vars.IEVersion < 10) {
                            var $panel = $('.panel').not('.inactive'),
                                $image = $panel.find('.image'),
                                $content = $panel.find('.content'),
                                ih = $image.height(),
                                ch = $content.height(),
                                x = Math.max(ih, ch);
                            $image.css('min-height', x + 'px');
                            $content.css('min-height', x + 'px');
                        }
                    });
                    $window.on('load', function() {
                        $window.triggerHandler('--refresh');
                    });
                    $('.spinX').removeClass('spinX');
                    $('.spinY').removeClass('spinY');
                }
            });
        })(jQuery);
    </script>  
	
</body>  </html>  
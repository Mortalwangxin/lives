<!DOCTYPE html>
<html lang="zh-Hans"><head><meta name="google-analysis-id" content="2y1h2u1d33362v32"><!--!‬‏‎‫‬‏‬‏‪‫‬‫‭‪‭
‭‫‪‬‏‫‭‪‬--><meta charset="utf-8"> 
    
    
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
    <meta name="apple-mobile-web-app-title" content="<?php echo $config[ 'title'] ?>"> 
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
    <link rel="stylesheet" href="../template/pings/css/style.css" type="text/css">
    <link href="../template/css/layui.css" rel="stylesheet" type="text/css">
    <!-- 主体sj -->
	<script src="../template/pings/js/jquery.js"></script> 
	<script src="../template/pings/js/jquery.min.js"></script> 
    <!-- 随机一言 -->
    <script src="../template/pings/js/index.js" defer=""></script> 
</head>
<body background="../template/pings/img/bg.gif">
<div id="wrapper">
    <article id="home" class="panel special" style="display: flex;">
        <div class="image" style="background-image: url(https://api.vvhan.com/api/bing?rand=sj); background-position: center center;">
            <img src="https://api.vvhan.com/api/bing?rand=sj" alt="" data-position="center center" style="display: none;">
        </div>
        <div class="content">
            <div class="inner">
                <header>
                    <h1><?php echo $config[ 'title'] ?></h1>
                    <p>
                        <span id="hitokoto">获取中...</span></p>
                    <br>
                </header>
                <nav id="nav">
                    <ul class="actions vertical special spinY">
                        <li><a href="?tp=pings&action=note" class="button">写留言</a>
                        </li>
                        <li><a href="?tp=pings&action=cha" class="button">查留言</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </article>
    <?php include_once 'footer.php'; ?>
    
</div>

</body>‬‫‭‪‭‭‫‪‬‏‫‭‪‬- ></html> 
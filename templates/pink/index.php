<?php
// 引入配置文件
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
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

        <link href="../templates/pink/css/chunk-vendors.b30bcc46.css" rel=preload as=style>
        <link href="../templates/pink/css/chunk-vendors.b30bcc46.css" rel=stylesheet>
        <link href="../templates/pink/css/app.b647dd67.css" rel=stylesheet>
        </head>
         
           
        <body>
            

                <div id="app">
                    <div data-v-264a79cb="" class="content-main"><div data-v-264a79cb="" class="shanzha"><div data-v-264a79cb="" class="logo-and-wish flex-box"><img data-v-264a79cb="" src="<?php echo $config['logo'] ?>" class="logo"><div data-v-264a79cb="">这里的每个故事都是一朵花</div>
                    </div>
                    <a href="cha.php">
                    <div  data-v-264a79cb="" class="btn-submit btn-first">看留言</div></a>
                    <a href="note.php">
                    <div  data-v-264a79cb="" class="btn-submit btn-second">写留言</div></a>
                    </div>
                    <div data-v-264a79cb="" class="van-hairline--top-bottom van-tabbar van-tabbar--fixed" style="z-index: 1;">
                       </div>


                </body>
                </html>
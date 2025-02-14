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

        
        <link href="../templates/pink/css/sty.css" rel=stylesheet>
        </head>
         
           
        <body>
            

        <div class="header">
            <img src="<?php echo $config['logo']; ?>" alt="Logo" class="logo">
            <div class="title">想说的情话寄存在我这</div>
        </div>
    
        <div class="main-content">
            <a href="cha.php" class="btn">查看留言</a>
            <a href="note.php" class="btn">写留言</a>
        </div>


                </body>
                </html>
<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title><?php echo $config['title']; ?></title>
    <meta name="keywords" content="<?php echo $config['keywords']; ?>"> 
    <meta name="description" content="<?php echo $config['description']; ?>"> 
    <link rel="shortcut icon" type="image/ico" href="<?php echo $config['logo']; ?>">
    <link href="../templates/pink/css/sty.css" rel="stylesheet"> <!-- 确保路径正确 -->
</head>
<body class="pink-body">
    <div class="pink-header">
         <div class="pink-logo">
            <a href="index.php">
                <img src="<?php echo $config['logo']; ?>" alt="Logo">
            </a>
        </div>
        <div class="pink-title">想说的情话寄存在我这</div>
    </div>
    
    <div class="pink-main-content">
        <a href="cha.php" class="pink-btn">查看留言</a>
        <a href="note.php" class="pink-btn">写留言</a>
    </div>
</body>
</html>
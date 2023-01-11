<?php include_once 'admin/common.php'; ?>
<!DOCTYPE html>
<html lang="zh">
    
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $config[ 'title'] ?>岛</title>
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
        <!--Cache-Control头域-->
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <!--网站关键词-->
        <meta name="keywords" content="<?php echo $config['keywords'] ?>">
        <!--网站描述-->
        <meta name="description" content="<?php echo $config['description'] ?>">
        <!--favicon-->
        <link rel="shortcut icon" href="<?php echo $config['logo'] ?>">
        <!--主体css-->
        <link rel="stylesheet" href="../css/mian.css">
    </head>
    
    <body>
        <div class="box">
               <div id="search_button">
                <div id="pic">
                    <img src="<?php echo $config['logo'] ?>">
                </div>
            </div>
            <br>
            <br>
            <div style="padding:60px;border:1px solid #96c2f1;background:#ffc7c6">
                <form action="cha.php" method="post" name="tijiao">
                    <input type="text" name="name" placeholder="请输入姓名或者暗号查看留言"   style="background-color:transparent; border:0px; height:30px; font-size:18px; width:100%" />
                    <center>
                        <hr>
                        <input type="submit" name="go" class="css_btn_class" value="查询留言">
                        <br>
                        <br>
                </form>
                </center>
                <center>
<a class="css_btn_class" href="./">写留言</a>
                    <br>
                    </form>
                </center>
                </div>
    </body>
    <center>------------------留言记录------------------</center>
    <?php if($_POST[ "go"]){ include_once( "admin/common.php"); $sqlcx="select * from fanall where name='" .$_POST[ "name"]. "'"; $sqlcxgo=mysqli_query($connect,$sqlcx); if($sqlcxgo>0){ while($myrow=mysqli_fetch_array($sqlcxgo)){ echo '
    <div style="padding:20px;border:1px solid #BEBEBE;background:#ffc7c6">'; echo "时间:".$myrow['time']."
        <br>
        <hr>"; $atte = $myrow['text']; echo htmlentities($atte,ENT_QUOTES,"UTF-8"); echo "</div>
    </p>"; } }else{ echo "未查询到留言"; } } ?>
    <br><br>
    <?php include_once 'footer.php'; ?>

</html>
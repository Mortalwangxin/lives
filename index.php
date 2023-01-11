<?php include_once 'admin/common.php'; ?>
<!DOCTYPE html>
<html lang="zh">
    
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $config[ 'title'] ?>
        </title>
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
        <div id="pic"><img src="<?php echo $config['logo'] ?>"></div>
    </div>
    <div id="info_top">
        <form action="fk.php" method="post" name="go">
                    <input type="text" name="name" placeholder="输入暗号"   style="background-color:#FFFFFF; border:0px; height:30px; font-size:18px; width:80%" />
                    <font color="red">
        <div class="infos">把你的想说的小秘密存在信箱里吧～</div> </font>
                    <hr>   
    </div>
    
        <div style="padding:20px;border:1px solid #96c2f1;background:#ffc7c6">
            <textarea name="text" placeholder="你想要留言的内容"   style="background-color:#FFFFFF; border:0px; height:120px; font-size:18px; width:100%" /></textarea>
              <span onmouseover="" style="font-size:8px;color:red">(暗号尽量别用姓名容易重名！！，不然加上地区也可以，例如山东-小明！！）</span>

                <br> 
                <center>
                    <hr>
                    <input type="submit" name="go" class="css_btn_class" value="提交留言">
                    <br>
                    <br>
                    </form>
                </center>
                <center>
                  <a class="css_btn_class" href="/cha.php">查看留言</a>
                  </center>
                    <br>
                    </form>
                    </div>
                    <?php include_once 'footer.php'; ?>
                    </div>
            
    </div>

    </body>
</html>
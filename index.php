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
    <div id="info_comment">
        <form action="fk.php" method="post" onsubmit="return check()">
                    <input type="text" name="name" placeholder="输入暗号"   id="name" />
                    <font color="red">
        <div class="infos">把你的想说的小秘密存在信箱里吧～</div> </font>
   <br>
            <textarea name="text" placeholder="你想要留言的内容"   id="comment" /></textarea>
              <span onmouseover="" style="font-size:8px;color:red">(暗号尽量别用姓名容易重名！！，不然加上地区也可以，例如山东-小明！！）</span>
          </div>
          <div id="info_comment">
                <center>
                    <input type="submit" class="css_btn_class" value="提交留言">
                    <br>
                    <br>
                    </form>
                </center>
                <center>
                  <a class="css_btn_class" href="/cha.php">查看留言</a>
                  </center>
                    <br>
                    </div>
                    <?php include_once 'footer.php'; ?>
                    </div>
            
    </div>
<script>
    function check() {
        //获取name数组中的第0个索引 并且去掉空格
        let text = document.getElementsByName('text')[0].value.trim();
        let filter = new RegExp("[<?php echo $setinfo['lanjie']?>]");
        let weifan = new RegExp("[<?php echo $setinfo['lanjiezf']?>]");
        if (filter.test(text)) {
            alert("您的内容包含特殊字符 防止xss注入 本次提交已拦截")
            return false;
        } else if (weifan.test(text)) {
            alert("您输入的内容是违禁词 请注意您的发言")
            return false;
        }
        let name = document.getElementsByName("name")[0].value.trim();
        let nameweijin = new RegExp("[<?php echo $setinfo['lanjie']?>]");
        let namefilter = new RegExp("[<?php echo $setinfo['lanjiezf']?>]");
        if (nameweijin.test(name)) {
            alert("您的昵称包含特殊字符 防止xss注入 本次提交已拦截")
            return false;
        }else if (namefilter.test(name)) {
            alert("您输入的昵称是违禁词 请注意您的发言")
            return false;
        }
        e

    }
</script>
    </body>
</html>
<?php
//开启会话
session_start();
$adminname = trim($_POST['adminname']);
?>
<?php
include_once 'common.php';
$sql = "select * from wx_admin where adminname = '" . $_SESSION['adminname'] . " ' ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $text = mysqli_fetch_array($result);
} else {
    header("Location:login.php");
    die("参数错误");
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>首页 - 忘心留言箱后台管理</title>
<link rel="icon" href="../<?php echo $config['logo'] ?>" type="image/ico">
<meta name="keywords" content="忘心博客,忘心留言箱,忘心,忘心留言箱后台管理">
<meta name="description" content="忘心留言箱">
<meta name="author" content="忘心">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/materialdesignicons.min.css" rel="stylesheet">
<link href="../css/style.min.css" rel="stylesheet">
</head>
  
<body>
<body>
<?php include_once 'header.php';
?> 
<!--页面主要内容-->
    <main class="lyear-layout-content">
      
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                
                  
                <hr>
                <form method="post" action="lysetpost.php" class="site-form">
                 
                  <div class="form-group">
                    <label for="nickname">拦截违禁词——无需分隔</label>
                    <textarea class="form-control" name="lanjiezf" id="lanjiezf" rows="5"  value="" placeholder="请输入要拦截的词，无需分隔"><?php echo $setinfo['lanjiezf'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="qq">拦截非法标签 ——无需分隔</label>
                    <textarea type="qq" class="form-control" name="lanjie" id="lanjie" rows="5" aria-describedby="emailHelp"  placeholder="请输入要拦截的字符，无需分隔" value=""><?php echo $setinfo['lanjie'] ?></textarea>
                    
                  </div>
                  <button type="submit" class="btn btn-primary">保存</button>
                </form>
       
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
      
    </main>
    <!--End 页面主要内容-->
  </div>
</div>


</body>
</html>
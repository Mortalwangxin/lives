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
<?php include_once 'header.php';
?>     
    
    <!--页面主要内容-->
    <main class="lyear-layout-content">
      
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-primary">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">凑数</p>
                  <p class="h3 text-white m-b-0 fa-1-5x">为了好看</p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-currency-cny fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-danger">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">总留言数</p>
                  <p class="h3 text-white m-b-0 fa-1-5x"> <?php echo $shu ?> </p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-success">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">凑数</p>
                  <p class="h3 text-white m-b-0 fa-1-5x">为了好看</p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-purple">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">总留言</p>
                  <p class="h3 text-white m-b-0 fa-1-5x"><?php echo $shu ?></p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-outline fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="row">
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>程序信息</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>程序作者</td>
                        <td><a href="https://www.wxword.cn">忘心</a></td>
                        <td><a href="https://www.wxword.cn">进入博客</a></td>
                        <td>
                          <div class="progress progress-striped progress-sm">
                            <div class="progress-bar progress-bar-warning" style="width: 100%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>程序版本：</td>
                        <td>1.1</td>
                       
                        </td>
                      </tr>
                      <tr>
                        <td>使用文档</td>
                        <td><a href="https://www.wxword.cn/archives/330.html" target="_blank">忘心留言箱使用及开发手册</a></td>
                      </tr>
                      <tr>
                         <td>最新版:</td>
                        <td><a href="<?php echo $xz?>" target="_blank">点击获取<?php echo $fwqbb?>版本</a></td>
                      </tr>
                      <tr>
                        <td>项目地址</td>
                        <td><a href="https://gitee.com/wangxinqq/forgetting-message-box" target="_blank">Gitee忘心留言箱</a></td>
                      </tr>
                       <tr>
                        <td>项目地址</td>
                        <td><a href="https://github.com/Mortalwangxin/lives" target="_blank">Github忘心留言箱</a></t>
                      </tr>
                      <tr>
                        <td>鸣谢</td>
                        <td><a href="http://lyear.itshubao.com/v4/index.html" target="_blank">光年(Light Year AdminV4)后台管理系统模板</a></td>
                        </td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
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

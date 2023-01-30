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
              <ul class="nav nav-tabs page-tabs">
                <li class="active"> <a href="#!">基本</a> </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="adminpost.php" method="post" name="edit" class="edit">
                  
                    <div class="form-group">
                      <label for="web_site_title">网站标题</label>
                      <input class="form-control" type="text" id="web_site_title" name="title" value="<?php echo $config['title'] ?>" placeholder="请输入站点标题" >
                    </div>
                    <div class="form-group">
                      <label for="web_site_logo">LOGO图片</label>
                        <input type="text" class="form-control" name="logo" id="web_site_logo" value="<?php echo $config['logo'] ?>" placeholder="logo.png" /> 
                                            </div>
                    <div class="form-group">
                      <label for="web_site_keywords">站点关键词</label>
                      <input class="form-control" type="text" id="web_site_keywords" name="keywords" value="<?php echo $config['keywords'] ?>" placeholder="请输入站点关键词" >
                    </div>
                    <div class="form-group">
                      <label for="web_site_description">站点描述</label>
                      <textarea class="form-control" id="web_site_description" rows="5" name="description" value="<?php echo $config['description'] ?>" placeholder="请输入站点描述" ><?php echo $config['description'] ?></textarea>
                    </div>
                    
                    
                      <div class="form-group">
                    <label for="member">网站模板选择</label>
                    <div>
                       
                      <select class="form-control" id="member" name="member" size="1">
                          <?php
                          if($config['member'] ==lives)
                          {
                          echo'<option value="lives" selected >lives</option>';
                          }else
                          {
                             echo' <option value="lives" >lives</option>';
                          }
                          if($config['member'] ==pings)
                          {
                          echo'<option value="pings" selected >pings</option>';
                          }else
                          {
                             echo' <option value="pings" >pings</option>';
                          }
                          if($config['member'] ==shanzha)
                          {
                          echo'<option value="shanzha" selected >shanzha</option>';
                          }else
                          {
                             echo' <option value="shanzha" >shanzha</option>';
                          }
                        ?>
                      </select>

                    </div>
                  </div>
                  
                    <div class="form-group">
                      <label for="web_site_copyright">版权信息</label>
                      <input class="form-control" type="text" id="web_site_copyright" name="copyright" value="<?php echo $config['copyright'] ?>" placeholder="请输入版权信息" >
                    </div>
                     <div class="form-group">
                      <label for="web_site_copyright">站长网址</label>
                      <input class="form-control" type="text" id="web_site_copyright" name="wz" value="<?php echo $config['wz'] ?>" placeholder="请输入网址带http://或https://" >
                    </div>
                    <div class="form-group">
                      <label for="web_site_icp">备案信息</label>
                      <input class="form-control" type="text" id="web_site_icp" name="icp" value="<?php echo $config['icp'] ?>" placeholder="请输入备案信息" >
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5" name="edit" >确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
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
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
              <div class="card-toolbar clearfix">
                <form class="pull-right search-bar" method="get" action="" role="form">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <input type="hidden" name="search_field" id="search-field" value="title">
                      <button class="btn btn-default dropdown-toggle" id="search-btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                      标题 <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li> <a tabindex="-1" href="javascript:void(0)" data-field="cat_name">暗号</a> </li>
                      </ul>
                    </div>
                    <input type="text" class="form-control" value="" name="keyword" placeholder="请输入名称">
                  </div>
                </form>
              </div>
            
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" id="check-all"><span></span>
                          </label>
                        </th>
                        <th>id</th>
                        <th>暗号</th>
                        <th>内容</th>
                        <th>时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                         <?php
                         //总数
 $count_sql = 'select count(id) as c from fanall';
$result = mysqli_query($connect, $count_sql);
$data = mysqli_fetch_assoc($result);
//得到总的用户数
$count = $data['c'];

if (isset($_GET['cha'])) {
$cha = (int) $_GET['cha'];
} else {
$cha = 1;
}
$num = 20;
$total = ceil($count / $num);

if ($cha <= 1) {
$cha = 1;
}
if ($cha >= $total) {
$cha = $total;
}
$num = 20;
$offset = ($cha - 1) * $num;
$sql = "select id,name,text,time from fanall order by id desc limit $offset , $num";
$result = mysqli_query($connect, $sql);

                         if ($result && mysqli_num_rows($result)) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                      <tr>
                        <td>
                          <label class="lyear-checkbox checkbox-primary">
                            <input type="checkbox" name="ids[]" value="1"><span></span>
                          </label>
                        </td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['text'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                            <td>
                                    <a href="javascript:del(<?php echo $lyinfo['id']; ?>,'<?php echo $lyinfo['text']; ?>');">
                                        <button style="white-space: nowrap;" type="button"
                                                class="btn btn-danger btn-rounded">
                                            <i class=" mdi mdi-delete-empty mr-1"></i>删除
                                        </button>
                                    </a>
                                    
                                </td>
                        </td>
                      </tr>
                      <?php
          }
                         }
              echo'<tr>
              <ul class="pagination">
                  <li class="disabled"><a href="cha.php?cha=' . ($cha - 1) . '">上一页</a></li>
                  <li class="active"><a href="page.php?page=1">首页</a></li>
                  <li class="disabled"><a href="cha.php?cha=' . ($cha + 1) . '">下一页</a></li>
                 <li class="disabled"><a href="cha.php?cha=' . $total . '">尾页</a>
                 </ul>
                 <li>当前是第' . $cha . '页 共' . $total . '页</li>
                 </li>
                
                </tr>'
                    ?>
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

<script>
    function del(id, text) {
        if (confirm('您确认要删除 ' + text + ' 内容吗')) {
            location.href = 'sanchu.php?id=' + id;
        }
    }
</script>
<script src="/admin/js.js"></script>


</body>
</html>
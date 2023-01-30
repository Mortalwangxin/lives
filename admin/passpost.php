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
<?php
include_once 'common.php';
session_start();
$adminpass = trim($_POST['confirmpwd']);
$sql = "Update wx_admin set adminpass = md5('$adminpass') where id = '1'";
      $result = mysqli_query($connect, $sql);
     if ($result) {
        echo "<script>alert('更新成功');location.href = 'pass.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }

?>
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
$texiao = trim($_POST['texiao']);
$shubaio = trim($_POST['shubiao']);
$pingbi = trim($_POST['pingbi']);
$sql = "Update tx set texiao = '$texiao', shubiao = '$shubaio', pingbi = '$pingbi'";
      $result = mysqli_query($connect, $sql);
     if ($result) {
        echo "<script>alert('更新成功');location.href = 'tx.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }
?>

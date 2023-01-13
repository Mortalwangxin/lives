<?php
session_start();

$adminname = trim($_POST['name']);
$adminpass = trim(md5($_POST['pass']));
include_once "common.php";
$sql = "select * from wx_admin where adminname = '$adminname' and adminpass = '$adminpass' ";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($num) {

        $_SESSION['adminname'] = $adminname;
        echo "<script>alert('登录成功');window.location.href='index.php'</script>";
    } else {

        unset($_SESSION['adminname']);
        echo "<script>alert('登录失败，用户名或密码错误');history.back();</script>";
    }
}
?>
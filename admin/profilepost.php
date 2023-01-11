<?php
include_once 'common.php';
session_start();
$adminname = trim($_POST['adminname']);
$adminqq = trim($_POST['qq']);

$sql = "Update wx_admin set adminname = '$adminname',adminqq = '$adminqq' where id = '1'";
      $result = mysqli_query($connect, $sql);
     if ($result) {
        echo "<script>alert('更新成功');location.href = 'pass.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }


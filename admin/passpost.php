<?php
include_once 'common.php';
session_start();
$adminpass = trim($_POST['confirmpwd']);
$sql = "Update wx_admin set adminpass = '$adminpass' where id = '1'";
      $result = mysqli_query($connect, $sql);
     if ($result) {
        echo "<script>alert('更新成功');location.href = 'pass.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }


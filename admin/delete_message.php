<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php';

if (isset($_GET['id'])) {
    $id = $connect->real_escape_string($_GET['id']);
    $sql = "DELETE FROM fanall WHERE id = '$id'";
    if ($connect->query($sql) === TRUE) {
        header('Location: messages.php');
        exit();
    } else {
        echo "删除失败: " . $connect->error;
    }
} else {
    header('Location: messages.php');
    exit();
}
?>
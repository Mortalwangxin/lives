<?php
include_once 'includes/functions.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 检查必填字段
    if (empty($_POST["name"]) || empty($_POST["text"])) {
        echo "<script>alert(\"请填完整哦！\");</script>";
        echo "<script language='javascript'>document.location = '" . htmlspecialchars($config['wz']) . "';</script>";
        exit();
    }

    // 获取表单数据
    $name = $connect->real_escape_string($_POST["name"]);
    $text = $connect->real_escape_string($_POST["text"]);
    $age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
    $name_id = isset($_POST['name_id']) ? (int)$_POST['name_id'] : 0;
    $notify = isset($_POST['notify']) && $_POST['notify'] === '1';
    $to = isset($_POST['notify-email']) ? $connect->real_escape_string($_POST['notify-email']) : '';

    // 插入数据
    $stmt = $connect->prepare("INSERT INTO fanall (name, text, age, name_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $name, $text, $age, $name_id);

    if ($stmt->execute()) {
        // 发送通知邮件
        if ($notify && !empty($to)) {
            $title = "你有一封留言——留言箱";
            $content = '你有一份留言 <a style="text-decoration:none; color:#12addb" href="' . htmlspecialchars($config['wz']) . '" target="_blank">查看信封内容</a> 查看暗号为：' . htmlspecialchars($name);
            $result = sendMail($to, $title, $content);

            if ($result) {
                echo "<script>alert(\"发送通知成功！\");</script>";
            } else {
                error_log("邮件发送失败：$to, $title, $content");
                echo "<script>alert(\"发送通知失败，请及时和站长联系！\");</script>";
            }
        }

        echo "<script>alert(\"恭喜你留言成功！\");</script>";
        echo "<script language='javascript'>document.location = '" . htmlspecialchars($config['wz']) . "';</script>";
    } else {
        echo "<script>alert(\"留言失败，请及时和站长联系！错误信息：" . htmlspecialchars($stmt->error) . "\");</script>";
        echo "<script language='javascript'>document.location = '" . htmlspecialchars($config['wz']) . "';</script>";
    }
}
?>
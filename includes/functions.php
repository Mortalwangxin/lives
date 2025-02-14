<?php
require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';

require_once 'config.php';

function sendMail($to, $title, $content) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.qq.com';
    $mail->SMTPAuth = true;
    $mail->Username = get_config('smtp_email');  // 从数据库获取 QQ 邮箱地址
    $mail->Password = get_config('smtp_password');  // 从数据库获取 QQ 邮箱授权码
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->From = get_config('smtp_email');
    $mail->FromName = get_config('admin_name');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $content;
    // $mail->SMTPDebug = 2; // 输出调试信息
    // $mail->Debugoutput = 'html'; // 以 HTML 格式输出调试信息        
    return $mail->send();
}
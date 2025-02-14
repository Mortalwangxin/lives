<?php
include_once '../config.php';

if (isset($_GET['id'])) {
    $template_id = $connect->real_escape_string($_GET['id']);
    // 假设 `set_current_template` 是一个函数，用于设置当前模板
    set_current_template($template_id);
}

header('Location: templates.php');
exit();
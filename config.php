<script>
//违禁
//     function check() {
//     let text = document.getElementsByName('text')[0].value.trim();
//     let filter = new RegExp("<?php echo $setinfo['lanjie']?>","g");
//     let weifan = new RegExp("<?php echo $setinfo['lanjiezf']?>", "g");
//     if (filter.test(text)) {
//         alert("您的内容包含特殊字符 防止xss注入 本次提交已拦截")
//         return false;
//     } else if (weifan.test(text)) {
//         alert("您输入的内容是违禁词 请注意您的发言")
//         return false;
//     }
//     let name = document.getElementsByName("name")[0].value.trim();
//     let nameweijin = new RegExp("<?php echo $setinfo['lanjie']?>","g");
//     let namefilter = new RegExp("<?php echo $setinfo['lanjiezf']?>", "g");
//     if (nameweijin.test(name)) {
//         alert("您的昵称包含特殊字符 防止xss注入 本次提交已拦截")
//         return false;
//     } else if (namefilter.test(name)) {
//         alert("您输入的昵称是违禁词 请注意您的发言")
//         return false;
//     }
// }

    
//字数检测
    function countChars() {
        var input = document.getElementById("content");
        var count = document.getElementById("charCount");
        count.innerHTML = input.value.length;
    }
//隐藏邮箱
     function showEmailInput() {
        var checkbox = document.getElementsByName('notify')[0];
        var emailInput = document.getElementById('email-input');
        if (checkbox.checked == true) {
            emailInput.style.display = 'block';
        } else {
            emailInput.style.display = 'none';
        }
    }
    
</script>
<?php
// 数据库配置
define('DB_HOST', 'localhost');
define('DB_USER', 'db_user');
define('DB_PASS', 'db_pass');
define('DB_NAME', 'db_name');

// 连接数据库
$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connect->connect_error) {
    die("数据库连接失败: " . $connect->connect_error);
}

// 获取当前启用的模板
function get_current_template() {
    global $connect;
    $result = $connect->query("SELECT template_name FROM templates WHERE is_active = 1");
    $row = $result->fetch_assoc();
    return $row['template_name'] ?? 'lives';
}

// 获取所有模板
function get_all_templates() {
    global $connect;
    $result = $connect->query("SELECT * FROM templates");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 设置当前模板
function set_current_template($template_id) {
    global $connect;
    $connect->query("UPDATE templates SET is_active = 0");
    $connect->query("UPDATE templates SET is_active = 1 WHERE id = $template_id");
}

// 获取配置项
function get_config($key) {
    global $connect;
    $result = $connect->query("SELECT value FROM config WHERE config_key = '$key'");
    $row = $result->fetch_assoc();
    return $row['value'] ?? '';
}

// 获取所有配置
function get_all_config() {
    global $connect;
    $result = $connect->query("SELECT * FROM config");
    $config = [];
    while ($row = $result->fetch_assoc()) {
        $config[$row['config_key']] = $row['value'];
    }
    return $config;
}


// 获取全局配置
$config = get_all_config();

// 获取留言数量
$message_count = $connect->query("SELECT COUNT(*) FROM fanall")->fetch_row()[0];

$currentVersion = '2.0.1';

ini_set('display_errors', 0); 
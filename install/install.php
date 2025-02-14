
<?php
// 安装页面
$install_lock_file = __DIR__ . '/install.lock';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 获取用户输入的数据库连接信息
    $db_host = $_POST['db_host'] ?? 'localhost'; // 默认值为 localhost
    $db_user = $_POST['db_user'];
    $db_pass = $_POST['db_pass'];
    $db_name = $_POST['db_name'];

    // 尝试连接到数据库
    $connect = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($connect->connect_error) {
        $error_message = "无法连接到数据库： " . $connect->connect_error;
    } else {
        // 获取 SQL 文件中的所有表名
        $sql_file_path = __DIR__ . '/database.sql';
        if (!file_exists($sql_file_path)) {
            $error_message = "安装失败：数据库文件未找到。";
        } else {
            $sql_content = file_get_contents($sql_file_path);
            $sql_statements = explode(';', $sql_content);

            // 提取所有 CREATE TABLE 语句中的表名
            $tables_to_create = [];
            foreach ($sql_statements as $statement) {
                if (stripos($statement, 'CREATE TABLE') !== false) {
                    preg_match('/CREATE TABLE\s+`?(\w+)`?/', $statement, $matches);
                    if (isset($matches[1])) {
                        $tables_to_create[] = $matches[1];
                    }
                }
            }

            // 删除已存在的表
            foreach ($tables_to_create as $table) {
                $drop_table_query = "DROP TABLE IF EXISTS `$table`";
                if (!$connect->query($drop_table_query)) {
                    $error_message = "删除表 `$table` 时出错： " . $connect->error;
                    break;
                }
            }

            if (!isset($error_message)) {
                // 执行 SQL 文件中的语句
                foreach ($sql_statements as $statement) {
                    $statement = trim($statement);
                    if ($statement) {
                        if (!$connect->query($statement)) {
                            $error_message = "安装失败：SQL 执行错误 - " . $connect->error;
                            break;
                        }
                    }
                }

                if (!isset($error_message)) {
                    // 更新 config.php 文件中的数据库配置
                    $config_file_path = __DIR__ . '/../config.php';
                    if (!file_exists($config_file_path)) {
                        $error_message = "安装失败：config.php 文件未找到。";
                    } else {
                        $config_content = file_get_contents($config_file_path);

                        // 替换数据库配置
                        $config_content = str_replace(
                            [
                                "define('DB_HOST', 'db_host');",
                                "define('DB_USER', 'db_user');",
                                "define('DB_PASS', 'db_pass');",
                                "define('DB_NAME', 'db_name');"
                            ],
                            [
                                "define('DB_HOST', '$db_host');",
                                "define('DB_USER', '$db_user');",
                                "define('DB_PASS', '$db_pass');",
                                "define('DB_NAME', '$db_name');"
                            ],
                            $config_content
                        );

                        // 保存更新后的 config.php 文件
                        file_put_contents($config_file_path, $config_content);

                        // 创建安装锁文件
                        file_put_contents($install_lock_file, 'Installed');

                        // 安装成功，显示成功信息
                        $install_success = true;
                        $admin_info = [
                            'username' => 'admin',
                            'password' => '123456',
                            'admin_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/admin'
                        ];
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>安装向导</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">安装向导</h1>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if (isset($install_success)): ?>
            <div class="alert alert-success">
                <p>安装成功！</p>
                <p>初始账号：<?php echo $admin_info['username']; ?></p>
                <p>初始密码：<?php echo $admin_info['password']; ?></p>
                <p>后台路径：<a href="<?php echo $admin_info['admin_path']; ?>" target="_blank"><?php echo $admin_info['admin_path']; ?></a></p>
            </div>
        <?php else: ?>
            <form method="post">
                <div class="form-group">
                    <label for="db_host">数据库服务器地址</label>
                    <input type="text" class="form-control" id="db_host" name="db_host" value="localhost" required>
                </div>
                <div class="form-group">
                    <label for="db_user">数据库用户名</label>
                    <input type="text" class="form-control" id="db_user" name="db_user" required>
                </div>
                <div class="form-group">
                    <label for="db_pass">数据库密码</label>
                    <input type="password" class="form-control" id="db_pass" name="db_pass" required>
                </div>
                <div class="form-group">
                    <label for="db_name">数据库名称</label>
                    <input type="text" class="form-control" id="db_name" name="db_name" required>
                </div>
                <button type="submit" class="btn btn-primary">开始安装</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
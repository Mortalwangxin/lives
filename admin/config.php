<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php'; // 数据库连接


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $connect->real_escape_string($_POST['title']);
    $keywords = $connect->real_escape_string($_POST['keywords']);
    $description = $connect->real_escape_string($_POST['description']);
    $logo = $connect->real_escape_string($_POST['logo']);
    $wz = $connect->real_escape_string($_POST['wz']);
    $admin_email = $connect->real_escape_string($_POST['admin_email']);
    $admin_name = $connect->real_escape_string($_POST['admin_name']);
    $smtp_email = $connect->real_escape_string($_POST['smtp_email']);
    $smtp_password = $connect->real_escape_string($_POST['smtp_password']);
    $texiao = $connect->real_escape_string($_POST['texiao']);
    $shubiao = $connect->real_escape_string($_POST['shubiao']);

    $connect->query("UPDATE config SET value = '$title' WHERE config_key = 'title'");
    $connect->query("UPDATE config SET value = '$keywords' WHERE config_key = 'keywords'");
    $connect->query("UPDATE config SET value = '$description' WHERE config_key = 'description'");
    $connect->query("UPDATE config SET value = '$logo' WHERE config_key = 'logo'");
    $connect->query("UPDATE config SET value = '$wz' WHERE config_key = 'wz'");
    $connect->query("UPDATE config SET value = '$admin_email' WHERE config_key = 'admin_email'");
    $connect->query("UPDATE config SET value = '$admin_name' WHERE config_key = 'admin_name'");
    $connect->query("UPDATE config SET value = '$smtp_email' WHERE config_key = 'smtp_email'");
    $connect->query("UPDATE config SET value = '$smtp_password' WHERE config_key = 'smtp_password'");
    $connect->query("UPDATE config SET value = '$texiao' WHERE config_key = 'texiao'");
    $connect->query("UPDATE config SET value = '$shubiao' WHERE config_key = 'shubiao'");

    header('Location: config.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配置管理</title>
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <span class="brand-text font-weight-light">后台管理系统</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>主页</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="messages.php" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>留言管理</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="templates.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>模板管理</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="config.php" class="nav-link active">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>配置管理</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">配置管理</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">配置信息</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        
                                        
                                        <div class="form-group">
                                            <label for="title">网站标题</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $config['title']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords">关键词</label>
                                            <input type="text" class="form-control" name="keywords" value="<?php echo $config['keywords']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">描述</label>
                                            <input type="text" class="form-control" name="description" value="<?php echo $config['description']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">网站Logo</label>
                                            <input type="text" class="form-control" name="logo" value="<?php echo $config['logo']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wz">网站地址</label>
                                            <input type="text" class="form-control" name="wz" value="<?php echo $config['wz']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="admin_email">管理员邮箱</label>
                                            <input type="email" class="form-control" name="admin_email" value="<?php echo $config['admin_email']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="admin_name">管理员名称</label>
                                            <input type="text" class="form-control" name="admin_name" value="<?php echo $config['admin_name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>特效选择</label>
                                            <select name="texiao" class="form-control">
                                                <option value="0">无特效</option>
                                                <option value="1" <?php echo $config['texiao'] == 1 ? 'selected' : ''; ?>>樱花特效</option>
                                                <option value="2" <?php echo $config['texiao'] == 2 ? 'selected' : ''; ?>>雪花特效</option>
                                                <option value="3" <?php echo $config['texiao'] == 3 ? 'selected' : ''; ?>>雪花特效2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>鼠标样式</label>
                                            <select name="shubiao" class="form-control">
                                                <option value="0">默认样式</option>
                                                <option value="1" <?php echo $config['shubiao'] == 1 ? 'selected' : ''; ?>>样式1</option>
                                                <option value="2" <?php echo $config['shubiao'] == 2 ? 'selected' : ''; ?>>样式2</option>
                                                <option value="3" <?php echo $config['shubiao'] == 3 ? 'selected' : ''; ?>>样式3</option>
                                                <option value="4" <?php echo $config['shubiao'] == 4 ? 'selected' : ''; ?>>样式4</option>
                                                <option value="5" <?php echo $config['shubiao'] == 5 ? 'selected' : ''; ?>>样式5</option>
                                            </select>
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="smtp_email">SMTP 邮箱地址</label>
                                            <input type="email" class="form-control" name="smtp_email" value="<?php echo $config['smtp_email']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="smtp_password">SMTP 授权码</label>
                                            <input type="password" class="form-control" name="smtp_password" value="<?php echo $config['smtp_password']; ?>" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">保存配置</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="../public/js/jquery-3.6.0.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/adminlte.min.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php';

$message = ""; // 用于存储提示信息

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = md5($_POST['current_password']);
    $new_password = isset($_POST['new_password']) ? md5($_POST['new_password']) : null;
    $new_username = isset($_POST['new_username']) ? $connect->real_escape_string($_POST['new_username']) : null;

    $username = $_SESSION['admin_username']; // 假设你在登录时保存了用户名
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$current_password'";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        // 如果提供了新密码，则更新密码
        if ($new_password) {
            $update_query = "UPDATE admin SET password = '$new_password' WHERE username = '$username'";
            if (!$connect->query($update_query)) {
                $message = '<div class="alert alert-danger">密码更新失败！</div>';
            }
        }

        // 如果提供了新用户名，则更新用户名
        if ($new_username) {
            $update_query = "UPDATE admin SET username = '$new_username' WHERE username = '$username'";
            if ($connect->query($update_query)) {
                $_SESSION['admin_username'] = $new_username; // 更新会话中的用户名
            } else {
                $message = '<div class="alert alert-danger">用户名更新失败！</div>';
            }
        }

        // 如果没有错误消息，则显示成功消息
        if (!$message) {
            $message = '<div class="alert alert-success">账号和密码已成功更新！</div>';
        }
    } else {
        $message = '<div class="alert alert-danger">当前密码错误！</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改账号和密码</title>
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                            <a href="config.php" class="nav-link">
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
                            <h1 class="m-0">修改账号和密码</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">修改账号和密码</h3>
                                </div>
                                <div class="card-body">
                                    <?php echo $message; ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>当前密码：</label>
                                            <input type="password" name="current_password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新密码：</label>
                                            <input type="password" name="new_password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>新账号（可选）：</label>
                                            <input type="text" name="new_username" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">更新账号和密码</button>
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
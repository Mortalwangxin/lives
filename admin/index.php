<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php';

// 获取留言数量
$message_count = $connect->query("SELECT COUNT(*) FROM fanall")->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .user-menu {
            position: relative;
            display: inline-block;
        }
        .user-menu .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0; /* Align to the right */
        }
        .user-menu .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .user-menu .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .user-menu:hover .dropdown-content {
            display: block;
        }
        .user-image {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item user-menu">
                    <a href="#" class="nav-link">
                        <img src="path/to/default-avatar.jpg" class="user-image img-circle elevation-2" alt="User Image">
                    </a>
                    <div class="dropdown-content">
                        <a href="change_password.php">修改账号密码</a>
                        <a href="logout.php">退出登录</a>
                    </div>
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
                            <a href="index.php" class="nav-link active">
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
                            <h1 class="m-0">主页</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">留言统计</h3>
                                </div>
                                <div class="card-body">
                                    <p>当前留言总数：<strong><?php echo $message_count; ?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">程序信息</h3>
                                </div>
                                <div class="card-body">
                                    <p><strong>程序作者：</strong>忘心</p>
                                    <p><strong>程序版本：</strong><?php echo $currentVersion; ?></p>
                                    <p><strong>最新版本：</strong><span id="latest-version">检查中...</span></p>
                                    <p id="update-url" style="display:none;"><strong>更新链接：</strong><a href="" target="_blank">点击下载更新</a></p>
                                    <p><strong>使用文档：</strong><a href="https://music.wxnotes.cn/help.php" target="_blank">忘心留言箱使用及开发手册</a></p>
                                    <p><strong>项目地址：</strong><a href="https://gitee.com/wangxin/message-box" target="_blank">Gitee 忘心留言箱</a></p>
                                    <p><strong>项目地址：</strong><a href="https://github.com/wangxin/message-box" target="_blank">Github 忘心留言箱</a></p>
                                    <p><strong>鸣谢：</strong>AdminLTE开源模板</p>
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
    <script>const currentVersion = '<?php echo $currentVersion; ?>';</script>
    <script src="../public/js/ucheck.js"></script> <!-- 引入更新检查脚本 -->
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php';

// 如果提交了启用模板的请求
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['template_id'])) {
    $template_id = $connect->real_escape_string($_POST['template_id']);
    set_current_template($template_id);
    header('Location: templates.php');
    exit();
}

// 获取所有模板
$templates = get_all_templates();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>模板管理</title>
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
                            <a href="templates.php" class="nav-link active">
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
                            <h1 class="m-0">模板管理</h1>
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
                                    <h3 class="card-title">模板列表</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>模板名称</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($templates as $template): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($template['template_name']); ?></td>
                                                    <td><?php echo $template['is_active'] ? '启用' : '禁用'; ?></td>
                                                    <td>
                                                        <form method="post" style="display:inline;">
                                                            <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                                                            <button type="submit" class="btn btn-primary btn-sm">启用</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

include_once '../config.php';

// 每页显示的记录数
$records_per_page = 10;

// 获取当前页码
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 计算偏移量
$offset = ($current_page - 1) * $records_per_page;

// 使用预处理语句查询当前页的留言
$stmt = $connect->prepare("SELECT * FROM fanall LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();

// 查询总记录数
$total_stmt = $connect->prepare("SELECT COUNT(*) FROM fanall");
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_rows = $total_result->fetch_row()[0];

// 计算总页数
$total_pages = ceil($total_rows / $records_per_page);

// 处理批量删除
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $ids = $_POST['id'] ?? [];
    if (!empty($ids)) {
        $id_list = implode(',', array_map('intval', $ids));
        $delete_stmt = $connect->prepare("DELETE FROM fanall WHERE id IN ($id_list)");
        $delete_stmt->execute();
        header('Location: messages.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言管理</title>
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* 自定义样式 */
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pagination {
            margin: 0;
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
                            <a href="messages.php" class="nav-link active">
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
                            <h1 class="m-0">留言管理</h1>
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
                                    <h3 class="card-title">留言列表</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="select-all">
                                                    </th>
                                                    <th>ID</th>
                                                    <th>名字</th>
                                                    <th>时间</th>
                                                    <th>留言内容</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="id[]" value="<?php echo $row['id']; ?>">
                                                        </td>
                                                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['time']); ?></td>
                                                        <td><?php echo nl2br(htmlspecialchars($row['text'])); ?></td>
                                                        <td>
                                                            <a href="delete_message.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger btn-sm">删除</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                        <button type="submit" name="delete" class="btn btn-danger">删除选中项</button>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                        <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                                            <a class="page-link" href="messages.php?page=<?php echo urlencode($i); ?>"><?php echo $i; ?></a>
                                                        </li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
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
    <script>
        // 全选/全不选功能
        document.getElementById('select-all').addEventListener('change', function () {
            var checkboxes = document.querySelectorAll('input[name="id[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });
    </script>
</body>
</html>
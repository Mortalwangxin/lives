<?php

$install_lock_file = __DIR__ . '/install/install.lock';
if (!file_exists($install_lock_file)) {
    header('Location: install/install.php');
    exit();
}

include_once 'config.php';
include_once 'includes/header.php';
$current_template = get_current_template();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php echo $config[ 'title'] ?>
        </title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <?php include_once "templates/{$current_template}/index.php"; ?>
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $connect->real_escape_string($_POST['name']);
    $sql = "SELECT * FROM fanall WHERE name = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="../templates/pink/css/bb.css">
</head>
<body>
    <div class="pink-header">
        <div class="pink-logo">
            <a href="index.php">
                <img src="<?php echo $config['logo']; ?>" alt="Logo">
            </a>
        </div>
        <div class="pink-title">想说的话请寄存在我这 <?php echo $config['title']; ?></div>
    </div>
                
    <div class="pink-main-content">
        <form action="" method="post" name="tijiao" class="pink-form van-form layui-form get">
            <div class="pink-form-item">
                <label for="name" class="pink-form-label">好友名字</label>
                <div class="pink-form-input">
                    <input type="text" name="name" required placeholder="输入你的名字">
                </div>
            </div>
            <div>
                <button type="submit" name="go" class="pink-btn pink-btn-primary" data-toggle="modal">
                    查看留言
                </button>
            </div>
        </form>
            
        <?php if ($result && $result->num_rows > 0): ?>
            <div class="pink-listbox">
                <?php while ($myrow = $result->fetch_assoc()): ?>
                    <div style="padding:20px; border:1px solid #BEBEBE; background:#ffffff">
                        <p>时间: <?php echo $myrow['time']; ?></p>
                        <p>留言: <?php echo nl2br(htmlentities($myrow['text'], ENT_QUOTES, "UTF-8")); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php elseif ($result): ?>
            <div class="pink-listbox">
                <p style="color: #b17e94; font-size: 15px; text-align: center;">暂无留言～</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
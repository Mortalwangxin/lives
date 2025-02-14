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
    <link rel="stylesheet" href="../templates/pink/css/app.64567ff6.css">
    <link rel="stylesheet" href="../templates/pink/css/gtmc-data-report.067eaaac.css">
    <link rel="stylesheet" href="../templates/pink/css/layui.css">
    <link rel="stylesheet" href="../templates/pink/css/bb.css">
    <link rel="stylesheet" href="../templates/pink/css/main.css">
    <link rel="stylesheet" href="../templates/pink/css/pink.css">
</head>
<body>
    <div id="app" class="page-warpper">
        <div class="header">
            <div class="van-row van-row--flex van-row--align-center">
                <div class="van-col van-col--8">
                    <div class="van-image imglogo">
                        <a href="index.php">
                            <img src="<?php echo $config['logo']; ?>" class="van-image__img">
                        </a>
                    </div>
                </div>
                <div class="van-col van-col--15">
                    <span style="color: #b17e94; font-size: 15px; position: relative; top: -13px; float: left;">
                        想说的话请寄存在我这 <?php echo $config['title']; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="content-main">
            <form action="" method="post" name="tijiao" class="form van-form layui-form get">
                <div class="van-cell van-field">
                    <div class="van-cell__title van-field__label"><span style="color: rgb(0, 0, 0); font-size: 14px;">我的名字</span></div>
                    <div class="van-cell__value van-field__value">
                        <div class="van-field__body">
                            <input type="text" name="name" id="na" required lay-verify="required" placeholder="请填写你的名字或暗号" class="van-field__control">
                            <div class="van-field__right-icon">
                                <i class="van-icon van-icon-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <button type="submit" name="go" class="van-button van-button--info van-button--normal van-button--block">
                        <span class="van-button__text">查看留言</span>
                    </button>
                </div>
            </form>
            
            <?php if ($result && $result->num_rows > 0): ?>
                <div class="listbox">
                    <?php while ($myrow = $result->fetch_assoc()): ?>
                        <div style="padding:20px; border:1px solid #BEBEBE; background:#ffffff">
                            <p>时间: <?php echo $myrow['time']; ?></p>
                            <p>留言: <?php echo nl2br(htmlentities($myrow['text'], ENT_QUOTES, "UTF-8")); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php elseif ($result): ?>
                <div class="listbox">
                    <p style="color: #b17e94; font-size: 15px; text-align: center;">暂无留言～</p>
                </div>
            <?php endif; ?>
        </div>
        
        
    </div>
</body>
</html>
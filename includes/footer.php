    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3">
            © <?php echo date('Y'); ?> Copyright:
            <a class="text-dark" href="<?php echo $config['wz']; ?>"><?php echo $config['title']; ?></a>
        </div>
    </footer>
</body>
</html>

<?php
switch ($config['texiao']) {
    case 1:
        echo '<script type="text/javascript" src="../public/js/yinghua.js"></script>';
        break;
    case 2:
        echo '<script type="text/javascript" src="../public/js/xuehua.js"></script>';
        break;
    case 3:
        echo '<script type="text/javascript" src="../public/js/xuehua2.js"></script>';
        break;
    default:
        break;
}

switch ($config['shubiao']) {
    case 1:
        echo '<script type="text/javascript" src="../public/js/cursor/cursor1.js"></script>';
        break;
    case 2:
        echo '<script type="text/javascript" src="../public/js/cursor/cursor2.js"></script>';
        break;
    case 3:
        echo '<script type="text/javascript" src="../public/js/cursor/cursor3.js"></script>';
        break;
    case 4:
        echo '<script type="text/javascript" src="../public/js/cursor/cursor4.js"></script>';
        break;
    case 5:
        echo '<script type="text/javascript" src="../public/js/cursor/cursor5.js"></script>';
        break;
    default:
        break;
}

?>
<?php
include_once 'admin/common.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<body>
    <link rel="stylesheet" href="../css/mian.css">
<div id="zm_gll">
        <center>
        <p class="footer"> <img src="/images/filing.png" alt="备案ico"> <a href="http://beian.miit.gov.cn/"><?php echo $config['icp'] ?></a> </p>
        <p class="footer"><a href="https://www.wxword.cn/wxlyq/api.php?qq=<?php echo $admin['adminqq'] ?>" target="_blank">联系站长QQ：<?php echo $admin['adminqq'] ?></a></p>
      
        <p class="footer"><a href="<?php echo $config['wz'] ?>" target="_blank"><?php echo $config['copyright'] ?></a></p>
        </center>
    </div>
    
    
      <script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
     <?php
     
     switch ($tx['texiao']) {
         case 1:
             echo '<script type="text/javascript" src="js/yinghua.js"></script>';
             break;
         case 2:
             echo'<script type="text/javascript" src="js/xuehua.js"></script>';
             break;
         case 3:
             echo '<script type="text/javascript" src="js/xuehua2.js"></script>';
             break;
         default:
             break;
     }
     
     switch ($tx['shubiao']) {
         case 1:
             echo '<script type="text/javascript" src="js/cursor/cursor1.js"></script>';
             break;
         case 2:
             echo'<script type="text/javascript" src="js/cursor/cursor2.js"></script>';
             break;
         case 3:
             echo '<script type="text/javascript" src="js/cursor/cursor3.js"></script>';
             break;
         case 4:
             echo'<script type="text/javascript" src="js/cursor/cursor4.js"></script>';
             break;
         case 5:
             echo '<script type="text/javascript" src="js/cursor/cursor5.js"></script>';
             break;
         default:
             break;
     }
     switch ($tx['shubiao']) {
         case 1:
             echo '<script type="text/javascript" src="js/fangcha.js"></script>';
             break;
         default:
             break;
     }
     ?>
   
</body>

</html>
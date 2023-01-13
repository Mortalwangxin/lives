<?php
include_once 'database.php';
$absql = "SELECT * FROM config";
$resab = mysqli_query($connect, $absql);
$config = mysqli_fetch_array($resab);

?>
<?php
//查询数据
$nub = "select count(id) as shu from fanall";
$res = mysqli_query($connect, $nub);
$leav = mysqli_fetch_array($res);
$shu = $leav['shu'];


$ly = "select * from fanall order by id desc";
$lylt = mysqli_query($connect, $ly);


$lychaxun = "select * from fanall";
$lyres = mysqli_query($connect, $lychaxun);
$lyinfo = mysqli_fetch_array($lyres);

 $fwqwz = 'https://www.wxword.cn/wxlyq/bb.php'; 
 $fwqbb = file_get_contents($fwqwz);//获取服务器版本号
    
$xzlj = 'https://www.wxword.cn/wxlyq/xzlj.php'; 
   $xz = file_get_contents($xzlj);    
    
$xxlj = "SELECT * FROM wx_admin";
$resxx = mysqli_query($connect, $xxlj);
$admin = mysqli_fetch_array($resxx);

$lyset = "select * from lyset order by id desc";
$set = mysqli_query($connect, $lyset);
$setinfo = mysqli_fetch_array($set);

$dian = "select count(id) as dian from fanall";
$resdian = mysqli_query($connect, $dian);
$didi = mysqli_fetch_array($resdian);
$diannub = $didi['dian'];
?>


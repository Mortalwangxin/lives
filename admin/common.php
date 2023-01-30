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

 $fwqbb = 1.3;//获取服务器版本号
    
 $xz = 'www.wxword.cn/archives/330.html';    
    
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

$wztx = "SELECT * FROM tx";
$wztxcs = mysqli_query($connect, $wztx);
$tx = mysqli_fetch_array($wztxcs);
?>

<script>
    function check() {
        //获取name数组中的第0个索引 并且去掉空格
        let text = document.getElementsByName('text')[0].value.trim();
        let filter = new RegExp("[<?php echo $setinfo['lanjie']?>]");
        let weifan = new RegExp("[<?php echo $setinfo['lanjiezf']?>]");
        if (filter.test(text)) {
            alert("您的内容包含特殊字符 防止xss注入 本次提交已拦截")
            return false;
        } else if (weifan.test(text)) {
            alert("您输入的内容是违禁词 请注意您的发言")
            return false;
        }
        let name = document.getElementsByName("name")[0].value.trim();
        let nameweijin = new RegExp("[<?php echo $setinfo['lanjie']?>]");
        let namefilter = new RegExp("[<?php echo $setinfo['lanjiezf']?>]");
        if (nameweijin.test(name)) {
            alert("您的昵称包含特殊字符 防止xss注入 本次提交已拦截")
            return false;
        }else if (namefilter.test(name)) {
            alert("您输入的昵称是违禁词 请注意您的发言")
            return false;
        }
        e

    }
</script>
<?php
error_reporting(0);
define('CACHE_FILE', 0);
define('IN_CRONLITE', true);
define('SYSTEM_ROOT', dirname(__FILE__) . '/');
define('ROOT', dirname(SYSTEM_ROOT) . '/');
if(!empty($config['member']) && $config['member'] != ""){
	 if($config['member'] == "lives"){
        $ereturn = "../index.php?tp=".$config['member']."&action=cha&out_trade_no=";
    }else{
        $ereturn = "../index.php?tp=".$config['member']."&action=cha&out_trade_no=";
    }
}else{
    $t = "lives";
    $ereturn = "../index.php?tp=lives&action=cha&out_trade_no=";
}
if(!empty($_GET['tp']) && !empty($_GET['action'])){
    $tp = $_GET['tp'];
    $action = $_GET['action'];
    include 'template/'.$tp.'/'.$action.".php";
    exit();
}
?>
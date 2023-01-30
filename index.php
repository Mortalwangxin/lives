<?php 
include_once 'admin/common.php'; 

if(!empty($_GET['tp']) && !empty($_GET['action'])){
    $tp = $_GET['tp'];
    $action = $_GET['action'];
    include 'template/'.$tp.'/'.$action.".php";
    exit();
}

if(!empty($config['member']) && $config['member'] != ""){
    $t = $config['member'];
}else{
    $t = "lives";
}
include 'template/'.$t.'/index.php';
?>

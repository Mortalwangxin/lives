<?php
$connect=mysqli_connect("localhost","music_wxword_cn","010704","music_wxword_cn","3306");
if(!$connect){
echo "数据库连接失败";
}
mysqli_query($connect, "SET NAMES 'utf8'");
?>
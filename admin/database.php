<?php
$connect=mysqli_connect("localhost","数据库名","密码","数据库名","3306");
if(!$connect){
echo "数据库连接失败";
}
mysqli_query($connect, "SET NAMES 'utf8'");
?>
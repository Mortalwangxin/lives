<?php
include_once("admin/common.php");
if($_POST["go"]){
if($_POST["name"]==""|$_POST["text"]==""){
echo "请填写完整哦～";
}else{
$name=$_POST["name"];
$time=date('Y-m-j H:i:s');
$text=$_POST["text"];
$sqlcx="insert into fanall(name,text,time) values('$name','$text','$time')";
$sqlcxgo=mysqli_query($connect,$sqlcx);
if($sqlcxgo){
echo "<script>alert(\"恭喜你留言成功！\")</script>";
echo "<script language='javascript'>document.location = './'</script>";
}else{
echo "留言失败！请联系站长反馈";
}
}
}
?>
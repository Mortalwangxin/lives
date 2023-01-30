<?php
if($_POST["name"]==""|$_POST["text"]==""){
echo "<script>alert(\"请填完整哦！\")</script>";
echo "<script language='javascript'>document.location = './'</script>";

}
else{
$name=$_POST["name"];
$time=date('Y-m-j H:i:s');
$text=$_POST["text"];
$sqlcx="insert into fanall(name,text,time) values('$name','$text','$time')";
$sqlcxgo=mysqli_query($connect,$sqlcx);
if($sqlcxgo){
echo "<script>alert(\"恭喜你留言成功！\")</script>";
echo "<script language='javascript'>document.location = './'</script>";
}else{
echo "<script>alert(\"留言失败请及时和站长联系！\")</script>";
echo "<script language='javascript'>document.location = './'</script>";
}
}
?>


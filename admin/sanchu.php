<?php
//开启会话
session_start();
$adminname = trim($_POST['adminname']);
?>
<?php
include_once 'common.php';
$sql = "select * from wx_admin where adminname = '" . $_SESSION['adminname'] . " ' ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $text = mysqli_fetch_array($result);
} else {
    header("Location:login.php");
    die("参数错误");
}

?>
<?php
$id = $_GET['id'];
$file = $_SERVER['PHP_SELF'];

    if (is_numeric($id)) {
        $sql = "delete from fanall where id = $id";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo "<script>alert('删除内容成功');location.href = 'cha.php';</script>";
        } else {
            echo "<script>alert('删除内容失败)';history.back();</script>";
        }
    } else {
        echo "<script>alert('参数错误');history.back();</script>";
    }
?>
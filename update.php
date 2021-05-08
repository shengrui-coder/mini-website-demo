<?php
$id = $_POST['id'];
$newName = $_POST['name'];
$newSize = $_POST['size'];
$newDetail = $_POST['detail'];
$newPrice = $_POST['price'];

$con=mysqli_connect("localhost","chengzhi","tjxchengzhi1027","chengzhi");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

$sqlStr = "UPDATE `comInfo` SET `name` = '".$newName."',`size` = '".$newSize."',`detail` = '".$newDetail."',`price` = '".$newPrice."' WHERE `id` = '".$id."'";
mysqli_query($con,$sqlStr);

mysqli_close($con);
header("Location: https://www.sunyun.net/admin.html");
?>
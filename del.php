<?php
$delId = $_POST['delid'];

$con=mysqli_connect("localhost","chengzhi","xxxxxxxxx","chengzhi");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

$delStr = "DELETE FROM `comInfo` WHERE `id` = '".$delId."'";
mysqli_query($con,$delStr);

mysqli_close($con);
header("Location: http://sunyun.t0k.xyz/admin.html");
?>
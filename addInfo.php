<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
// echo $_FILES["file"]["size"];

$id = $_POST['id'];
$name = $_POST['name'];
$size = $_POST['size'];
$detail = $_POST['detail'];
$price = $_POST['price'];



$servername = "localhost";
$username = "chengzhi";
$password = "tjxchengzhi1027";
$dbname = "chengzhi";



$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20480000)   // 小于 20000 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        // echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        // echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        // echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            $file = "http://sunyun.t0k.xyz/" ."upload/" . $_FILES["file"]["name"];
            // echo "文件存储在: " . "upload/" . $_FILES["file"]["name"]. "<br>";
        }
    }
}
else
{
    echo "非法的文件格式或未上传文件";
}




// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
$sql = "INSERT INTO comInfo (id,name,size,detail,price,file)
VALUES ('".$id."','".$name."','".$size."','".$detail."','".$price."','".$file."')";
 
 
if ($conn->query($sql) === TRUE) {
    // echo "新记录插入成功";
    // echo $sql;
    echo("<script>alert('数据新增完成！');</script>");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>
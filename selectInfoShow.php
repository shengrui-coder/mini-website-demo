<?php
$servername = "localhost";
$username = "chengzhi";
$password = "xxxxxxxxx";
$dbname = "chengzhi";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
$sql = "SELECT id, name, size, detail, price, file FROM comInfo";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $out[] = $row;
    }
} else {
    echo "0 结果";
}
$conn->close();
echo json_encode($out);
?>
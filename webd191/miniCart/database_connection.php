<?php
$servername = "localhost"; // 通常是localhost，但是根据您的主机可能不同
$username = "cbnclamy_miniadmin"; // 您创建的数据库用户名
$password = "1qaz2wsx!QAZ@WSX"; // 数据库用户的密码
$dbname = "cbnclamy_minicart"; // 您创建的数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// 在这里编写您的数据库查询和逻辑

// 关闭连接
$conn->close();
?>

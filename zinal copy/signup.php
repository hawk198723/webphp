<?php
require 'cryptoConnection.php'; // 确保这是你的数据库连接文件的正确路径
error_reporting(E_ALL);
// 检查是否所有字段都被设置了
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // 检查数据库是否已存在该用户名
    $stmt = $dbh->prepare("SELECT * FROM Users WHERE Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        // 用户名已存在
        echo 'Username already taken.';
    } else {
        // 用户名可用，继续注册流程
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT); // 散列密码

        // 插入新用户记录到数据库
        $insertStmt = $dbh->prepare("INSERT INTO Users (Username, Password, Email, RegisterDate, LastLogin) VALUES (:username, :password, :email, NOW(), NULL)");
        $insertStmt->bindParam(':username', $username);
        $insertStmt->bindParam(':password', $passwordHash);
        $insertStmt->bindParam(':email', $email);
        
        if($insertStmt->execute()) {
            echo 'User registered successfully.';
            // 可以选择在这里直接登录用户，或重定向到登录页面
            header('Location: login.html');
            exit();
        } else {
            echo 'Registration failed, please try again.';
        }
    }
} else {
    // 如果没有设置，输出错误信息
    echo "All fields are required.";
}
?>

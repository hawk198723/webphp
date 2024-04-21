<?php
session_start();
error_reporting(E_ALL);
require 'cryptoConnection.php'; // 引入数据库连接

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // 用户输入的密码

    try {
        $stmt = $dbh->prepare("SELECT UserID, Password FROM Users WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // 验证密码
            if (password_verify($password, $user['Password'])) {
                // 密码正确，更新LastLogin时间
                $updateStmt = $dbh->prepare("UPDATE Users SET LastLogin = NOW() WHERE UserID = :userId");
                $updateStmt->bindParam(':userId', $user['UserID']);
                $updateStmt->execute();

                // 设置会话变量
                $_SESSION['user_id'] = $user['UserID'];
                // 重定向到仪表盘
                header('Location: dashboard.php');
                exit();
            } else {
                // 密码不正确
                echo 'Incorrect password';
            }
        } else {
            // 用户名不存在
            echo 'Username does not exist';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Username and password are required";
}
?>


<?php
require 'cryptoConnection.php'; 
error_reporting(E_ALL);

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $dbh->prepare("SELECT * FROM Users WHERE Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo 'Username already taken.';
    } else {

        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT); // 散列密码

        $insertStmt = $dbh->prepare("INSERT INTO Users (Username, Password, Email, RegisterDate, LastLogin) VALUES (:username, :password, :email, NOW(), NULL)");
        $insertStmt->bindParam(':username', $username);
        $insertStmt->bindParam(':password', $passwordHash);
        $insertStmt->bindParam(':email', $email);
        
        if($insertStmt->execute()) {
            echo 'User registered successfully.';

            header('Location: login.html');
            exit();
        } else {
            echo 'Registration failed, please try again.';
        }
    }
} else {
    echo "All fields are required.";
}
?>

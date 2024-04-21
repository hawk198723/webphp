<?php
session_start();
error_reporting(E_ALL);
require 'cryptoConnection.php'; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    try {
        $stmt = $dbh->prepare("SELECT UserID, Password FROM Users WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $user['Password'])) {
                $updateStmt = $dbh->prepare("UPDATE Users SET LastLogin = NOW() WHERE UserID = :userId");
                $updateStmt->bindParam(':userId', $user['UserID']);
                $updateStmt->execute();

                $_SESSION['user_id'] = $user['UserID'];
        
                header('Location: dashboard.php');
                exit();
            } else {
               
                echo 'Incorrect password';
            }
        } else {
          
            echo 'Username does not exist';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Username and password are required";
}
?>


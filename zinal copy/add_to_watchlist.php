<?php
session_start(); // 确保每个使用会话的脚本开头都有这个
require 'cryptoConnection.php'; // 引入数据库连接
// Debugging
echo "<pre>POST: ";
print_r($_POST);
echo "SESSION: ";
print_r($_SESSION);
echo "</pre>";

if (isset($_POST['crypto_id']) && isset($_SESSION['user_id'])) {
    $cryptoId = $_POST['crypto_id'];
    $userId = $_SESSION['user_id'];

    try {
        // 插入新记录到 UserWatchList
        $insertWatchListStmt = $dbh->prepare("
    INSERT INTO UserWatchList (UserID, CryptoID, AddedDate) 
    VALUES (:userId, :cryptoId, NOW())
");
        $insertWatchListStmt->bindParam(':userId', $userId);
        $insertWatchListStmt->bindParam(':cryptoId', $cryptoId);
        $insertWatchListStmt->execute();

        header('Location: dashboard.php'); // 重定向回仪表盘
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Required fields are missing.";
}
?>

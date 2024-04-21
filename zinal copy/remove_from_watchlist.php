<?php
session_start();
require 'cryptoConnection.php';

// 确保错误报告打开，有助于调试
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['watchlist_id']) && isset($_SESSION['user_id'])) {
    $watchlistId = $_POST['watchlist_id'];
    $userId = $_SESSION['user_id'];

    try {
        // 使用 WatchListID 作为删除的条件
        $deleteStmt = $dbh->prepare("DELETE FROM UserWatchList WHERE UserID = :userId AND WatchListID = :watchlistId");
        $deleteStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $deleteStmt->bindParam(':watchlistId', $watchlistId, PDO::PARAM_INT);
        $deleteStmt->execute();

        // 确认是否有行被删除
        if ($deleteStmt->rowCount() > 0) {
            $_SESSION['message'] = 'Crypto removed from your watchlist.';
        } else {
            $_SESSION['message'] = 'No item found or already removed.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    // 重定向回 dashboard.php
    header('Location: dashboard.php');
    exit();

} else {
    echo "Required fields are missing.";
}
?>

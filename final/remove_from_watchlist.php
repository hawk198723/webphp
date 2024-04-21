<?php
session_start();
require 'cryptoConnection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['watchlist_id']) && isset($_SESSION['user_id'])) {
    $watchlistId = $_POST['watchlist_id'];
    $userId = $_SESSION['user_id'];

    try {
        $deleteStmt = $dbh->prepare("DELETE FROM UserWatchList WHERE UserID = :userId AND WatchListID = :watchlistId");
        $deleteStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $deleteStmt->bindParam(':watchlistId', $watchlistId, PDO::PARAM_INT);
        $deleteStmt->execute();

        if ($deleteStmt->rowCount() > 0) {
            $_SESSION['message'] = 'Crypto removed from your watchlist.';
        } else {
            $_SESSION['message'] = 'No item found or already removed.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    header('Location: dashboard.php');
    exit();

} else {
    echo "Required fields are missing.";
}
?>

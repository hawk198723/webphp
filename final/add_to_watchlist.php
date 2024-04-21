<?php
session_start(); 
require 'cryptoConnection.php'; 

echo "<pre>POST: ";
print_r($_POST);
echo "SESSION: ";
print_r($_SESSION);
echo "</pre>";

if (isset($_POST['crypto_id']) && isset($_SESSION['user_id'])) {
    $cryptoId = $_POST['crypto_id'];
    $userId = $_SESSION['user_id'];

    try {
        
        $insertWatchListStmt = $dbh->prepare("
    INSERT INTO UserWatchList (UserID, CryptoID, AddedDate) 
    VALUES (:userId, :cryptoId, NOW())
");
        $insertWatchListStmt->bindParam(':userId', $userId);
        $insertWatchListStmt->bindParam(':cryptoId', $cryptoId);
        $insertWatchListStmt->execute();

        header('Location: dashboard.php'); 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Required fields are missing.";
}
?>

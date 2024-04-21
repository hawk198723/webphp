<?php
require 'cryptoConnection.php'; 

if (isset($_GET['id'])) {
    $cryptoId = $_GET['id'];

    try {
        
        $deleteWatchListStmt = $dbh->prepare("DELETE FROM UserWatchList WHERE CryptoID = :crypto_id");
        $deleteWatchListStmt->bindParam(':crypto_id', $cryptoId);
        $deleteWatchListStmt->execute();

        
        $deleteCryptoStmt = $dbh->prepare("DELETE FROM Cryptocurrencies WHERE CryptoID = :crypto_id");
        $deleteCryptoStmt->bindParam(':crypto_id', $cryptoId);
        $deleteCryptoStmt->execute();

        echo 'Crypto and related watchlist items deleted successfully.';
        header('Location: view.php'); 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Crypto ID not provided";
}

?>

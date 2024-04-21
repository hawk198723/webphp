<?php
require 'cryptoConnection.php'; 

if (isset($_POST['crypto_id'])) {
    $cryptoId = $_POST['crypto_id'];
    $cryptoName = $_POST['cryptoname'];
    $cryptoSymbol = $_POST['cryptosymbol'];

    try {
        $updateStmt = $dbh->prepare("UPDATE Cryptocurrencies SET CryptoName = :cryptoname, CryptoSymbol = :cryptosymbol WHERE CryptoID = :crypto_id");
        $updateStmt->bindParam(':crypto_id', $cryptoId);
        $updateStmt->bindParam(':cryptoname', $cryptoName);
        $updateStmt->bindParam(':cryptosymbol', $cryptoSymbol);
        $updateStmt->execute();

        echo 'Crypto updated successfully.';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Crypto ID not provided";
}

?>
<br>
<a href="dashboard.php">Back to Dashboard</a>    
<br>
<a href="view.php">Back to Cryptocurrency List</a>
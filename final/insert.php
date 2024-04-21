<?php
require 'cryptoConnection.php'; 

if (isset($_POST['cryptoname'], $_POST['cryptosymbol'], $_POST['cryptoprice'], $_POST['dateadded'])) {
    $cryptoName = $_POST['cryptoname'];
    $cryptoSymbol = $_POST['cryptosymbol'];
    $cryptoPrice = $_POST['cryptoprice'];
    $dateAdded = date('Y-m-d H:i:s', strtotime($_POST['dateadded'])); 

    try {
        
        $dbh->beginTransaction();

        $insertCryptoStmt = $dbh->prepare("INSERT INTO Cryptocurrencies (CryptoName, CryptoSymbol) VALUES (:cryptoname, :cryptosymbol)");
        $insertCryptoStmt->bindParam(':cryptoname', $cryptoName);
        $insertCryptoStmt->bindParam(':cryptosymbol', $cryptoSymbol);
        $insertCryptoStmt->execute();

        $cryptoID = $dbh->lastInsertId();

        $insertPriceStmt = $dbh->prepare("INSERT INTO CryptoPrices (CryptoID, Price, DateRecorded) VALUES (:cryptoID, :price, :daterecorded)");
        $insertPriceStmt->bindParam(':cryptoID', $cryptoID);
        $insertPriceStmt->bindParam(':price', $cryptoPrice);
        $insertPriceStmt->bindParam(':daterecorded', $dateAdded);
        $insertPriceStmt->execute();

        $dbh->commit();

        echo 'Crypto posted successfully.';
    } catch (PDOException $e) {
        $dbh->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "All fields are required.";
}
?>
<br>
<a href="dashboard.php">Back to Dashboard</a>

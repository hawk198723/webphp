<?php
require 'cryptoConnection.php'; // 引入数据库连接

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
        // 可选：重定向回查看页面
        // header('Location: view.php');
        // exit();
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
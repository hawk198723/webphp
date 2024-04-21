<?php
require 'cryptoConnection.php'; // 引入数据库连接

if (isset($_POST['cryptoname'], $_POST['cryptosymbol'], $_POST['cryptoprice'], $_POST['dateadded'])) {
    $cryptoName = $_POST['cryptoname'];
    $cryptoSymbol = $_POST['cryptosymbol'];
    $cryptoPrice = $_POST['cryptoprice'];
    $dateAdded = date('Y-m-d H:i:s', strtotime($_POST['dateadded'])); // 转换为数据库接受的格式

    try {
        // 开始事务
        $dbh->beginTransaction();

        // 插入加密货币
        $insertCryptoStmt = $dbh->prepare("INSERT INTO Cryptocurrencies (CryptoName, CryptoSymbol) VALUES (:cryptoname, :cryptosymbol)");
        $insertCryptoStmt->bindParam(':cryptoname', $cryptoName);
        $insertCryptoStmt->bindParam(':cryptosymbol', $cryptoSymbol);
        $insertCryptoStmt->execute();

        // 获取刚插入的加密货币的ID
        $cryptoID = $dbh->lastInsertId();

        // 插入币价
        $insertPriceStmt = $dbh->prepare("INSERT INTO CryptoPrices (CryptoID, Price, DateRecorded) VALUES (:cryptoID, :price, :daterecorded)");
        $insertPriceStmt->bindParam(':cryptoID', $cryptoID);
        $insertPriceStmt->bindParam(':price', $cryptoPrice);
        $insertPriceStmt->bindParam(':daterecorded', $dateAdded);
        $insertPriceStmt->execute();

        // 提交事务
        $dbh->commit();

        echo 'Crypto posted successfully.';
    } catch (PDOException $e) {
        // 如果出错，回滚事务
        $dbh->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "All fields are required.";
}
?>
<br>
<a href="dashboard.php">Back to Dashboard</a>

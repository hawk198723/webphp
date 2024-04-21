<?php
require 'cryptoConnection.php'; // 引入数据库连接

if (isset($_GET['id'])) {
    $cryptoId = $_GET['id'];

    try {
        // 首先删除 UserWatchList 表中的相关条目
        $deleteWatchListStmt = $dbh->prepare("DELETE FROM UserWatchList WHERE CryptoID = :crypto_id");
        $deleteWatchListStmt->bindParam(':crypto_id', $cryptoId);
        $deleteWatchListStmt->execute();

        // 然后删除 Cryptocurrencies 表中的条目
        $deleteCryptoStmt = $dbh->prepare("DELETE FROM Cryptocurrencies WHERE CryptoID = :crypto_id");
        $deleteCryptoStmt->bindParam(':crypto_id', $cryptoId);
        $deleteCryptoStmt->execute();

        echo 'Crypto and related watchlist items deleted successfully.';
        header('Location: view.php'); // 添加跳转回查看页面
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Crypto ID not provided";
}

?>

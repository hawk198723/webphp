<?php
require 'cryptoConnection.php'; 

$cryptoId = isset($_GET['id']) ? $_GET['id'] : null;

if ($cryptoId) {
    try {
        $selectStmt = $dbh->prepare("SELECT CryptoName, CryptoSymbol FROM Cryptocurrencies WHERE CryptoID = :crypto_id");
        $selectStmt->bindParam(':crypto_id', $cryptoId);
        $selectStmt->execute();
        $crypto = $selectStmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}

if (!$crypto) {
    echo "Crypto not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Crypto</title>
    <link rel="stylesheet" href="css/edit.css" />
</head>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="crypto_id" value="<?php echo htmlspecialchars($cryptoId); ?>">
        Crypto Name: <input type="text" name="cryptoname" value="<?php echo htmlspecialchars($crypto['CryptoName']); ?>" required><br>
        Crypto Symbol: <input type="text" name="cryptosymbol" value="<?php echo htmlspecialchars($crypto['CryptoSymbol']); ?>" required><br>
        <input type="submit" value="Update">
    </form>
    <div><a href="dashboard.php">Back to Dashboard</a>  </div>
  
<br><div><a href="view.php">Back to Cryptocurrency List</a></div>
</body>


</html>

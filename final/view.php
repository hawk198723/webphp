<?php
require 'cryptoConnection.php'; 

try {
    $stmt = $dbh->prepare("SELECT CryptoID, CryptoName, CryptoSymbol FROM Cryptocurrencies");
    $stmt->execute();
    $cryptos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Cryptos</title>
    <link rel="stylesheet" href="css/view.css" />
</head>
<body>
<div><a href="dashboard.php">Back to Dashboard</a></div>
    <h1>Cryptocurrency List</h1>
    <table>
        <thead>
            <tr>
                <th>Crypto Name</th>
                <th>Crypto Symbol</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cryptos as $crypto): ?>
            <tr>
                <td><?php echo htmlspecialchars($crypto['CryptoName']); ?></td>
                <td><?php echo htmlspecialchars($crypto['CryptoSymbol']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $crypto['CryptoID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $crypto['CryptoID']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
       
         
    </table>

   
  
</body>
</html>

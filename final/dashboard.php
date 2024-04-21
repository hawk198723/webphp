<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}


require 'cryptoConnection.php';


$userId = $_SESSION['user_id'];
try {
    
    $userStmt = $dbh->prepare("SELECT Username, Email, RegisterDate, LastLogin FROM Users WHERE UserID = :userId");
    $userStmt->bindParam(':userId', $userId);
    $userStmt->execute();
    $userInfo = $userStmt->fetch(PDO::FETCH_ASSOC);

    
    $watchListStmt = $dbh->prepare("
    SELECT w.WatchListID, c.CryptoName, c.CryptoSymbol, p.Price, p.DateRecorded
    FROM UserWatchList w
    INNER JOIN Cryptocurrencies c ON w.CryptoID = c.CryptoID
    LEFT JOIN CryptoPrices p ON c.CryptoID = p.CryptoID
    WHERE w.UserID = :userId
    ORDER BY p.DateRecorded DESC, w.AddedDate DESC
");
$watchListStmt->bindParam(':userId', $userId);
$watchListStmt->execute();
$watchList = $watchListStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" />
</head>
<body>
    <div class=“header”> 
        <a href="logout.php">Logout</a>
    </div>
    
    <h1>Welcome to your Dashboard, <?php echo htmlspecialchars($userInfo['Username']); ?>!</h1>
    <p>Here are your details:</p>
    <ul>
        <li>Username: <?php echo htmlspecialchars($userInfo['Username']); ?></li>
        <li>Email: <?php echo htmlspecialchars($userInfo['Email']); ?></li>
        <li>Register Date: <?php echo $userInfo['RegisterDate'] ? htmlspecialchars($userInfo['RegisterDate']) : 'Not set yet'; ?></li>
        <li>Last Login: <?php echo $userInfo['LastLogin'] ? htmlspecialchars($userInfo['LastLogin']) : 'Not logged in yet'; ?></li>
    </ul>
    
    <h2>Your Watchlist:</h2>
    <?php if (!empty($watchList)): ?>
        <ul>
            <?php foreach ($watchList as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['CryptoName']); ?> 
                    (<?php echo htmlspecialchars($item['CryptoSymbol']); ?>) - 
                    $<?php echo $item['Price'] !== null ? htmlspecialchars($item['Price']) : "Price not available"; ?> as of 
<?php echo $item['DateRecorded'] !== null ? htmlspecialchars($item['DateRecorded']) : "Date not available"; ?>

                    <form action="remove_from_watchlist.php" method="post" style="display: inline;">
                        <input type="hidden" name="watchlist_id" value="<?php echo $item['WatchListID']; ?>">
                        <input type="submit" value="Remove" style="display: inline;">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You have no items in your watchlist.</p>
    <?php endif; ?>

    <?php

try {
    $allCryptosStmt = $dbh->prepare("SELECT CryptoID, CryptoName FROM Cryptocurrencies");
    $allCryptosStmt->execute();
    $allCryptos = $allCryptosStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<form action="add_to_watchlist.php" method="post">
    <select name="crypto_id">
        <?php foreach ($allCryptos as $crypto): ?>
            <option value="<?php echo $crypto['CryptoID']; ?>">
                <?php echo htmlspecialchars($crypto['CryptoName']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Add to Watchlist</button>
</form>

    <h2>Manage Cryptocurrencies (Open to All, demo purpose):</h2>
    <ul>
        <li><a href="post.php">Post New Crypto</a></li>
        <li><a href="view.php">View and Manage Cryptos</a></li>
    </ul>
   
</body>
</html>


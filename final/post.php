<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post New Crypto</title>
    <link rel="stylesheet" href="css/post.css" />
</head>
<body>
    <form action="insert.php" method="post">
        Crypto Name: <input type="text" name="cryptoname" required><br>
        Crypto Symbol: <input type="text" name="cryptosymbol" required><br>
        Crypto Price: <input type="number" step="0.00000001" name="cryptoprice" required><br>
        Date Added: <input type="datetime-local" name="dateadded" required><br>
        <input type="submit" value="Post">
        <br>
    <a href="dashboard.php">Back to Dashboard</a>    
    <br>
    <a href="view.php">Back to Cryptocurrency List</a>
    </form>
    
</body>
</html>

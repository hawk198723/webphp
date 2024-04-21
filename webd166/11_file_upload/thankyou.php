<?php
// Start the session to retrieve user data
session_start();
?>
<!DOCTYPE html>
<!-- Jason Wang -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>
<body>
    <?php
    // Check if the name and photo path are set in the session
    if (isset($_SESSION['name']) && isset($_SESSION['photo_path'])) {
        // Display the thank you message with the user's name
        echo "<h1>Photo Contest</h1>";
        echo "<p>Thank you " . $_SESSION['name'] . " for entering our photo contest. You have submitted the below photo:</p>";
        // Display the uploaded image
        echo "<img src='" . $_SESSION['photo_path'] . "' alt='photo'>";
    } else {
        // Redirect back to the form page if the session variables are not set
        header('Location: upload.php');
    }
    ?>
</body>
</html>

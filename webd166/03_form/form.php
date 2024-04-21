<?php
//print_r($_POST);

/* Jason Wang */

// Processing form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$heard = $_POST['heard'];
$comments = $_POST['comments'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Form Result Page</title>
</head>

<body>
    <header>
        <h1>Thank you for signing up!</h1>
    </header>

    <main>
        <!-- Display the results here using echo -->
        <h2>You submitted the below information:</h2>
        <p>Name: <?php echo $name ?></p>
        <p>Email: <?php echo $email ?></p>
        <p>Phone: <?php echo $phone ?></p>
        <p>How do you hear about us? <?php echo $heard ?></p>
        <p>Comments: <?php echo $comments ?></p>
    </main>
</body>

</html>

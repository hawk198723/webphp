<?php
//print_r($_POST);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
/* Jason Wang */
// Processing form data
$okay = true;
$errors = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    // Retrieve data
    $firstName = htmlspecialchars(trim($_POST['fname']));
    $lastName = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $amount = htmlspecialchars(trim($_POST['amount']));
    $subscriptionChecked = isset($_POST['subscription']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css" media="all">
    .error { color: red; }
  </style>
</head>
<body>
<?php
    // Validate form fields and accumulate error messages
    if (empty($firstName)) {
        $errors .= '<p class="error">Please enter your first name.</p>';
        $okay = false;
    }
    if (empty($lastName)) {
        $errors .= '<p class="error">Please enter your last name.</p>';
        $okay = false;
    }
    if (empty($email)) {
        $errors .= '<p class="error">Please enter your email address.</p>';
        $okay = false;
    }
    if (empty($amount)) {
        $errors .= '<p class="error">Please enter the donation amount.</p>';
        $okay = false;
    } elseif (!is_numeric($amount)) {
        $errors .= '<p class="error">The donation amount must be a numeric value.</p>';
        $okay = false;
    }
    // If there are errors, display them with a return link
    if (!$okay) {
      echo "<h1>Please check again:</h1>\n";
      echo "<p>Please <a href='donation2.html'>GO BACK</a> and check the following errors.</p>";
      echo "<br>";
      echo $errors;
    } else {
        // If all fields are valid, process the data
        $formattedAmount = '$' . number_format($amount, 2);
        // Use escape characters to format the output
        echo "<h1>Donation Confirmation</h1>\n";
        echo "<p>$firstName $lastName, thank you for your donation of $formattedAmount.</p>\n";
        echo "<p>We will email your receipt to $email.</p>\n";
        // Display subscription information based on the checkbox status
        if ($subscriptionChecked) {
            echo "<p>You have chosen not to receive a free year subscription to our e-magazine.</p>\n";
        } else {
            echo "<p>You will receive a free year subscription to our e-magazine.</p>\n";
        }
    }
?>
</body>
</html>
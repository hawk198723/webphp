<?php
//print_r($_POST);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

/* Jason Wang */

// Processing form data

  $firstName = htmlspecialchars(trim($_POST['fname']));
  $lastName = htmlspecialchars(trim($_POST['lname']));
  $email = htmlspecialchars(trim($_POST['email']));
  $amount = htmlspecialchars(trim($_POST['amount']));

  //The donation amount will be preceded by a dollar sign ($) and have 2 decimal places by using a PHP function
  $formattedAmount = '$' . number_format($amount, 2);

  // The confirmation number is generated using 4 PHP functions
  $confirmationNumber = strlen($lastName). strtoupper(substr($lastName, 0, 1)) . mt_rand(1000, 9999);

?>
<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <title>Donation Confirmation</title>
  </head>
  <body>
      <!-- display the processed data via PHP -->
      <p>Thank you <strong><?php echo $firstName . ' ' . $lastName; ?></strong> for your donation of <strong><?php echo $formattedAmount; ?></strong>.</p>
      <p>Your confirmation number is <strong><?php echo $confirmationNumber; ?></strong>, We will email your receipt to  <?php echo $email; ?>.</p>
     
    
  </body>
</html>

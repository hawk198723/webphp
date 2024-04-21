<?php
//print_r($_POST);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

/* Jason Wang */

// Processing form data
$miles_driven = $_POST['miles_driven'];
$gallons_used = $_POST['gallons_used'];
$price_gallon = $_POST['price_gallon'];

// Format the numbers
$miles_driven_formated = number_format($miles_driven, 2, '.', ',');
$price_gallon_formatted = number_format($price_gallon, 2, '.', ',');

// Calculations
$miles_per_gallon = $miles_driven / $gallons_used;
$cost_of_the_trip = $gallons_used * $price_gallon;


// Format the numbers
$miles_per_gallon_formatted = number_format($miles_per_gallon, 2, '.', ',');
$cost_of_the_trip_formatted = number_format($cost_of_the_trip, 2, '.', ',');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trip Calculations</title>
</head>
<body>
  <header>
    <h1>Trip Calculations</h1>
  </header>
  <main> 

  <!-- Displaying the values entered -->
    <h1>Values you entered</h1>
    <p>Miles Driven: <?php echo "$miles_driven_formated"; ?> miles</p>
    <p>Gallons of Gas Used: <?php echo "$gallons_used"; ?> Gallons</p>
    <p>Price per gallon: <?php echo "\$ $price_gallon_formatted"; ?>/Gallons</p>
 <!-- Displaying the results -->
    <h1>Your results</h1>
    <p>MPG: <?php echo "$miles_per_gallon_formatted"; ?> mile/Gallon</p>
    <p>Trip Cost: <?php echo "\$ $cost_of_the_trip_formatted"; ?></p>
   
  </main>
</body>
</html>

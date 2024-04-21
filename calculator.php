<?php
//print_r($_POST);

/* Jason Wang */

// Processing form data

$miles_driven = $_POST['miles_driven'];
$gallons_used = $_POST['gallons_used'];
$price_gallon = $_POST['price_gallon'];

$miles_per_gallon = $miles_driven / $gallons_used;
$miles_per_gallon = round($miles_per_gallon,2);
$cost_of_the_trip = $gallons_used * $price_gallon;
$cost_of_the_trip = round($cost_of_the_trip,2);

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
  
    <h1>Values you entered</h1>
    <p>Miles Driven: <?php echo "\$ $miles_driven"; ?></p>
    <p>Gallons of Gas Used: <?php echo "\$ $gallons_used"; ?></p>
    <p>Price per gallon: <?php echo "\$ $price_gallon"; ?></p>

    <h1>Your results</h1>
    <p>MPG: <?php echo "\$ $miles_per_gallon"; ?></p>
    <p>Cost: <?php echo "\$ $cost_of_the_trip"; ?></p>
   
  </main>
</body>
</html>

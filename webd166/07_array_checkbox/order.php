<?php
// Set up PHP environment to display errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize a variable
$msg = "";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    
    // Process toppings
   // Initialize the $toppings array
  $toppings = array();

// Check if topping exists in the POST data
if (isset($_POST['topping'])) {
    // Assign the posted toppings to the $toppings variable
    $toppings = $_POST['topping'];
} else {
    // If no toppings were selected, keep $toppings as an empty array
    $toppings = array();
}
    $num_toppings = count($toppings);
    $base_price = 7.95;
    $cost = $base_price + $num_toppings * 1;

    // Build the toppings list if toppings are checked
    if ($num_toppings > 0) {
      foreach ($toppings as $item) {
          $msg .= "<li>" . htmlspecialchars($item) . "</li>";
      }
      $msg .= "</ul>";
  } else {
      $msg .= "<p>No additional toppings selected.</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Confirmation</title>
</head>
<body>
  <!-- Jason Wang -->
  
  <!-- Web page content -->
  <div>
    <h1>Pizza Express Order Confirmation</h1>
    <h2>Your pizza order will be ready for picking up in 15 minutes!</h2>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Selected Toppings (<?php echo $num_toppings; ?>):</strong></p>
    <?php echo $msg; ?>
    <p><strong>Total Cost:</strong> $<?php echo number_format($cost, 2); ?></p>
  </div>
</body>
</html>

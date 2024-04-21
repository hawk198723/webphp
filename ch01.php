<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $student = 'Jason';
  $phone = '858-222-3344';
  $hotdog = 1.5;
  $pizza = 9.9;
  $total = $hotdog + $pizza;

  echo '<p> this is a line of text. <br> this is another line of text. ' . $student . ' loves php  </p>';
  echo "<p>Now I'm done.</p>";
  echo '<input type="tel" name = "phonenumber" value="'.$phone.'">';
  echo '<p>You bought: 1 hotdog cost: $'. $hotdog.'.</p>';
  echo '<p>You bought: 1 pizza cost: $'. $pizza.'.</p>';
  echo '<p>Total cost would be: $'. $total.'.</p>';
?>
</body>
</html>

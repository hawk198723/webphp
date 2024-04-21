<?php
  // Declare variables for company information
  $companyName = "Googleplex";  
  $streetNumber = "1600 Amphitheatre Parkway";
  $city = "Mountain View";
  $state = "CA";
  $country = "United States";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- Jason Wang -->
  
  <!-- Web page content -->

<h1><?php echo $companyName?></h1> <!-- Display company name as title -->
<p>The <strong><?php print_r($companyName)?></strong> is the corporate headquarters complex of Google and its parent
company Alphabet Inc. It is located at:<br>
<?php echo $streetNumber."<br>".$city.", ". $state .", ".$country ?></p><!-- Display company address -->

</body>
</html>
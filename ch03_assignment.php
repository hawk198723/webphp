<?php
error_reporting(E_ALL);
function populateAttr($src, $title, $height, $width) {
    return '<img src="' . htmlspecialchars($src) . '" title="' . htmlspecialchars($title) . '" height="' . intval($height) . '" width="' . intval($width) . '"/>';
}

// populate all of the attributes of the aforementioned html with arguments in the function call.
echo populateAttr('somepic.jpg', 'My Birthday', 500, 300);

?>

<?php
error_reporting(E_ALL);
$cash_on_hand = 31; 
$dinner = 25; 
$tax = 10; 
$tip = 10; 
while(($cost = restaurant_check($dinner,$tax,$tip)) < $cash_on_hand) { 
echo "<br>".'I can afford a tip of '.$tip.'% ('.$cost.')'.".<br>" ; 
$tip++; 
} 
function restaurant_check($meal, $tax, $tip) { 
$tax_amount = $meal * ($tax / 100); 
$tip_amount = $meal * ($tip / 100); 
return $meal + $tax_amount + $tip_amount; 
} 
?>
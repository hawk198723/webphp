<?php
//School connection -- Uncomment Line 3 when you upload to the school server
//Use the credentials you were already assigned for the phpstuXX and password
$dbh = new PDO("mysql:host=localhost;dbname=webd167", 'root', 'root');
echo 'I am connected to the school server. Woohoo!';
echo "<br>"

//Local connection on your computer -- Comment out Line 6 when you upload to the school server. Your password is root on a Mac. On a PC, the password is an empty string.
//$dbh = new PDO("mysql:host=localhost;dbname=webd153", 'root', 'root');
// echo 'I am connected to my home computer localhost. Yippee!';

?>

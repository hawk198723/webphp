<?php
error_reporting(E_ALL);
session_start();
$sessid = session_id();
$dbh = new PDO("mysql:host=localhost;dbname=mesacart", "root", "root");
$admin = 'mesa_admin';
$categories = 'mesa_categories';
$products = 'mesa_products';
$cartitems = 'mesa_cartitems';

?>
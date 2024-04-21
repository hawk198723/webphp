<?php
//print_r($_POST);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
/* Jason Wang */


// declarations
$fname = "";
$lname = "";
$email = "";
$age = "";
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$ageErr = "";

// Check if the "Clear Form" button was clicked
if (isset($_POST['clearForm'])) {
    // Clear all variables
    $fname = $lname = $email = $age = "";
    $fnameErr = $lnameErr = $emailErr = $ageErr = "";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the submitted form data
    if (empty(trim($_POST["fname"]))) {
        $fnameErr = "First name is required";
    } else {
        $fname = htmlspecialchars(trim($_POST["fname"]));
    }

    if (empty(trim($_POST["lname"]))) {
        $lnameErr = "Last name is required";
    } else {
        $lname = htmlspecialchars(trim($_POST["lname"]));
    }

    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    if (!isset($_POST["age"])) {
        $ageErr = "Confirming age is required";
    } else {
        $age = $_POST["age"];
    }

    // If all required fields are filled, redirect to subscribed.php
    if ($fname && $lname && $email && isset($_POST["age"])) {
        header("Location: subscribed.php");
        exit;
    }
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Coffee Connection</title>

    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    
    <link href="coffeeconnection.css" rel="stylesheet">

</head>

<body>

     <!--  Header and Nav and img -->
     <?php include ('header.html'); ?>


    <!--  Content  -->
    <main id="content">

            <h2 class="center">Welcome to Coffee Connection!</h2>
            <blockquote>We’re not just passionate lovers of coffee, but everything else that goes with a full and rewarding coffeehouse experience. We also offer a selection of premium teas, fine pastries and other delectable treats. And the music you hear in store is chosen for its artistry and appeal.  It’s not unusual to see people coming to Coffee Connection to chat, meet up or even work. We’re a neighborhood gathering place, a part of the daily routine, and would like to be part of your way of life.
        </blockquote>
        
        
        <section id="contact">
            <h2 class="center">Sign up to Receive Our Newsletter</h2>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           
              <div class="flexcontainer">
               <label for="fname">First Name:</label> <input type="text" name="fname" id="fname" value="<?php echo $fname;?>">
             </div>
             <p class="red"><?php echo $fnameErr;?></p>               
             
             <div class="flexcontainer">
              <label for="lname">Last Name:</label> <input type="text" name="lname" id="lname" value="<?php echo $lname;?>">
             </div>
             <p class="red"><?php echo $lnameErr;?></p>
              
            <div class="flexcontainer">
               <label for="email">Email:</label> <input type="email" name="email" id="email" value="<?php echo $email;?>"> 
            </div>
             <p class="red"><?php echo $emailErr;?></p>            
 
            <div class="flexcontainer2">
               <label for="age">I am over 18:</label> <input type="checkbox" name="age" id="age" value="yes" <?php if (isset($age) && $age == "yes") echo "checked";?>> 
            </div>  
             <p class="red"><?php echo $ageErr;?></p>                                       
              
            <div class="flexcontainer">    
               <button type="submit" name="submit">Submit</button>
               <button type="submit" name="clearForm" value="true">Clear</button> 
           </div>  
             
        </form>  
        </section>        

        <section id="products">
           
            <div class="product center">
                <h3>Espresso</h3>
                <p><img src="images/coffee_espresso.jpg" alt="expresso coffee"></p>
                <p>Popular espresso beverages - latte, americano, cappuccino, macchiato, and cold espresso drinks</p>
            </div>

            <div class="product center">
                <h3>Blended</h3>
                <p><img src="images/coffee_blended.jpg" alt="blended coffee drinks"></p>
                <p>Delicious icy blends</p>
            </div>

            <div class="product center">
                <h3>Pastries</h3>
                <p><img src="images/coffee_pastries.jpg" alt="pastries"></p>
                <p>Muffins, bagels, coffee cakes, and more</p>
            </div>
            
            <div class="product center">
                <h3>Food</h3>
                <p><img src="images/coffee_food.jpg" alt="anytime food"></p>
                <p>Sandwiches, paninis, salads and more</p>
            </div>

            <div class="product center">
                <h3>Breakfast</h3>
                <p><img src="images/coffee_breakfast.jpg" alt="breakfast food"></p>
                <p>Biscuits, muffins, wraps, croissants, oatmeal and more</p>
            </div>
         
        </section>

    </main>


    <!--  Footer  -->
    <?php include('footer.html'); ?>

</body>
</html>
<?php
// Start session.
session_start();

// Check if request method is POST and required session variables are set.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['age']) && isset($_SESSION['education']) && isset($_POST['income']))  {
    
    // Store 'income' value in session and output session data.
    $_SESSION['income'] = $_POST['income'];
    echo print_r($_SESSION);
    
    // Assign session variables to local variables.
    $age = $_SESSION['age'];
    $education = $_SESSION['education'];
    $income = $_SESSION['income'];

    // Unset and destroy session.
    session_unset();
    session_destroy();
} else {
    // Output error message and exit if required parameters are not set.
    echo '<p>Error: It seems you have not completed the survey. Please <a href="survey.html">start the survey</a> again.</p>';
    exit; 
}

?>

<!DOCTYPE html>
<!-- Jason Wang -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Survey Assignment Result Page</title>

    <style>
               
        body {
            background-color: #fffbeb;

        }
        body {
            font-family: arial, sans-serif;
            font-size: 100%;
        }
        

        

    </style>
</head>

<body>
    <header>
        <h1>Thank you for Taking Our Anonymous Survey</h1>
        
        <img src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705" alt="photo of survey">
    </header>

    <section>
        <h2>Your Response is below</h2>
<?php 
    // Output the data from session
    // foreach ($_SESSION as $name => $value) {
    //     echo "\t\t $name : $value <br>\n\r";
    // }

    // echo "below is generated from the session variables";
    // echo "\t\t <p> Your name :" . $_SESSION["age"] . "</p> \n\r";
    // echo "\t\t <p> Your education :" . $_SESSION["education"] . "</p> \n\r";
    // echo "\t\t <p> Your income :" . $_SESSION["income"] . "</p> \n\r";

    // Output
        echo "<p>Age Group: $age</p>";
        echo "<p>Education Level: $education</p>";
        echo "<p>Income : $income</p>";
    
?>
    
    
    </section>

</body>
</html>

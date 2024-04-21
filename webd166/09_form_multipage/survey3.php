<?php
// Start session.
session_start(); 

// Check if request method is POST and 'education' parameter is set.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['education'])) {
    // Store 'education' value in session.
    $_SESSION['education'] = $_POST['education'];
    // Output session data.
    echo print_r($_SESSION);
} else {
    // Exit script with message if 'education' parameter is not set.
    exit("Please submit your education info.");
}
?>

<!DOCTYPE html>
<!-- Jason Wang -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Survey Assignment Page 3</title>

    <style>
               
        body {
            background-color: #fffbeb;

        }
        body,
        input {
            font-family: arial, sans-serif;
            font-size: 100%;
        }
        
        div {
            margin-bottom: 15px;
            width: 200px;
            display:flex;
            justify-content: space-around;
        }
        
        div:last-of-type {
            margin-bottom: 30px;
        }
        
        label {
            width: 150px;
        }
        
     input[type=submit] {
            width: 120px;
            background-color: #000;
            color: #fffbeb;
            font-size: 1.5em;
            font-weight: bold;
            border: 2px solid #000;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #888;
            padding: 5px;
        }
        
        form {
            margin-bottom: 50px;
        }
        

    </style>
</head>

<body>
    <header>
        <h1>Anonymous Survey - Page 3</h1>
        
        <img src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705" alt="photo of survey">
    </header>

    <section>
        <h2>Enter the information below</h2>

        <form action="survey_result.php" method="post">
           
           <p>What is your income bracket?</p>
           
              <div>           
                <label for="under20">Under 20,000</label>
                <input type="radio" id="under20" value="under 20,000" name="income" required>
              </div>    

              <div> 
                <label for="20-39">20,000 to 39,000</label>
                <input type="radio" id="20-39" value="20,000 to 39,000" name="income" required>
              </div>     

              <div>
                <label for="40-59">40,000 to 59,000</label>
                <input type="radio" id="40-59" value="40,000 to 59,000" name="income" required>
              </div>   

              <div>
                <label for="60-80">60,000 to 80,000</label>
                <input type="radio" id="60-80" value="60,000 to 80,000" name="income" required> 
              </div>    

              <div>
                <label for="over80">Over 80,000</label>
                <input type="radio" id="over80" value="over 80,000" name="income" required>
              </div>                                                                               
            
            <input type="submit" value="Next >>" class="clear">            
        </form>
    </section>

</body>
</html>

<?php
// Start session.
session_start(); 
// Check if request method is POST and 'age' parameter is set.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['age'])) {
    // Store 'age' value in session.
    $_SESSION['age'] = $_POST['age']; 
    // Output session data.
    echo print_r($_SESSION);
} else {
    // Exit script with message if 'age' parameter is not set.
    exit('Please submit your age.');
}
?>

<!DOCTYPE html>
<!-- Jason Wang -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Survey Assignment Page 2</title>

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
        <h1>Anonymous Survey - Page 2</h1>
        
        <img src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705" alt="photo of survey">
    </header>

    <section>
        <h2>Enter the information below</h2>

        <form action="survey3.php" method="post">
           
           <p>What is your highest level of education?</p>
           
              <div>           
                <label for="hs">High School</label>
                <input type="radio" id="hs" value="high school" name="education" required>
              </div>    

              <div> 
                <label for="associate">Associate Degree</label>
                <input type="radio" id="associate" value="associate degree" name="education" required>
              </div>     

              <div>
                <label for="bachelors">Bachelors Degree</label>
                <input type="radio" id="bachelors" value="bachelors degree" name="education" required>
              </div>   

              <div>
                <label for="masters">Masters Degree</label>
                <input type="radio" id="masters" value="masters degree" name="education" required> 
              </div>    

              <div>
                <label for="doctoral">Doctoral Degree</label>
                <input type="radio" id="doctoral" value="doctoral degree" name="education" required>
              </div>                                                                                                                       
            
            <input type="submit" value="Next >>" class="clear">            
        </form>
    </section>

</body>
</html>

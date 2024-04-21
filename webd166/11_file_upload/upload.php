<?php
// Start the session to store user data
session_start();

// Initialize a variable to hold any error message
$error_message = '';

// Define the allowed file types
$allowed_types = ['image/jpeg', 'image/png'];

// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the user's name from the form
    $name = trim(htmlspecialchars($_POST['name']));
    // Store the name in the session
    $_SESSION['name'] = $name;

    // Check if the file was uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        // Store file information into variables
        $file_name = $_FILES["photo"]["name"];
        $file_type = $_FILES["photo"]["type"];
        $file_size = $_FILES["photo"]["size"];
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
        $file_error = $_FILES["photo"]["error"];

        // Check if the file type is allowed
        if ($file_type == 'image/jpeg' || $file_type == 'image/png'){
            // Set the upload path
            $upload_path = 'uploads/' . $file_name;
            
            // Move the uploaded file to the 'uploads' folder
            if (move_uploaded_file($file_tmp_name, $upload_path)) {
                // Set the photo path in the session to use on the next page
                $_SESSION['photo_path'] = $upload_path;
                // Redirect to the 'thankyou.php' page
                header('Location: thankyou.php');
                exit();
            } else {
                // Set an error message if the file couldn't be moved
                $error_message = "There was an error moving the uploaded file.";
            }
        } else {
            // Set an error message if the file type isn't allowed
            $error_message = "Invalid file type. Only JPG and PNG are allowed.";
        }
    } else {
        // Set an error message if there was an error with the file upload
        $error_message = "Error in file upload: " . $file_error;
    }
}

// Display the error message if one was set
if ($error_message !== '') {
    echo "<p>Error: " . $error_message . "</p>";
}
?>

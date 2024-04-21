<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php

  // Jason Wang, Aug 30 2023, Chapter 2 Assignment
  
  //extract data and print it
  $name = $_POST['fullname'];
  $gender = $_POST['gender'];
  $yearInSchool = $_POST['yearInSchool'];
  $hobbies = $_POST['hobbies'];
  $hobbycontent = '';
  $comments = $_POST['comments'];
  foreach ($hobbies as $hobby) {
    $hobbycontent .=$hobby.', ';
  }
  
  echo $name .'<br>'.$gender.'<br>'.$yearInSchool.'<br>'.$hobbycontent.'<br>'.$comments;
 
  ?>
  <form action="registration.php" method="post">
    <fieldset>

      <legend>Registration Details</legend>
      <label for="fullname">Full Name:</label>
      <input type="text" name="fullname" placeholder = "Enter your full name"> <br>

      <label>Gender:</label><br>
      <input type="radio" name="gender" value="male"/> Male <br>
      <input type="radio" name="gender" value="female"/> Female <br>

      <label for="yearInSchool">Year in School:</label> <br>
      <br>
      <select name="yearInSchool" >
        <option value="Freshman">Freshman</option>
        <option value="Sophomore">Sophomore</option>
        <option value="Junior">Junior</option>
        <option value="Senior">Senior</option>
      </select> <br>
      
      <br>
      <label>Hobbies:</label><br>
      <input type="checkbox" name="hobbies[]" value="Basketball"/> Basketball <br>
      <input type="checkbox" name="hobbies[]" value="Football"/> Football <br>
      <input type="checkbox" name="hobbies[]" value="Baseball"/> Baseball <br>
      
      <label for="comments">Comments:</label><br>
      <textarea name="comments" cols="15" rows="5"></textarea><br>

      <input type="submit" name = "submit" value="Sumbit Data">

    </fieldset>
  </form>


</body>
</html>

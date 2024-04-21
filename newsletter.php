<?php
//Use the textbook topic Sending Email pages 338-343 for help.
//You can test using a free SMTP server such as https://toolheap.com/test-mail-server-tool/
//https://youtu.be/FSpkJl_YCOE

//You need to include a connection file to your database. See Professor Secor 000Web Host video tutorials
if(isset($_POST['submit'])) {
	//You need to have a connection.php file
	include 'connectionNewsletter.php';

	// 1. You need to ADD in the two post data variables from the form here
	$subject = $_POST['subject'];
  $content = $_POST['content'];
//I have written the sql statement
	$sql = $dbh->prepare("SELECT email FROM contactNewsletter");
	$sql->execute();

	//Use a while loop to iterate through your email contacts
	while ($row = $sql->fetch()){
	$email = $row['email'];

	//  2. You need to complete the mail(). to, subject, content, header
	$headers = "From: wang.x.jason@gmail.com\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$diditsend	= mail($email, $subject, $content, $headers);
	
}
	 //You should have seen this in Professor Secor's video tutorial
	 if ($diditsend) {
		echo "The email was succesfully sent!";
	}else {
		echo "The email was fail to sent...";
	}
}

?>

<form action ="newsletter.php" method="post">
Subject: <input type="text" name="subject">
<br>Content:
<textarea name="content" rows="20" cols="50"></textarea>
<input type="submit" name="submit" value="Send News">
</form>

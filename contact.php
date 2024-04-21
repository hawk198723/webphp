<?php
include 'connection(1).php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST['submit'] == 'submit'){
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $comments = $_POST['comments'];

   $sql = $dbh->prepare("insert into users (firstname, lastname, email, phone, comments) values ('$first_name','$last_name','$email','$phone','$comments')");
   $sql ->execute();
   print_r($sql->errorInfo());
}

?>
<form name="contactform" method="post" action="contactCrud.php">

<fieldset>
<legend>Contact information</legend>
<table width="500px">
<tr>
 <td valign="top">
  <label for="first_name">First Name: *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30" required>
 </td>
</tr>
	
<tr>
 <td valign="top"">
  <label for="last_name">Last Name: *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30" required>
 </td>
</tr>
															   
<tr>
 <td valign="top">
  <label for="email">Email Address: *</label>
 </td>
 <td valign="top">
  <input  type="email" name="email" maxlength="80" size="30" required>
 </td>
</tr>
															
<tr>
 <td valign="top">
  <label for="phone">Phone: *</label>
 </td>
 <td valign="top">
    <input type="tel" id="phone" name="phone"
           placeholder="123-456-7890"
           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
           required>
 </td>
</tr>
											   
<tr>
 <td valign="top">
  <label for="comments">Comments: *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
																
<tr>
 <td colspan="2" style="text-align:center">
 <input type="submit" name="submit" value="submit">
 </td>
</tr>
 </table>
</fieldset>

<?php
include 'connection(1).php';

$userid = $_GET['upid'];
$deleteid = $_GET['deleteid'];
$updateid = $_POST['userid'];
$newfullname = $_POST['newfullname'];

//write update statement
if (isset($updateid)){
	$upfullname = $_POST['upfullname'];
	$upsql = $dbh->prepare("update user set fullname = '$upfullname' where id = '$updateid'");
	$upsql->execute();
	echo "Record Updated!<br>";
}


//write my delete statement
if (isset($deleteid)){
	$delsql = $dbh->prepare("delete from user where id = '$deleteid'");
	$delsql->execute();
	echo "Record deleted!<br>";
}

//insert user
if (isset($_POST['insert']) && $newfullname) {
	$insertsql = $dbh->prepare("INSERT INTO user (fullname) VALUES (:fullname)");
	$insertsql->bindParam(':fullname', $newfullname);
	
	if ($insertsql->execute()) {
			echo "New user inserted! <br>";
	} else {
			echo "error: can not add it";
	}
}

//THIS SHOWS THE CURRENT RECORDS!
$sql = $dbh->prepare("select id,fullname from user");
$sql->execute();
while ($row = $sql->fetch()){
 $id = $row[0];
 $fullname = $row[1];
 echo $fullname.' <a href="crud.php?deleteid='.$id.'" onclick="return confirm(\'Are you sure you want to delete '.$fullname.'? \');">Delete</a>  <a href="crud.php?upid='.$id.'">Update</a><br>';
 //or it could equal $fullname = $row['fullname'];
 //or it could equal $id = $row['id'];

}

//THIS WILL SHOW A FORM IF THE USER SELECTED AN UPDATE LINK!
if (isset($userid)){
	$getsql = $dbh->prepare("select fullname from user where id = '$userid'");
	$getsql->execute();
	$row = $getsql->fetch();
	$fullname = $row[0];
?>
<form action = "crud.php" method="post">
 <input type="hidden" name = "userid" value = "<?php echo $userid;?>">
 <input type="text" name = "upfullname" value = "<?php echo $fullname;?>"><br>
 <input type="submit" name="submit" value = "Edit <?php echo $fullname;?>">
</form>
<?php
}
?>
<?php
include 'connection(1).php';

// records per page
$records_per_page = 5;

// current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int) $_GET['page'];
} else {
    $current_page = 1;
}


$offset = ($current_page - 1) * $records_per_page;

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    
    $updateQuery = $dbh->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, phone = ?, comments = ? WHERE id = ?");
    $updateQuery->execute([$firstname, $lastname, $email, $phone, $comments, $id]);
    
    echo "Record Updated!<br>";
}

// Delete
if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $deleteQuery = $dbh->prepare("DELETE FROM users WHERE id = ?");
    $deleteQuery->execute([$deleteid]);
    
    echo "Record Deleted!<br>";
}


$readQuery = $dbh->prepare("SELECT * FROM users LIMIT ?,?");
$readQuery->bindValue(1, $offset, PDO::PARAM_INT);
$readQuery->bindValue(2, $records_per_page, PDO::PARAM_INT);
$readQuery->execute();

// retrieve the total number of records for pagination
$totalQuery = $dbh->query("SELECT COUNT(*) FROM users");
$total_records = $totalQuery->fetchColumn();
$total_pages = ceil($total_records / $records_per_page);

// show records
while ($row = $readQuery->fetch()) {
    echo htmlspecialchars($row['firstname'])." ".htmlspecialchars($row['lastname'])." - ".htmlspecialchars($row['email'])." - ".htmlspecialchars($row['phone'])." - ".htmlspecialchars($row['comments'])." <a href='contactCrud.php?deleteid=".htmlspecialchars($row['id'])."' onclick='return confirm(\"Are you sure?\");'>Delete</a> <a href='contactCrud.php?updateid=".htmlspecialchars($row['id'])."'>Update</a><br>";
}

// links
for ($page=1; $page<=$total_pages; $page++) {
    echo '<a href="contactCrud.php?page=' . $page . '">' . $page . '</a> ';
}

// Display update form if clicked the update link
if (isset($_GET['updateid'])) {
  $updateid = $_GET['updateid'];
  $findQuery = $dbh->prepare("SELECT * FROM users WHERE id = ?");
  $findQuery->execute([$updateid]);
  $row = $findQuery->fetch(); 
  $firstname = $row['firstname'];
  $lastname = $row[1]; 
?>


<form name="updateform" method="post" action="contactCrud.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    First Name: <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['firstname']); ?>"><br>
    Last Name: <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['lastname']); ?>"><br>
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br>
    Phone: <input type="tel" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"><br>
    Comments: <textarea name="comments"><?php echo htmlspecialchars($row['comments']); ?></textarea><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
}
?>


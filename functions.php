<?php

function createMessage() {
	if(isset($_POST['submit'])) {
		global $connection;
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$emailAddress = $_POST['emailaddress'];
		$message = $_POST['message'];
		$firstName = mysqli_real_escape_string($connection, $firstName);
		$lastName = mysqli_real_escape_string($connection, $lastName);
		$emailAddress = mysqli_real_escape_string($connection, $emailAddress);
		$message = mysqli_real_escape_string($connection, $message);
		$query = "INSERT INTO msg(firstname, lastname, emailaddress, message)";
		$query .= "VALUES ('$firstName', '$lastName', '$emailAddress', '$message')";
		$result = mysqli_query($connection, $query);
		if(!$result){
			die('Query FAILED' . mysqli_error());
		}
	}
}

function readMessages() {
	global $connection;
	$query = "SELECT * FROM msg";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die('Query FAILED' . mysqli_error());

	}
	?>
	<table class="table">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Message</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<?php
	while($row = mysqli_fetch_assoc($result)) {
	?>
		<td><?php echo $row['firstname']; ?></td>
		<td><?php echo $row['lastname']; ?></td>
		<td><?php echo $row['emailaddress']; ?></td>
		<td><?php echo $row['message']; ?></td>
		<td>
			<a href="read_messages.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
		</td>
		<td>
			<a href="read_messages.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
		</td>
	</tr>
	<?php
	}
	?></table>
<?php }

function editMessages() {
	global $id;
	if (isset($_REQUEST["edit"])) {
		$id = $_REQUEST["edit"];
	}
	if(isset($_POST['submit'])) {

		global $connection;
		$formid = $_POST['id'];
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$emailAddress = $_POST['emailaddress'];
		$message = $_POST['message'];
		$formid = $_POST['id'];
		$firstName = mysqli_real_escape_string($connection, $firstName);
		$lastName = mysqli_real_escape_string($connection, $lastName);
		$emailAddress = mysqli_real_escape_string($connection, $emailAddress);
		$message = mysqli_real_escape_string($connection, $message);
		$query = "UPDATE msg SET ";
		$query .= "firstname = '$firstName', ";
		$query .= "lastname = '$lastName', ";
		$query .= "emailaddress = '$emailAddress', ";
		$query .= "message = '$message' ";
		$query .= "WHERE id = $formid";

		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("QUERY FAILED" . mysqli_error($connection));    
		}
	}
}

function formData() {
	global $connection;
	global $editFirstName, $editLastName, $editEmailAddress, $editMessage;
	if (isset($_REQUEST["edit"])) {
		$id = $_REQUEST["edit"];
		$query = "SELECT * FROM msg WHERE id = $id";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("QUERY FAILED" . mysqli_error($connection));    
		}
		$row = mysqli_fetch_array($result);
		$editFirstName = $row['firstname'];
		$editLastName = $row['lastname'];
		$editEmailAddress = $row['emailaddress'];
		$editMessage = $row['message'];
	}
}
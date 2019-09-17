<?php
/**
 * Submit the message
 */

function createMessage() {
	if(isset($_POST['submit'])) {
		global $connection;
		// Get the values from the fields using POST
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$emailAddress = $_POST['emailaddress'];
		$message = $_POST['message'];
		// Sanitise the values
		$firstName = mysqli_real_escape_string($connection, $firstName);
		$lastName = mysqli_real_escape_string($connection, $lastName);
		$emailAddress = mysqli_real_escape_string($connection, $emailAddress);
		$message = mysqli_real_escape_string($connection, $message);
		$query = "INSERT INTO msg(firstname, lastname, emailaddress, message)";
		$query .= "VALUES ('$firstName', '$lastName', '$emailAddress', '$message')";
		// Make the connection to the database
		$result = mysqli_query($connection, $query);
		if(!$result){
			die('Query FAILED' . mysqli_error());
		}
		// Close the connection to the database
		mysqli_close($connection);
	}
}

/**
 * Output the messages to make them available to read
 */

function readMessages() {
	// Database query
	global $connection;
	$query = "SELECT * FROM msg";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die('Query FAILED' . mysqli_error());

	}
	// Output the table headings
	?>
	<table class="table table-striped">
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
	// Loop through the array of messages from the database query, output them and add links to edit and delete the messages
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

/**
 * Edit the message
 */

function editMessages() {
	// Get the id from the URL of the edit link
	global $id;
	if (isset($_REQUEST["edit"])) {
		$id = $_REQUEST["edit"];
	}
	if(isset($_POST['submit'])) {
		// Get the updated values of the message using POST
		global $connection;
		$formid = $_POST['id'];
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$emailAddress = $_POST['emailaddress'];
		$message = $_POST['message'];
		$formid = $_POST['id'];
		// Sanitise the updated messages
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
		// Connect to the database
		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("QUERY FAILED" . mysqli_error($connection));    
		}
	}
}

/**
 * Display the message to be edited
 */

function formData() {
	global $connection;
	// Create global variables so the message to be edited can be displayed in a form
	global $editFirstName, $editLastName, $editEmailAddress, $editMessage;
	// Get the id of the message being edited from the edit link URL so that it can be added to a hidden field in the edit form
	if (isset($_REQUEST["edit"])) {
		$id = $_REQUEST["edit"];
		// Connect to the database
		$query = "SELECT * FROM msg WHERE id = $id";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("QUERY FAILED" . mysqli_error($connection));    
		}
		// Get the values of the fields to be edited for the edit form
		$row = mysqli_fetch_array($result);
		$editFirstName = $row['firstname'];
		$editLastName = $row['lastname'];
		$editEmailAddress = $row['emailaddress'];
		$editMessage = $row['message'];
	}
}

/**
 * Delete the message
 */

function deleteMessages() {
	// Use a GET request to get the id of the message to be deleted
    if(isset($_GET['del'])) {
		global $connection;
		$id = $_GET['del'];
		// Delete the message from the database
		$query = "DELETE FROM msg ";
		$query .= "WHERE id = $id "; 
		$result = mysqli_query($connection, $query);
		if(!$result) {
		     die("QUERY FAILED" . mysqli_error($connection));    
		}
	}
}

/**
 * Alert to say the message has been updated
 */

function alertUpdated() {
	if(isset($_POST['submit'])) {
		// Output an alert when the edit form is submitted
		echo "<div class='alert alert-success'>
			<strong>The record has been updated</strong>
		</div>";
	}
}

/**
 * Alert to say the message has been deleted
 */

function alertDeleted() {
	if(isset($_GET['del'])) {
		// Output an alert when the massage has been deleted after clicking the delete link
		echo "<div class='alert alert-success'>
			<strong>The record has been deleted</strong>
		</div>";
	}
}
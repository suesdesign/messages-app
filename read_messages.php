<?php
	include_once "db.php";
	include_once "includes/header.php";
	include_once "functions.php";
	editMessages();
	formData();
	deleteMessages();
?>

<body>
<div class="container">
	<div>
		<h1 class="text-center">Messages</h1>
		<?php readMessages(); ?>
	</div>
	<div class="col-sm-6">
		<h2 class="text-center">Edit messages</h2>
		<form action="read_messages.php" method="post">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
			</div><!--.form-group-->
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" class="form-control" value="<?php echo $editFirstName; ?>">
			</div><!--.form-group-->
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" class="form-control" value="<?php echo $editLastName; ?>">
			</div><!--.form-group-->
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="email" name="emailaddress" class="form-control" value="<?php echo $editEmailAddress; ?>">
			</div><!--.form-group-->
			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" class="form-control" ><?php echo $editMessage; ?></textarea>
			</div><!--.form-group-->
		<input class="btn btn-primary" type="submit" name="submit" value="Submit">  
		</form>
	</div><!--.col-sm-6-->
	<div class="col-sm-6">
		<?php 
		if(isset($_POST['submit'])) {
			echo "<p>Record updated</p>";
		}
		if(isset($_GET['del'])) {
			echo "<p>Record deleted</p>";
		}
		?>
	</div><!--.col-sm-6-->
</div><!--.container-->
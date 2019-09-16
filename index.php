<?php
	include_once "db.php";
	include_once "includes/header.php";
	include_once "functions.php";
	createMessage();
?>

<body>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h1 class="text-center">Please leave a message</h1>
			<form id="contact_form" action="index.php" method="post">
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input type="text" name="firstname" class="form-control" required>
				</div><!--.form-group-->
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input type="text" name="lastname" class="form-control" required>
				</div><!--.form-group-->
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" name="emailaddress" class="form-control" required>
				</div><!--.form-group-->
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" class="form-control" required></textarea>
				</div><!--.form-group-->
			<input id="contact_button" class="btn btn-primary" type="submit" name="submit" value="Submit">  
			</form>
		</div><!--.col-sm-6-->
		<div class="col-sm-6">
			<?php 
				if(isset($_POST['submit'])) {
					echo "<div class='alert alert-success'>
  						<strong>The message has been submitted</strong>
					</div>";
				}
			?>
		</div><!--.col-sm-6-->
			
		</div><!--.row-->
</div><!--.container-->
<?php include_once "includes/footer.php";
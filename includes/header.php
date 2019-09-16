<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Messages</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">
</head>
<?php $currentPage = basename($_SERVER['SCRIPT_NAME']); ?>
<body>
	<div class="container mt-3">
		<nav class="nav justify-content-center mb-3">
			<ul class="nav nav-pills">
				<li class="nav-item mr-1">
					<a class="nav-link <?php if($currentPage === 'index.php'){echo 'active';}?>" href="index.php">Submit message</a>
				</li>
				<li class="nav-item m1-1">
					<a class="nav-link <?php if($currentPage === 'read_messages.php'){echo 'active';}?>" href="read_messages.php">Messages</a>
				</li>
			</ul>
		</nav>
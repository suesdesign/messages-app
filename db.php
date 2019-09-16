<?php

session_start();
$connection = mysqli_connect('localhost', 'messages', 'iixDQwcHBGEks&!k', 'messages');
if(!$connection) {
	die("Database connection failed");
}
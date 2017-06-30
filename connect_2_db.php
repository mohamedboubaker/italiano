<?php
	// When this file is included php connects to italiano database
	$servername =	"localhost";
	$username   =	"italiano_user";
	$password   =	"intelinside";
	$database   =	"italiano";
	$conn       = 	new mysqli($servername, $username, $password,$database);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
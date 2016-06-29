<?php 
	include 'connection.php';
	session_start();
	
	$id = $_SESSION['id'];
	echo $id ;
	$query = "DELETE FROM `applications` WHERE id =".$id;
	$result = mysqli_query($conn, $query);

	// Deleting from oauth database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "oauth";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $databasename);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$query = "DELETE FROM `oauth_clients` WHERE `user_id`=".$_SESSION['id'];
	$result = mysqli_query($conn, $query);

	// redirecting to all Apps 
	header("Location:index.php");

 ?> 
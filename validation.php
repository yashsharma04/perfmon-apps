<?php
	include 'connection.php' ;
	session_start();
	
	//Gets username value from the URL
	$name = $_GET['name'];
	$email = $_SESSION['email'];
	//Checks if the username is available or not
	$query = "SELECT app_name FROM `applications` WHERE email = '$email' and app_name='".$name."'";

	$result = mysqli_query($conn, $query);

	//Prints the result
	if (mysqli_num_rows($result)<1) {
		$_SESSION['val']=1 ;
	 echo "<span class='green' value='ok' >Available</span>";
	}
	else{
		$_SESSION['val']=0 ;
	 echo "<span class='red' value='notok' >Not available</span>";
	}
?>
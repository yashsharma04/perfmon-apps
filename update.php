<?php

	include('connection.php');	
	session_start();
	
	if (!isset($_SESSION['email'])) {
        header('location:signin.php');
    }

	echo $email =$_SESSION['email'];
	echo "<br>";
	echo $app_name = $_POST['app_name'];
	echo "<br>";
	echo $desc=$_POST['desc'];
	echo "<br>";
	echo $callback_url=$_POST['callback_url'];
	echo "<br>";
	echo $website=$_POST['website'];
	echo "<br>";
	$id = $_SESSION['id'];

	$query = "UPDATE `applications` SET `email`='".$email."',`description`='".$desc."',`website`='".$website."',`callback_url`='".$callback_url."',`app_name`='".$app_name."' WHERE `id`='".$id."'";
	echo $result = mysqli_query($conn, $query);

	$sql = "select * from applications where app_name='".$app_name."'";
	$result = mysqli_query($conn, $sql);
	echo "<br>";
	print_r($result);
	while ($rows = mysqli_fetch_assoc($result)) 
	{
    		$_SESSION['id']=$rows['id'];
    }

	header('Location:settings.php');
?>

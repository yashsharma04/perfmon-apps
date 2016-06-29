<?php
	include('connection.php');	
	session_start();
	
	echo $_SESSION['val'];
	if($_SESSION['val']==0)
		header("Location:newApp.php");
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
	function getGUID(){
	    if (function_exists('com_create_guid')){
	        return com_create_guid();
	    }
	    else {
	        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	        $charid = strtoupper(md5(uniqid(rand(), true)));
	        $hyphen = chr(45);// "-"
	        $uuid = //chr(123)// "{"
	            substr($charid, 0, 8).$hyphen
	            .substr($charid, 8, 4).$hyphen
	            .substr($charid,12, 4).$hyphen
	            .substr($charid,16, 4).$hyphen
	            .substr($charid,20,12);
	            //.chr(125);// "}"
	        return $uuid;
	    }
	}
	$consumer_key = getGUID();

	function random_string() {
	    $key = '';
	    $keys = array_merge(range('a', 'z'),range(0, 9),range('A', 'Z'));
	    for ($i = 0; $i < 10; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}

	$rand=random_string();
	$consumer_secret= hash("sha256",$rand,false);

	$query = "INSERT INTO `applications` (`email`, `description`, `website`, `callback_url`, `app_name`,`consumer_key`,`consumer_secret`) VALUES ('".$email."','".$desc."','".$website."','".$callback_url."','".$app_name."','".$consumer_key."','".$consumer_secret."')";

	echo $result = mysqli_query($conn, $query);
	$sql = "select * from applications where app_name='".$app_name."'";
	$result = mysqli_query($conn, $sql);
	print_r($result);
	while ($rows = mysqli_fetch_assoc($result)) 
	{
			echo "hello";
    		$_SESSION['id']=$rows['id'];
    			echo "<br>";
    }
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
	$query = "INSERT INTO `oauth_clients`(`client_id`, `client_secret`, `redirect_uri`, `user_id`) VALUES ('".$consumer_key."','".$consumer_secret."','".$callback_url."','".$_SESSION['id']."')";
	$result = mysqli_query($conn, $query);
	echo $_SESSION['id'];
	header('Location:application.php?id='.$_SESSION['id']);
?>

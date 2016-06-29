<?php
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['email'])) {
        header('location:signin.php');
    }
 

	$id = $_SESSION['id'];
	// echo "hello";

	$query = "select * from applications where id =".$id;
	$result = mysqli_query($conn,$query);
	// print_r($result);
	if(mysqli_num_rows($result)!=0) 
	{
	    while ($row = mysqli_fetch_assoc($result)) 
	    {	
        	$app_name=$row['app_name'];	
        	$description = $row['description'];	
        	$website=$row['website'];
        	$callback_url=$row['callback_url'];
    	}
	}
	else
	{
	    echo "no rows";
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>perfmon.io</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script>
		function newApp(){

			window.open("newApp.php","_self");	
		}
		function deleteApp(){
			// alert(id);
			window.open('deleteApp.php',"_self");
		}
		function details() {
			
			$.ajax({
               type:'POST',
               url: 'details.php',
               data : {val:0},
               success: function(response) {
                jQuery("#main_parent").html(response);
               }
           });
		});
		function settings(){
			alert("helo");
			$.ajax({
               type:'POST',
               url: 'details.php',
               data : {val:1},
               success: function(response) {
                jQuery("#main_parent").html(response);
               }
           });
		});

		function notify() {
			$.notify("Hello World");
		}
	</script>
</head>
<body>
	<!-- <div class='header' style="position: fixed; top: 0px; width: 100%;"> -->
	<div class='header'>
		<div class='container' >
			<div class='row'>
				<div class="col-xs-6 col-sm-6 col-md-6 margin-menu">
					<a target="_blank" class='menu-header' href='https://www.perfmon.io'>PERFMON.io</a>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 ">
					<!-- <a class='link1' style='float: right' href='signin.php'>Login</a> -->
					<div class="dropdown menu" >
					<?php 
						$conn = mysqli_connect($servername, $username, $password,'perfmon');
						if (!$conn) {
						    die("Connection failed: " . mysqli_connect_error());
						}
						$sql = "SELECT * FROM `user_details` WHERE email='".$_SESSION['email']."'";
						$result = mysqli_query($conn, $sql);
						$rows = mysqli_fetch_assoc($result);

						// echo "<h5 style='color:white;float:right ; padding-top:15px;'>".$rows['name']."</h5>";
						echo "<button class='btn btn-primary dropdown-toggle btn-mod' type='button' data-toggle='dropdown'> ".$rows['name']." ";
					?>
					  <span class='caret'></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="#">About</a></li>
					    <li><a href="logout.php">Logout</a></li>
					  </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='container content'>
		<a class='size' href='index.php' >Back to your Apps</a>
		<?php	
			echo "<h2>App Name : ".$app_name."</h2>";
		?>
		<ul class="nav nav-tabs">
		<?php 
			echo "<li role='presentation' ><a href='details.php'>Details</a></li>";
  			echo "<li role='presentation' class='active' ><a href='settings.php'>Settings</a></li>";
			echo "<li role='presentation'><a href='keys.php'>Keys</a></li>";
		 ?>
  		
		</ul>
		<h4>Application Details</h4>
			<form role="form" method="POST" action="update.php" >
				<div class="form-group">
					<label for="app_name">Application Name *</label>
					<?php 
						echo "<input type='text' class='form-control' id='app_name' name = 'app_name' placeholder ='Your application name' required='' value='".$app_name."'></input>";
					 ?>
					
				</div>
				<div class="form-group">
					<label for="desc">Description *</label>
					<?php 
						echo "<input type='text' class='form-control' id='desc' name = 'desc' placeholder ='Description' required='' value='".$description."'></input>";
					 ?>
				</div>
				<div class="form-group">
					<label for="website">Website *</label>
					<?php 
						echo "<input type='url' class='form-control' id='website' name = 'website' placeholder ='Website' required='' value='".$website."'></input>";
					 ?>
				</div>
				<div class="form-group">
					<label for="callback_url">Callback Url *</label>
					<?php 
						echo "<input type='url' class='form-control' id='callback_url' name = 'callback_url' placeholder ='Callback URL' required='' value='".$callback_url."'></input>";
					 ?>
				</div>
				<input type="submit" class="btn btn-primary display1" onclick="notify()" value='Update Settings'></input>
			</form>
	</div>
	<!-- <div class ='footer' style ='bottom:0; position: fixed;'> -->
	<div class='footer'>
		<div class="container">
			<div class='row'>
				<div class="col-xs-12 col-sm-4 col-md-4 ">								
					<div class='col1'>
						<h3>About Perfmon</h3>
						<p>Perfmon offers complete website monitoring services. It continuously stimulates and monitors your website uptime and downtime. It adds priceless insights to ensure maximum website performance </p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 ">
					<div class='col2'>
						<h3>Pages</h3>
						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<a target="_blank" href='https://www.perfmon.io/About-us' style='color:white'>About Us</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<a target="_blank" href='https://www.perfmon.io/index/faqs' style='color:white'>FAQs</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<a target="_blank" href='signin.php' style='color:white'>Sign In</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<a target="_blank" href='https://www.perfmon.io/signup' style='color:white'>Sing Up</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 ">
					<div class='col3'>
						<h3>We Are Social</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php 
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['email'])) {
        header('location:signin.php');
    }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 0-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>perfmon.io</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script>
		function newApp()
		{
			window.open("newApp.php","_self");	
		}	
		function func(id)
		{
			window.open("application.php?id="+id,"_self");
		}
	</script>
</head>
<body>
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
		<h2>Perfmon Apps</h2>
		<div class="list-group">
			<?php
				include 'connection.php';
				$sql = "SELECT * FROM `applications` where email='".$_SESSION['email']."' ";
				$result = mysqli_query($conn, $sql);
				while ($rows = mysqli_fetch_assoc($result)) 
				{
					echo "<button type='button' class='list-group-item' onclick='func(".$rows['id'].")' >".$rows['app_name']."</button>";
	    		}
			?>  
		</div>
		<div class='button_parent'>
			<button type="button" class="btn btn-primary display" onclick="newApp()">Create New App</button>	
		</div>
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
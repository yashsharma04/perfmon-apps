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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>perfmon.io</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>

	<script>
	function cancel(){
				window.open("index.php","_self");
			}	
		$(document).ready(function () {
			// alert("inside ready function");
			
			 jQuery("#app_name").blur(function () {
				 var app_name = $(this).val();
				 // alert(app_name);
				 if (app_name == '') {
					 $("#availability").html("");
				 }
				 else{
				 	jQuery.ajax({
				 	url: "validation.php?name="+app_name
				 	}).done(function( data ) {
				 	$("#availability").html(data);
				 	}); 
				 } 
			 });
		});
		function isUrlValid(url) {

    	// return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
    	// 
    	var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
		if (!re.test(url)) { 
    		
    		return false;
		}
	}

	function validate(){

		var website = document.getElementById('website').value;
		var callback_url = document.getElementById('callback_url').value;
		if (isUrlValid(website))
			alert("sasa");
		if (isUrlValid(website) && isUrlValid(callback_url)){
			return true; 
		}
		else if (!isUrlValid(website) && !isUrlValid(callback_url)){
			alert('url and website format wrong');
			return false ;
		}
		else if (!isUrlValid(website)){
			alert("website format wrong ");
			return false; 
		}
		else{
			alert('callback_url format wrong');
			return false;
		}
		
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
						include 'connection.php';
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
	<div class='content'>
		<div class='container'>
			<h2>Create an Application </h2>
			<h4>Application Details</h4>
			<form role="form" method="POST" action="action.php"  >
				<div class="form-group">
					<label for="app_name">Application Name *</label>
					<input type="text" class="form-control" id="app_name" name = 'app_name' placeholder ='Your application name' required="">
					<div id="availability"></div>
				</div>
				<div class="form-group">
					<label for="desc">Description *</label>
					<input type="text" class="form-control" id="desc" name='desc' placeholder="Your apps description" required="">
				</div>
				<div class="form-group">
					<label for="website">Website *</label>
					<input type="url" class="form-control" id="website" name='website' placeholder="Website Name" required="">
				</div>
				<div class="form-group">
					<label for="callback_url">Callback Url *</label>
					<input type="url" class="form-control" id="callback_url" name='callback_url' placeholder="Callback Url" required="">
				</div>
				<div class='row'>
					<div class="col-xs-2 col-sm-2 col-md-2 ">
						<input type="submit"  class="btn btn-primary"></input>
					</div>
			</form>
					<div class="col-xs-10 col-sm-10 col-md-10">
						<input type="submit" style='float:left;' onclick='cancel()'  class="btn .btn-default" value='Cancel'></input>
					</div>
				</div>
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
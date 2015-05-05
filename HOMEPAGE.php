<?php
  session_start();
  if (isset($_GET["logout"])) {
        $_SESSION = array();
	session_destroy(); // end the current session
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="logo.png">

		<title> Welcome NTCS Weapons </title>

		<!-- Bootstrap core CSS -->
		<link href="Cover%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="Cover%20Template%20for%20Bootstrap_files/cover.css" rel="stylesheet">
	</head>

	<body>
		<div class="site-wrapper">
		  <div class="site-wrapper-inner">
			<div class="cover-container">
			  <div class="inner cover">
				<h3 class="masthead-brand">NTCS Weapons</h3>
				<nav>
					<ul class="nav masthead-nav">
					  <li class="active"><a href="LOGIN.php">Sign in</a></li>
					</ul>
				</nav>
		
				<img src="guns.jpg" class="center-block" height=" 80%" width="80%" alt="Responsive image">
				<h1 class="cover-heading"> NTCS Weapons </h1>
				<p class="lead">NTCS Weapons is community buy and sell firearms. </p>
				<p>To use this service you must register, login, and agree to our terms of service.</p>
				<p class="lead">
				<br>
				  <a href="SIGNUP.php" class="btn btn-lg btn-primary" style= "margin 10px;" >Join</a>
				</p>
			  </div>
			</div>
			  
			<div class="inner">
			   
			   <?php include('FOOTER.php'); ?>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			</div>
			 
		  </div>

		</div>
		

		<!-- Bootstrap core JavaScript
		================================================== 
		<!-- Placed at the end of the document so the pages load faster 
		<script src="Cover%20Template%20for%20Bootstrap_files/jquery.js"></script>
		<script src="Cover%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
		<script src="Cover%20Template%20for%20Bootstrap_files/docs.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
		<script src="Cover%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>-->

	</body>

</html>

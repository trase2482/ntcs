<?php
session_start();
if (!$_SESSION["username"]) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="CSSstyle.css">
	<link rel="icon" href="logo.png">
  </head>
  
  <body>
  
	<!-- Navigation Bar -->
	<?php include "NAVBAR.php" ?>
	
	<div class="container">
    <!-- Containers  -->
      <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms"  align="center" >About Us</h1>
            </div>
            
			<div class="bs-component">
              <div class="jumbotron">
					<div align="center">
						<p>We are a small company based on the principals of 
						safety, honesty, and integrity. We created this 
						company to safely and legally transport used 
						firearms across the United States. </p>
					</div>
              </div>
            </div>
          
			</div>
        </div>
      </div>
	  
	  <!-- Footer -->
	<?php include "FOOTER.php" ?>
	  
    </div>
         
	<script src="jquery-1.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootswatch.js"></script>
  

</body></html>

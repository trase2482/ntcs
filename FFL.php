<?php
session_start();
if (!$_SESSION["username"]) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-FFL Locator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="CSSstyle.css">
    <link rel="icon" href="logo.png">
	
    <script type="text/javascript" async="" src="./Bootswatch  Cyborg_files/ga.js"></script>
	<script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
  <body>
    
	<!-- Navigation Bar -->
	<?php include "NAVBAR.php" ?>
	
    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>FFL Locator</h1>
            <p class="lead">Search For The FFL Near You!</p>
          </div>
        </div>

		<div><iframe width="1000px" title="FFL_NTCS" height="550px" src="https://data.atf.gov/w/p5gu-e8g7/?cur=qodE86zdhM2&from=root" frameborder="0" scrolling="no">
			<a href="https://data.atf.gov/FFL/FFL_NTCS/p5gu-e8g7" title="FFL_NTCS" target="_blank">FFL_NTCS</a></iframe><p>
			<a href="http://www.socrata.com/" target="_blank">Powered by Socrata</a>
		</div>
		</br>
		</br>
		<a href="INVPAGE.php" class="btn btn-success">Shop Now</a>
		<a href="CART.php" class="btn btn-primary" class="pull-right">Buy Now</a>
	  </div>
		
	<!-- Footer -->
	<?php include "FOOTER.php" ?>
	
	</div>

    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>
  

</body>
</html>

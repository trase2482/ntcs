<?php
session_start();
if (!isset($_SESSION["username"])) 
{
  header("Location: HOMEPAGE.php");
}
?>
<!DOCTYPE html>
 <!-- saved from url=(0029)http://bootswatch.com/cyborg/ 
--> <html lang="en"><head><meta http-equiv="Content-Type" 
content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="CSSstyle.css">
    <link rel="icon" href="logo.png">
	
    <script type="text/javascript" async="" src="./Bootswatch  Cyborg_files/ga.js"></script><script>

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
	
	<!-- background styling -->

	<!-- Other possibilities for background
	<div style="background-image: url(../images/test-background.gif); height: 200px; width: 400px; border: 1px solid black;">Example of a DIV element with a background image:</div>
	<div style="background-image: url(../images/test-background.gif); height: 200px; width: 400px; border: 1px solid black;"> </div>
		--> <div class="container">	

      <!-- Containers -->
	  
      <div class="bs-docs-section">
		<div class="page-header" id="banner" >
		
		<h1>NTCS Weapons</h1>
        <p class="lead">Buy, Sell, and Trade Weapons</p>
		<!--<div class="bgimg"> -->
		
		<img src="clint-eastwood.jpg" class="center-block" height=" 300px" width="100%" >
		
        <div class="row">
          <div class="col-lg-12">
            <h2>News</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="bs-component">


              <div class="panel panel-default">
                <div class="panel-heading">Buying News</div>
                <div class="panel-body">
                  Tighter restrictions on handgun sales proposed by congress.
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Selling News</h3>
                </div>
                <div class="panel-body">
                  New tax might take a bit of your weapon sales
                </div>
              </div>
           </div>
          </div>
          <div class="col-lg-4">
            <div class="bs-component">


              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Trading News</h3>
                </div>
                <div class="panel-body">
                  Top 10 most wanted weapons
                </div>
              </div>

              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">Safety News</h3>
                </div>
                <div class="panel-body">
                  Betty Sue shot her husband. Find out how to make sure it doesn't happen to you next.
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bs-component">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title">Sight News</h3>
                </div>
                <div class="panel-body">
                  Updates to the User interface coming soon.
                </div>
              </div>

              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Company News</h3>
                </div>
                <div class="panel-body">
                  New CEO of NTCS appointed after tragic car lift accident.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	
	<!-- Footer -->
	<?php include "FOOTER.php" ?>

    </div>
	</div>

    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>
  

</body></html>

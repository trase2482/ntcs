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
    <title>NTCS Weapons-Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
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

	#source-button{visibility:hidden;}
    </script>
  </head>
  
<body>
  
	<!-- Navigation Bar -->
	<?php include "NAVBAR.php" ?>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	<div class="container">
    <div class="row" >
          <div class="col-lg-6 col-lg-offset-3">
            <div class="well bs-component" >
              <form class="form-horizontal"  align="center" >
                <fieldset>
                  <legend><h3>Contact Form</h3></legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputEmail" placeholder="Name" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputPassword" placeholder="Email" type="text">
                     
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Phone Number</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputPassword" placeholder="Phone number" type="text">
                     
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="textArea" placeholder="Type message here"></textarea>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-10">
                      
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button  class="btn btn-primary" href="mailto:NTCSWeapons@gmail.com" type="submit">Submit</button>
					  <button class="btn btn-default" href="MAINPAGE.php">Cancel</button>
                    </div>
                  </div>
                </fieldset>
              </form>
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

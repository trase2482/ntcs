<?php

if(isset($_POST['submit'])) {
	
	require_once('../../connect.php');	
	try {
		$error = NULL; //initialize error message
		if ($_POST['inputPassword'] == $_POST['reinputPassword']) {
			//Check for unique username
			$db = $DBH->prepare("SELECT Usrname FROM Members WHERE Usrname=:Username");
			$db->bindParam(':Username', $_POST['inputUsername']);
			$db->execute();
			
			while ($row = $db->fetch()) {
				$error .= "Username already exists! Please choose a different one. <br>";
			}
			
			if (!$error) { //Check for error
				$stm = $DBH->prepare("INSERT INTO Members (Usrname, Password, Fname, LName, Address, City, State, Zip, Email, Paypal_Email) 
					value(:Username, :Password, :FName, :LName, :Address, :City, :State, :Zip, :Email, :Paypal_Email)");
				
				$stm->bindParam(':Username', $_POST['inputUsername']);
				$stm->bindParam(':Password', $_POST['inputPassword']); 
				$stm->bindParam(':FName', $_POST['inputFName']);
				$stm->bindParam(':LName', $_POST['inputLName']);
				$Address = $_POST['inputAddress1'] . " \n" . $_POST['inputAddress2'];
				$stm->bindParam(':Address', $Address);
				$stm->bindParam(':City', $_POST['inputCity']);
				$stm->bindParam(':State', $_POST['inputState']);
				$stm->bindParam(':Zip', $_POST['inputZip']);
				$stm->bindParam(':Email', $_POST['inputEmail']);
				$stm->bindParam(':Paypal_Email', $_POST['inputPaypal_Email']);


				if ($stm->execute()) { //Submit SQL command
					//Redirect to Login page
					header("Location: LOGIN.php");
				}
			}
		} else {
			$error .= "Passwords did not match! <br>";
		}
	}

	//Catch PDO Exception
	catch(PDOException $e) {
		echo $e->getMessage();
	}
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

		<title>Sign Up</title>

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
				 <div class="inner">
					<br/>
					<h2 class="cover-heading">Member Signup </h2>
					<?php //Display errors
						if ($error) {
							echo '<div class="alert alert-danger">' . $error . '</div>';
						}
					?>
				 </div>
			   <div class="row">
				<div class="outer","col-lg-6">
				 <div class="well bs-component" width="50%">
				  <form id= "submitForm" name="submitForm" onsubmit="return checkForm();" action="SIGNUP.php" method="POST" class='form-horizontal'>
					<fieldset>
					  <legend>Enter a username and password, along with personal information:</legend>
				
						  <!-- Username -->
						  <div class="form-group">  
						  <label for="inputUsername" class="col-lg-2 control-label">Username:</label>
							<div class="col-lg-10">
							  <input name="inputUsername" class="form-control" id="inputUsername" placeholder="Username" type="text" required>
							</div>
						  </div>
						
						  <!-- Password -->
						  <div id="inputPassword" class="inputPassword form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
							<div class="col-lg-10">
							  <input name="inputPassword" class="form-control" id="inputPassword" placeholder="Password" type="password" required>
							</div>
						  </div>
					
						  <!-- Re-Enter Password -->
						  <div id="reinputPassword" class="reinputPassword form-group">
							<label for="reinputPassword" class="col-lg-2 control-label">Re-Enter Password:</label>
							<div class="col-lg-10">
							  <input name="reinputPassword" class="form-control" id="reinputPassword" placeholder="Re-Enter Password" type="password" required>
							</div>
						  </div>
			
						  <!--  First Name -->
						  <div class="form-group">
							<label for="inputFName" class="col-lg-2 control-label">First Name:</label>
							<div class="col-lg-10">
							  <input name="inputFName" class="form-control" id="inputFName" placeholder="First Name" type="text" required>
							</div>
						  </div>

						  <!--  Last Name -->
						  <div class="form-group">
							<label for="inputLName" class="col-lg-2 control-label">Last Name:</label>   
							<div class="col-lg-10">
							  <input name="inputLName" class="form-control" id="inputLName" placeholder="Last Name" type="text" required>
							</div>
						  </div>
									  
						  <!--  Address 1 -->
						  <div class="form-group">
							<label for="inputAddress1" class="col-lg-2 control-label">Address:</label>   
							<div class="col-lg-10">
							  <input name="inputAddress1" class="form-control" id="inputAddress1" placeholder="Address" type="text" required>
							</div> 
						  </div>
		
						  <!--  Address 2 -->
						  <div class="form-group">
							<label for="inputAddress2" class="col-lg-2 control-label">Address 2:</label>        
							<div class="col-lg-10">
							  <input name="inputAddress2" class="form-control" id="inputAddress2" placeholder="Address 2" type="text">
							</div>                      
						  </div>
					  
						  <!--  City -->                                  
						  <div class="form-group">
							<label for="inputCity" class="col-lg-2 control-label">City:</label> 
							<div class="col-lg-10" >
							  <input name="inputCity" class="form-control" id="inputCity" placeholder="City" type="text" width = "100px" required>
							</div>                      
						  </div>
					  
						  <!--  State -->                                 
						  <div class="form-group">
							<label for="inputState" class="col-lg-2 control-label">State:</label>       
							<div class="col-lg-10"> 
							  <input name="inputState" class="form-control" id="inputState" placeholder="State" type="text" required>
							</div>
						  </div>
					
						  <!--  Zip -->
						  <div class="form-group">
							<label for="inputZip" class="col-lg-2 control-label">Zip Code:</label>      
							<div class="col-lg-10">
							  <input name="inputZip" class="form-control" id="inputZip" placeholder="Zip Code" type="text" pattern="^\d{5,6}(?:[-\s]\d{4})?$" required>
							</div>
						  </div> 

						  <!--  Email -->
						  <div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Email:</label>      
							<div class="col-lg-10">
							  <input name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" type="text" required>
							</div>
						  </div>        
			  
						  <!--  Paypal Email -->
						  <div class="form-group">
							<label for="inputPaypal_Email" class="col-lg-2 control-label">Paypal Email:</label>      
							<div class="col-lg-10">
							  <input name="inputPaypal_Email" class="form-control" id="inputPaypal_Email" placeholder="Paypal Email" type="text" required>
							</div>
						  </div>        
			
						  <div class="form-group">
							<div class="checkbox">
							    <label>
									<input name="agree" type="checkbox" required> Agree to <a href="#">Terms of Service</a>
								</label>
							</div>
						  </div>
			
						  <!-- Captcha -->
						  <script src='https://www.google.com/recaptcha/api.js'></script>
						  <div align= "center" class="g-recaptcha" data-sitekey="6LdDtQQTAAAAAKlhj8S6nRpcGpyDfd-vFOqrDbau"></div>
						  <br/>
						  <br/>
						  <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary">
						  <a href="HOMEPAGE.php" class="btn btn-lg btn-danger">Cancel</a>
					</fieldset>
				  </form>			 
				 </div>
			    </div>
			   </div>
	          </div>
           </div>
			  <?php include "FOOTER.php" ?>
		  </div>
		</div>
		 
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="Cover%20Template%20for%20Bootstrap_files/jquery.js"></script>
		<script src="Cover%20Template%20for%20Bootstrap_files/bootstrap.js"></script>

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="Cover%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
<script>
$('input[name=reinputPassword]').change(function() {
  if ($('input[name=inputPassword]').val() != $('input[name=reinputPassword]').val()) {
    $('div.reinputPassword').addClass('has-error');
    $('div.inputPassword').addClass('has-error');
  } else {
    $('div.reinputPassword').removeClass('has-error');
    $('div.inputPassword').removeClass('has-error');
  }

});
</script>		
	</body>
</html>

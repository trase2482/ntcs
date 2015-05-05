<?php
session_start();
if ((!isset($_SESSION["username"])) || ($_SESSION['username']!='admin')) 
{
  
    header("Location: HOMEPAGE.php");
  
}

$message = null;
$error = null; 

//Update Member data 
if(isset($_POST['submit'])) {
	
	require_once('../../connect.php');	
	try {
		$stm = $DBH->prepare("UPDATE Members SET Usrname=:Username, Password=:Password, FName=:FName, LName=:LName, Address=:Address, 
			City=:City, State=:State, Zip=:Zip, Email=:Email, Paypal_Email=:Paypal_Email WHERE MemberUID=:MemberID");
		
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
		$stm->bindParam(':MemberID', $_POST['id']);

		if ($stm->execute()) { //Submit SQL command
			$message .= "Your changes have been applied! ";	
		} else {
			$error .= "An error has occured. ";
		}
	}

	//Catch PDO Exception
	catch(PDOException $e) {
		echo $e->getMessage();
	}
}

//Delete Member row in table
if(isset($_POST['delete'])) {
	if ($_POST['inputUsername'] != 'admin') {	
		require_once('../../connect.php');	
		try {
			$stm = $DBH->prepare("DELETE FROM Members WHERE MemberUID=:MemberID");
		
			$stm->bindParam(':MemberID', $_POST['id']);
			
			$stm->execute(); //Submit SQL command
			$stm=NULL;
		}
	
		//Catch PDO Exception
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	} else {
		$error .= "I don't suggest deleting yourself! ";
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

		<title>NTCS Weapons-Admin Page</title>

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
				 <div class="inner">
					</br>
					<h2 class="cover-heading">Admin Page</h2>
				 </div>
				 <?php
				  if (isset($message)) {
					echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
				  }
				  if (isset($error)) {
					echo '<div class="alert alert-warning" role="alert">' . $error . '</div>';
				  }
				 ?>
			   <div class="row">
				<div class="outer","col-lg-6">
				 <div class="well bs-component" width="50%">
				  <form id= "submitForm" name="submitForm" onsubmit="return checkForm();" action="ADMIN.php" method="POST" class='form-horizontal'>
					<fieldset>
					  <legend>Enter Member Username and click 'Get Member' to edit member record.</legend>
					  
						  <?php
							  try { 
								  require_once('../../connect.php');
								  $query = "SELECT * FROM Members WHERE Usrname=:username;";
								  $db = $DBH->prepare($query);
								  $db->bindParam(":username", $_POST['username']);
								  $db->execute();
								  $db->setFetchMode(PDO::FETCH_OBJ);
						  ?>
						  
						  <!-- Member -->
						  <div class="form-group"> 
							<input type="submit" name="GetMember" value="Get Member" class="btn btn-lg btn-primary">
							<div class="col-lg-8">
							  <input name="username" class="form-control" id="username" placeholder="Username" type="text">

							</div>
						  </div>
						  
						  <?php
								 if (($row = $db->fetch()) && !(isset($_POST['getMember'])) && (trim($_POST['username']) != '') ) {
									$Addresses = explode("\n", $row->Address);
									
						  ?>
						  <!--Store MemberID-->
						  <input type="hidden" name="id" value="<?php echo $row->MemberUID; ?>">
						  
						  <!-- Username -->
						  <div class="form-group">  
						  <label for="inputUsername" class="col-lg-2 control-label">Username:</label>
							<div class="col-lg-10">
							  <input name="inputUsername" class="form-control" id="inputUsername" placeholder="Username" value="<?php echo $row->Usrname; ?>" type="text">
							</div>
						  </div>
													  
						  <!-- Password -->
						  <div id="inputPassword" class="inputPassword form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
							<div class="col-lg-10">
							  <input name="inputPassword" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $row->Password; ?>" type="password">
							</div>
						  </div>
					
						  <!-- Re-Enter Password -->
						  <div id="reinputPassword" class="reinputPassword form-group">
							<label for="reinputPassword" class="col-lg-2 control-label">Re-Enter Password:</label>
							<div class="col-lg-10">
							  <input name="reinputPassword" class="form-control" id="reinputPassword" placeholder="Re-Enter Password" value="<?php echo $row->Password; ?>"  type="password">
							</div>
						  </div>
			
						  <!--  First Name -->
						  <div class="form-group">
							<label for="inputFName" class="col-lg-2 control-label">First Name:</label>
							<div class="col-lg-10">
							  <input name="inputFName" class="form-control" id="inputFName" placeholder="First Name" value="<?php echo $row->FName; ?>" type="text">
							</div>
						  </div>

						  <!--  Last Name -->
						  <div class="form-group">
							<label for="inputLName" class="col-lg-2 control-label">Last Name:</label>   
							<div class="col-lg-10">
							  <input name="inputLName" class="form-control" id="inputLName" placeholder="Last Name" value="<?php echo $row->LName; ?>" type="text">
							</div>
						  </div>
									  
						  <!--  Address 1 -->
						  <div class="form-group">
							<label for="inputAddress1" class="col-lg-2 control-label">Address:</label>   
							<div class="col-lg-10">
							  <input name="inputAddress1" class="form-control" id="inputAddress1" placeholder="Address" value="<?php echo $Addresses[0]; ?>" type="text">
							</div> 
						  </div>
		
						  <!--  Address 2 -->
						  <div class="form-group">
							<label for="inputAddress2" class="col-lg-2 control-label">Address 2:</label>        
							<div class="col-lg-10">
							  <input name="inputAddress2" class="form-control" id="inputAddress2" placeholder="Address 2" value="<?php if (isset($Addresses[1])) { echo $Addresses[1];} ?>" type="text">
							</div>                      
						  </div>
					  
						  <!--  City -->                                  
						  <div class="form-group">
							<label for="inputCity" class="col-lg-2 control-label">City:</label> 
							<div class="col-lg-10" >
							  <input name="inputCity" class="form-control" id="inputCity" placeholder="City" value="<?php echo $row->City; ?>" type="text" width = "100px">
							</div>                      
						  </div>
					  
						  <!--  State -->                                 
						  <div class="form-group">
							<label for="inputState" class="col-lg-2 control-label">State:</label>       
							<div class="col-lg-10"> 
							  <input name="inputState" class="form-control" id="inputState" placeholder="State" value="<?php echo $row->State; ?>"  type="text">
							</div>
						  </div>
					
						  <!--  Zip -->
						  <div class="form-group">
							<label for="inputZip" class="col-lg-2 control-label">Zip Code:</label>      
							<div class="col-lg-10">
							  <input name="inputZip" class="form-control" id="inputZip" placeholder="Zip Code" value="<?php echo $row->Zip; ?>" type="text" pattern="^\d{5,6}(?:[-\s]\d{4})?$">
							</div>
						  </div> 

						  <!--  Email -->
						  <div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Email:</label>      
							<div class="col-lg-10">
							  <input name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row->Email; ?>" type="text">
							</div>
						  </div>        
			  
						  <!--  Paypal Email -->
						  <div class="form-group">
							<label for="inputPaypal_Email" class="col-lg-2 control-label">Paypal Email:</label>      
							<div class="col-lg-10">
							  <input name="inputPaypal_Email" class="form-control" id="inputPaypal_Email" placeholder="PayPal Email" value="<?php echo $row->Paypal_Email; ?>" type="text">
							</div>
						  </div>        
						  
						  <?php
								  }
								  //else {
								//	echo '<p>Member not found!</p>';
								 // }
							  }
							  catch (PDOException $e) {
								echo $e->getMessage();
							  }

						  ?>
						  
						  </br>
						  </br>
						  
						  <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-success">
						  <input type="submit" name="delete" value="Delete" class="btn btn-lg btn-danger">
						  
						  </br>
						  </br>
						  
						  <a href="HOMEPAGE.php?logout=true">Sign Out</a>
						  
					</fieldset>
				  </form>			 
				 </div>
			    </div>
			   </div>
	          </div>
           </div>
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


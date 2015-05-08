<?php
session_start();
if (isset($_SESSION['username'])) {
	header("Location: MAINPAGE.php");
}

$error = '';


if (isset($_POST['submit']) && (trim($_POST['password']) != "")) {

	require_once('../../connect.php');
	
	try {
		$sql = $DBH->prepare("SELECT * FROM Members WHERE Usrname = :username AND Password = :password");
		$sql->bindParam(':username', $_POST['username']);	
		$sql->bindParam(':password', $_POST['password']); 
	
		//$sql->setFetchMode(PDO::Fetch_OBJ);

		$sql->execute();

		if ($sql->fetch()) {
			$_SESSION['username'] = $_POST['username'];
			if ($_SESSION['username'] == 'admin') {
				header("Location: ADMIN.php");
			} else {
				header("Location: MAINPAGE.php");
			}
		}else {
			$error = "Log-in failed.";
		}
	}
	catch(PDOException $e) {
		$error = $e->getMessage();
	}
}

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="logo.png">

    <title>Log in Page</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Cover%20Template%20for%20Bootstrap_files/cover.css" rel="stylesheet">
  </head>

<body>






<div class="site-wrapper">

  <div class="site-wrapper-inner">

    <div class="cover-container">

      <div class="inner cover">
      
        <h1 class="cover-heading"> NTCS Weapons Log In </h1>
        <br/>
        <p class="lead">Input login info here:</p>
        <div class="form-group">
	  <form action="LOGIN.php" method="post">
            <label for="username" class="col-lg-2 control-label">Username</label>
              <div class="col-lg-10">
                <input class="form-control" name="username" id="username" placeholder="Username" type="text">
              </div>
        </div>
	<div class="form-group">
          <label for="password" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
          <input class="form-control" id="password" name="password" placeholder="Password" type="password">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember Password and User Name
            </label>
          </div>          
          <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary">
          <a href="HOMEPAGE.php" class="btn btn-lg btn-default">Cancel</a>
		
          </form>
        </div>
    </div>
  </div> 
		<?php
	      	   if (isset($error)) {echo '<p class="text-danger">' .$error. '</p>'; }
		?>			  

             
      <div class="mastfoot">
        <div class="inner">
          <?php include('FOOTER.php'); ?>
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
  

</div>
</body>
</html>

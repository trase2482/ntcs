<?php
session_start();
if (!isset($_SESSION["username"])) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>NTCS Weapons-Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
<link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
<link rel="icon" href="logo.png">
	
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
        <div class="row">
			
			<div class="col-lg-6 col-lg-offset-3">
				<div class="well bs-component" >
					<form action="INVPOST.php" method="POST" class="form-horizontal" enctype="multipart/form-data" align="center" >
					<fieldset>
                  <legend><h3>Post Your Firearm To Our Inventory!</h3></legend>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <input class="form-control" placeholder="Model" name = "model" type="text">
                    </div>
                  </div>
				  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <input class="form-control" placeholder="Serial Number" name="serialnum" type="text">
                    </div>
                  </div>
				  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <textarea class="form-control" placeholder="Description" rows="5" cols="40" name="description" ></textarea>
                    </div>
                  </div>
				  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <input class="form-control" placeholder="Price" name="price" type="text">
                    </div>
                  </div>
				  		  <div class="form-group">
                    
                    <div class="col-lg-10">
                       <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                  </div>
				  		  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <button type="submit" class="btn btn-default">Submit</button></td>
                    </div>
                  </div>
                </fieldset>
              </form>
		<?php 
		  if (isset($error)) { 
		    echo "<p class='text-danger'>" . $error . "</p>"; 
		  } 
		?>
            </div>
          </div>
    </div>
	 
  
	<!-- Footer -->
	<?php include "FOOTER.php" ?>
	
	</div>	
<?php


// Provides three methods to connect to the database
// $conn for mysqli procedural
// $mysqli for object-oriented mysqli
// $DBH for PDO object-oriented
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $exists = 0;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// define variables and set to empty values
   $model = $serailnum = $description = $price = $result= '';

   $model = $_POST["model"];
   $serialnum = $_POST["serialnum"];
   $description = $_POST["description"];
   $price = $_POST["price"];

    $poster =$_SESSION["username"];
    $image_name = $_FILES["fileToUpload"]["name"];

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $error = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
    if (file_exists($target_file)) {
      $error = "Sorry, file already exists.";
      $uploadOk = 0;
      $exists = 1;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
       $error = "Sorry, your file is too large.";
       $uploadOk = 0;
    }
	

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" ) {
       $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
    }
	

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
       $error = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $error = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	  require_once('../../connect.php');
	try {
		$sql = $DBH->prepare("Insert INTO Inventory (Model, Serial_Number, Price, Description, SellerID, Picture) value (:model, :serial, :price, :description, :seller, :picture)");
	  	$error =  "<br>Database updated<br>";
	  	// Bind each parameter to a :variable in your query
	  	$sql->bindParam(':model', $model);
	  	$sql->bindParam(':serial', $serialnum);
	  	$sql->bindParam(':price', $price);
	  	$sql->bindParam(':description', $description);
	  	$sql->bindParam(':seller', $poster);
          	$sql->bindParam(':picture', $target_file);
	  	$sql->execute();
	} 
	catch(PDOException $e) {
		echo $e->getMessage();
	}
       } else {
          $error =  "Sorry, there was an error uploading your file.";
          if ($exists == 1) {
		require_once('../../connect.php');
          	try {
                	$sql = $DBH->prepare("Insert INTO Inventory (Model, Serial_Number, Price, Description, SellerID, Picture) value (:model, :serial, :price, :description, :seller, :picture)");
                
                	// Bind each parameter to a :variable in your query
                	$sql->bindParam(':model', $model);
                	$sql->bindParam(':serial', $serialnum);
                	$sql->bindParam(':price', $price);
                	$sql->bindParam(':description', $description);
                	$sql->bindParam(':seller', $poster);
                	$sql->bindParam(':picture', $target_file);
                	$sql->execute();
          	}
          	catch(PDOException $e) {
                	echo $e->getMessage();
          }

       }
    }
    }
?>
    </div>


    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
     

</body></html>

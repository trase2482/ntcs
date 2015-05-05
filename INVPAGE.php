<?php
require('cartAction.php');
if (!isset($_SESSION["username"])) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Inventory Page</title>
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

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>NTCS Inventory</h1>
            <p class="lead">Search Our Inventory for Your Next Firearm!</p>
          </div>
        </div>
		<div class="row">
		<div class="bs-component">
              <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="#">Model</a>
                  </div>
                    <form class="navbar-form navbar-left" role="search" style"min-width: 100%">
					<p class="lead">Press the Search Button to see all Inventory!</p>
                      <div class="form-group">
                        <input class="form-control" placeholder="Search" name = "search" type="text">
						</div>
					  <button type="search" class="btn btn-default">Search</button>
						<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Model</th>
					<th>Serial Number</th>
					<th>Picture</th>
                    <th>Description</th>
                    <th>Price</th>
					<th>Add To Cart</th>
                  </tr>
                </thead>
                <tbody>
       <tr>              
						
						
<?php 
						
try {
  require_once('../../connect.php');
  if (isset($_GET['search'])) {
	$db = $DBH->prepare("SELECT * FROM Inventory WHERE (Model LIKE :search OR Serial_Number LIKE :search OR Description LIKE :search) AND Inventory_Number NOT IN (SELECT Inventory_Number FROM Orders)");
	$searchbox = "%" . $_GET['search'] . "%";
	$db->bindParam(':search' , $searchbox);
	$db->execute();
  } else {
	$db = $DBH->query("SELECT * FROM Inventory WHERE Inventory_Number NOT IN (SELECT Inventory_Number FROM Orders)");
  }
	 
  $db->setFetchMode(PDO::FETCH_ASSOC);	  
  while ($row = $db->fetch()) {
?>
      <td>
        <?php echo $row['Model']; ?>
      </td>

      <td>
        <?php echo $row['Serial_Number']; ?>
      </td>

      <td>
<?php
     if ($row['Picture'] != NULL) {
	echo "<img src='";
	echo $row['Picture']. "'" ;
	echo "class='thumbnail' height='75' width='100'/></td>";
     } else { 
	echo '<img src="no_image.png" class="thumbnail" height="75" width="100"/></td>';
     }  
?>
    
       <td>
         <?php echo $row['Description']; ?>
       </td>

       <td>
	 <?php 
         $price = $row['Price'];

setlocale(LC_MONETARY, "en_US");
$price = money_format("$%10.2n", $price);
echo $price
?>
       </td>


       <td>
<?php
         if (!checkCart($row['Inventory_Number'], $row['Price'], $row['SellerID'])) {
	   $link = "addToCart=1&invnum=" . $row['Inventory_Number'] . "&pricetag=" . $row['Price'] . "&seller=" . $row['SellerID'];
	   if (isset($_GET['search'])) {
		$link .= "&search=" . $_GET['search'];
	   }
           echo "<a href='INVPAGE.php?". $link . "' class='btn btn-primary'>Add to Cart</a>";
         } else {
           echo "<a href='CART.php' class='btn btn-success'>In Cart<a>";
         }    
?>
    </td>


    
</tr>
<?php
  }
}
catch(PDOException $e) {
  echo $e->getMessage();
}

?>
</tr>
</tbody>
</table>  

                      
                      
					</form>
		    
                </div>
              </nav>
		</div>
      </div>
	  <div class="bs-component">
	  
	              
	  </div>
	  	  		<a href="FFL.php" class="btn btn-success">FFL Locator</a>
    </div>
	
	<!-- Footer -->
	<?php include "FOOTER.php" ?>



    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>
  

</body></html>

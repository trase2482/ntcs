<?php
session_start();
if (!isset($_SESSION["username"])) 
{
  header("Location: HOMEPAGE.php");
}
?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Order Page</title>
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

	<div class="container">
      <!-- Table -->
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Personal Information</h1>
             </div>
				<?php
				
				if (isset($_SESSION['username'])) {	

				  $query = "SELECT * FROM Members where Usrname = :user";

				  try {
					require_once('../../connect.php');
					
					$stm = $DBH->prepare($query);
					$stm->bindParam(':user', $_SESSION['username']);
					$stm->execute();
					$stm->setFetchMode(PDO::FETCH_OBJ);
					while($row = $stm->fetch()) {       
						echo "<h6>Name: ";
							echo $row->FName;
							echo $row->LName;
						echo "</h6></br>";
						
						echo "<h6>Street: ";
							echo $row->Address;
						echo "</h6></br>";
						
						echo "<h6>City: ";
							echo $row->City;
						echo "</h6></br>";
						
						echo "<h6>State: ";
							echo $row->State;
						echo "</h6></br>";

						echo "<h6>Zip: ";
							echo $row->Zip;
						echo "</h6></br>";

						echo "<h6>Email: ";
							echo $row->Email;
						echo "</h6></br>";	
					}
				  }
				  catch(PDOException $e) {
					echo $e->getMessage();
				  }
				} else {

					echo 'Member information does not exist.';
				} 
				?> 	 
            </br>
            </br>
	      </div>
	    </div>
		
		<div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Order History</h1>
            </div>
            
            <div class="bs-component">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Order Number</th>
					<th>Item</th>
                    <th>Description</th>
                    <th>Sell Price</th>
                    <th>Sold By</th>
                  </tr>
                </thead>
                <tbody>
					<?php
					try { 
					  require_once('../../connect.php');
					  $stm = NULL; // Clear previous database handler
					  $query = "select * FROM Inventory,Orders WHERE Seller_ID=SellerID AND Inventory.Inventory_Number=Orders.Inventory_Number AND Buyer_ID=:name;";
					  $stm = $DBH->prepare($query);
					  $stm->bindParam("name", $_SESSION['username']);
					  $stm->execute();
					  $stm->setFetchMode(PDO::FETCH_OBJ);
					  $count = 0;
					  while ($row = $stm->fetch()) {

					?>                
					<tr>
						<td><?php echo $row->Order_Number; ?></td>
						<td><img src="<?php echo $row->Picture;?>" height="75" width="100"/></td>
						<td><?php echo $row->Description; ?></td>
						<td><?php echo $row->Price; ?></td>
						<td><?php echo $row->SellerID; ?></td>
					</tr>
					<?php
						$count++;                  
					  }
					  if ($count == 0) {
						echo '<tr><td></td><td>No purchases found!</td><td> </td><td> </td><td></td></tr>';
					  }
					}
					catch (PDOException $e) {
					  echo $e->getMessage();
					}
					?>	
                </tbody>
              </table> 
            </div>
          </div>
        </div>
	  
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Sold Items</h1>
            </div>

            <div class="bs-component">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Order Number</th>
					<th>Item</th>
                    <th>Description</th>
                    <th>Sell Price</th>
                    <th>Purchased By</th>
                  </tr>
                </thead>
                <tbody>
					<?php
					try {
					  require_once('../../connect.php');
					  $stm = NULL; // Clear previous database handler
					  $query = "select * FROM Inventory,Orders WHERE Seller_ID=SellerID AND Inventory.Inventory_Number=Orders.Inventory_Number AND Seller_ID= :name;";
					  $stm = $DBH->prepare($query);
					  $stm->bindParam("name", $_SESSION['username']);
					  $stm->execute();
					  $stm->setFetchMode(PDO::FETCH_OBJ);
					  $count = 0;
					  while ($row = $stm->fetch()) {

					?>                
					<tr>
						<td><?php echo $row->Order_Number; ?></td>
						<td><img src="<?php echo $row->Picture;?>" height="75" width="100"/></td>
						<td><?php echo $row->Description; ?></td>
						<td><?php echo $row->Price; ?></td>
						<td><?php echo $row->Buyer_ID; ?></td>
					</tr>
					<?php
						$count++;
					  }
					  if ($count == 0) {
						echo '<tr><td></td><td>No sales found!</td><td> </td><td> </td><td></td></tr>';
					  }
					}
					catch (PDOException $e) {
					  echo $e->getMessage();
					}
					?> 
                </tbody>
              </table> 
            </div>
          </div>
        </div>

	<!-- Footer -->
	<?php include "FOOTER.php" ?>	
	  </div>
	</div>
	
	<!--For faster loading page-->
    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>

  </body>
</html>

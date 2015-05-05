<?php
require('cartAction.php');


if (!isset($_SESSION["username"])) 
{
  header("Location: HOMEPAGE.php");
}
if (isset($_POST['auth'])) {
  $confirmation = $_POST['auth'];
  $amount = $_POST['payment_gross'];
  echo $confirmation . "<br/>" . $amount;
}

?>

<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Confirmation Page</title>
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
      <!-- Table -->
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Order Confirmation</h1>
			  <h6 id="tables">Print this page for your records.</h6>
            </div>

			<div class="bs-component">
			  <table class="table table-striped table-hover">
				<thead>
					<tr>
						<!--<th>Select</th>-->
						<th>Model</th>
						<th>Serial Number</th>
						<th>Picture</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php

					echo "<br/>";
					try {
						if (isset($_SESSION['cart']) && (count($_SESSION['cart'] > 0))) {	

						  $query = "SELECT * FROM Inventory WHERE ";
						  $i = 0;
						  foreach($_SESSION['cart'] as $item) {
							if ($i < (count($_SESSION['cart'])-1) ) {
							  $query .="Inventory_Number=" . $item->id . " OR ";
							  $i++;
							} else {
							  $query .="Inventory_Number=" . $item->id;
							}
							require_once('../../connect.php');
							//Record sale to Orders table
							$db = NULL;
							$db = $DBH->prepare("INSERT INTO Orders (Inventory_Number, Buyer_ID, Seller_ID) 
							VALUES (:Inventory_Number, :Buyer_ID, :Seller_ID)");
						
							$db->bindParam(':Inventory_Number', $item->id);
							$db->bindParam(':Buyer_ID', $_SESSION["username"]);
							$db->bindParam(':Seller_ID', $item->seller);
							echo "DEBUG: " . $item->id . " sold by " . $item->seller;
							$db->execute(); //Submit SQL command
						}	
						
						require_once('../../connect.php');
						
						$stm = $DBH->query($query);
						$stm->setFetchMode(PDO::FETCH_OBJ);
						while($row = $stm->fetch()) {       
						  echo "<td>";
							echo $row->Model;
						  echo "</td>";

								echo "<td>" ;
								  echo $row->Serial_Number;
								echo "</td>";

								echo "<td>" ;
								  if ($row->Picture != NULL) {
								echo "<img src='";
								echo $row->Picture. "'" ;
								echo "class='thumbnail' height='75' width='100'/></td>";
								  } else { //Show no-picture icon if there isn't one
								echo '<img src="no_image.png" class="thumbnail" height="75" width="100"/></td>';
								  }
								echo "<td>" ;
								  echo $row->Description;
								  echo "</td>";

								echo "<td>" ;
								  echo $row->Price;
								echo "</td>";

					echo "</tr>";

						}
					  

} else {

						echo '<tr><td><td>There are no items in your cart!</td></td></tr>';
					}
					}

					  catch(PDOException $e) {
						echo $e->getMessage();
					  }

					
					
					//Empty Cart
					unset($_SESSION['cart']);
					?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

	  <!-- Panels -->
	  <div class="row">
          <div class="col-lg-12">
            <h4>Shipping & Billing Information</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="bs-component">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Billing Address:</h3>
                </div>
                <div class="panel-body">
				  <?php
					echo $_POST['address_name'];
					echo "</br>";
					echo $_POST['address_street'];
					echo "</br>";
					echo $_POST['address_city'];
					echo ", ";					
					echo $_POST['address_state'];
					echo " ";
					echo $_POST['address_zip'];
				  ?>
                </div>
              </div>
            </div>
          </div>
		  
          <div class="col-lg-4">
            <div class="bs-component">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Shipping Address:</h3>
                </div>
                <div class="panel-body">
					<?php
					if (isset($_SESSION['username'])) {	

					  $query = "SELECT * FROM Members where Usrname ='" . $_SESSION["username"] . "'";

					  try {
						require_once('../../connect.php');
						
						$stm = $DBH->query($query);
						$stm->setFetchMode(PDO::FETCH_OBJ);
						while($row = $stm->fetch()) {       
							echo $row->FName;
							echo " ";					
							echo $row->LName;
							echo "</br>";
							
							echo " ";
							echo $row->Address;
							echo " </br>";
							
							echo " ";
							echo $row->City;
							echo ", ";
							
							echo $row->State;
							echo " ";

							echo $row->Zip;
						}
					  }
					  catch(PDOException $e) {
						echo $e->getMessage();
					  }
					} else {

						echo 'Member information does not exist.';
					} 
					?>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-4">
            <div class="bs-component">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Payment Info:</h3>
                </div>
                <div class="panel-body">
				  <?php
					echo "Payment Total: $";
					echo $_POST['payment_gross'];
					echo "</br>";
					echo "Payment Date: ";
					echo $_POST['payment_date'];
					echo "</br>";
					echo "Payment Status: ";
					echo $_POST['payment_status'];
				  ?>
                </div>
              </div>
            </div>
          </div>
		  
        </div>

	<!-- Footer -->
	<?php include "FOOTER.php" ?>
	  
	</div>

    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>

</body></html>

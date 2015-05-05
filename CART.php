<?php
require('cartAction.php');


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
            <p class="lead">View Items In Your Cart!</p>
          </div>
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
					<th></th>
                  </tr>
                </thead>
                <tbody>
				  <tr>
					<?php

					echo "<br/>";
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
					  }	
					  try {
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

								echo "<td>";
								  echo "  <a href='CART.php?removeFromCart=1&invnum=" . $row->Inventory_Number . "' class='btn btn-danger'>Remove</a>";
								echo "</td>";
								echo "</tr>";
						}
					  }
					  catch(PDOException $e) {
						echo $e->getMessage();
					  }
					} else {

						echo '<tr><td><td>There are no items in your cart!</td></td></tr>';
					} 
					?>
				  </tr>
				</tbody>
	    </table>              
        </div>
		<a href="FFL.php" class="btn btn-success">FFL Locator</a>
		<a href="INVPAGE.php" class="btn btn-primary">Shop Now</a>
		<?php
		if (isset($_SESSION['cart'])) {
		?>				
			<form class="pull-right" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
			  <input type="hidden" name="cmd" value="_xclick">
			  <input type="hidden" name="business" value="ntcsweapons@gmail.com">
			  <input type="hidden" name="lc" value="US">
			  <input type="hidden" name="item_name" value="<?php echo count($_SESSION['cart']); ?> guns in cart">
			  <input type="hidden" name="amount" value="<?php echo cartTotal(); ?>">
			  <input type="hidden" name="currency_code" value="USD">
			  <input type="hidden" name="button_subtype" value="services">
			  <input type="hidden" name="no_note" value="0">
			  <input type="hidden" name="cn" value="Add special instructions to the seller:">
			  <input type="hidden" name="no_shipping" value="2">
			  <input type="hidden" name="rm" value="2">
			  <input type="hidden" name="return" value="http://ntcs.no-ip.org/CONFIRMATION.php">
			  <input type="hidden" name="cancel_return" value="http://ntcs.no-ip.org/CART.php">
			  <input type="hidden" name="tax_rate" value="7.000">
			  <input type="hidden" name="shipping" value="10.00">
			  <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
			  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>	
		<?php
			} // end isset[$_SESSION['cart'])
		?>

    </div>
	
	<!-- Footer -->
	<?php include "FOOTER.php" ?>
	
	<!--For faster page-loading-->	
    <script src="jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootswatch.js"></script>  
	
	</body>
</html>

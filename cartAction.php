<?php

$error = null; 

// The product class is used to hold data about items in the cart
class Product {
        var $id; //Stores the Inventory_Number
        var $price; //Stores the Price
	var $seller; //Stores the SellerID
}

// Begin a new session, or resume the current one. 
session_start();

// Returns the total number of items in the cart. 
function cartTotal() {
	if (isset($_SESSION['cart'])){
		$total = 0;
		foreach($_SESSION['cart'] as $item) {
			$total += $item->price;
		}
		return $total;
	} else {
		return 0;	
	}
}

// Check to see if there is a matching item in the cart. 
// Returns true if the item is already in cart. 
function checkCart($id, $price, $seller) {
	if (is_numeric($id) && is_numeric($price)) {
		$product = new Product();
		$product->id = $id;
		$product->price = $price;
		$product->seller = $seller;
		if (isset($_SESSION['cart'])) {
			if (in_array($product, $_SESSION['cart'])) {
				return true;
			} else {
				return false;
			}
		}
	} else {
		return false;
	}
}


/*
	Called from a link generated on the Inventory page
	For example, http://example.php?addToCart=1&invnum=6
*/
if (isset($_GET['addToCart'])) {
        $product = new Product();

	// Error handling
        if (is_numeric($_GET['invnum'])) {
		$product->id = $_GET['invnum'];
		$product->seller = $_GET['seller'];
	} else { 
		$error .= "Please use only numeric values for product ID. <br/>";
	}
	if (is_numeric($_GET['pricetag'])) {
		$product->price = $_GET['pricetag'];
	} else {
		$error .= "Please use only numeric values for pricing. <br/>";
	}
	
	// Check if there is already a cart array
        if (isset($_SESSION['cart'])) {
                if (in_array($product, $_SESSION['cart'])) {
                      $error .= "Item is already in cart!"; 
                } else {
			//Only add to array if there are no errors
                        if (!isset($error)) {
				array_push($_SESSION['cart'], $product);
			}
		}
        } else {
		//Crete a new cart array
                $_SESSION['cart'][] = $product;
        }
}

/*
	For example, example.php?removeFromCart=1&invnum=10
	Will search for and remove that item from the cart
*/
if (isset($_GET['removeFromCart'])) {
        $i = 0;
        foreach($_SESSION['cart'] as $item) {
		if (is_numeric($_GET['invnum'])) {	 
	        	if ($item->id == $_GET['invnum']) {
                        	unset($_SESSION['cart'][$i]);
                		if (count($_SESSION['cart']) == 0){
					// If there are no more items in the cart, 
					// remove the cart array. 
					unset($_SESSION['cart']);
				}else{
					// Resort the cart array to ensure there are no skips
		        		sort($_SESSION['cart']);
				}
                		} else {
                        		$i++;
                		}
        	} else {
			$error .= "Please use only numeric values for ID.";
		}
	}
}
?>


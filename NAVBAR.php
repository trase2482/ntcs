<div class="navbar navbar-default navbar-fixed-top"style="margin-bottom: 30px";>
      <div class="container" style="margin-top: 5px; margin-bottom: 50px";> 
        <a class="navbar-brand" href="MAINPAGE.php"><img src="logo.png" height="80" width="190"/></a> <!-- 35 80-->
		<div class="navbar-header" height=10% width=100%>		  
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main" height=10% width=100%>
          <ul class="nav navbar-nav">
            <li>
              <a href="MAINPAGE.php">Main Page</a>
            </li>
	    <li>
              <a href="INVPAGE.php">Buy</a>
            </li>
	    <li>
              <a href="INVPOST.php">Sell</a>
            </li>
            <li>
              <a href="SAFETY.php">Firearm Safety</a>
            </li>
	    <li>
              <a href="ABOUT.php">About</a>
            </li>
	    <li>
              <a href="CONTACT.php">Contact</a>
            </li>
	    <li>
	      <a href="FFL.php">FFL Locator</a>
            </li>
	    </ul>	  
		  <ul class="nav navbar-nav navbar-right">
            <li><a href="HOMEPAGE.php?logout=true">Sign Out</a></li>
            <li><a href="ACCOUNT.php">Account</a></li>
             <li>
              <a href="CART.php">Cart
                <?php 
		if (isset($_SESSION['cart'])){
			echo "<span class='badge'>";
			echo count($_SESSION['cart']);
			echo "</span>"; 
		} 
		?>
              </a>
            </li>
	  </ul>	  
        </div>
      </div>
</div>

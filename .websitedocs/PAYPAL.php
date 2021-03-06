<!DOCTYPE html>
<!-- saved from url=(0029)http://bootswatch.com/cyborg/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NTCS Weapons-Payment Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="CSSstyle.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
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
	<?php include NAVBAR.php ?>
		
	<div class="container">
      <!-- Table -->
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Payment</h1>
            </div>

            <div class="bs-component">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
					<th>Item</th>
                    <th>Description</th>
					<th>Price</th>
					<th>Shipping</th>
                    <th>Order Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
					<td><img src="C:\Users\Nicole\Desktop\g1.jpg" height="75" width="100"/></td>
                    <td>Gun description</td>
                    <td>$190.00</td>
					<td>$10.00</td>
                    <td>$200.00</td>
                  </tr>
                </tbody>
              </table>
			  <!-- PayPal Payment Button-->			  
			  <p class="paypal">Pay here with PayPal
			  <script async="async" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=NTCSWeapons@gmail.com" 
				data-button="buynow" 
				data-name="default" 
				data-quantity="1" 
				data-amount="5.00" 
				data-currency="USD" 
				data-shipping="10.00" 
				data-tax="3.50" 
				data-callback="C:\Users\nicole\Desktop\websitedocs\websitedocs\CONFIRMATION.html" 
				data-env="sandbox"
			  ></script></p>			  
            </div>
          </div>
        </div>
      </div>
	       
	  <!-- Comments -->
	  <div id="source-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Source Code</h4>
            </div>
            <div class="modal-body">
              <pre></pre>
            </div>
          </div>
        </div>
      </div>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Made by <a href="http://thomaspark.me/" rel="nofollow">Thomas Park</a>. Contact him at <a href="mailto:thomas@bootswatch.com">thomas@bootswatch.com</a>.</p>
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="http://getbootstrap.com/" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
          </div>
        </div>
      </footer>
    </div>

    <script src="./Bootswatch  Cyborg_files/jquery-1.10.2.min.js"></script>
    <script src="./Bootswatch  Cyborg_files/bootstrap.min.js"></script>
    <script src="./Bootswatch  Cyborg_files/bootswatch.js"></script>

</body></html>
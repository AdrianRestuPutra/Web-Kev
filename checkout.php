<!doctype html>

<?php 
	// CACHE TEMPLATE
	
	$a='<script type="text/javascript"> document.write(Date()) </script>';
	
	require_once("phpFastCache/phpfastcache.php");
	
	$cache = phpFastCache();
	if ($cache->get("cart") == null) {
		// DOING INITIALIZE CACHE
		// THIS SHOULD BE CALLED ONCE AND ONLY ONCE
		$cart = array(
						"product" => array(),
						"last-update" => time(),
				);
		$cache->set("cart", $cart);
	}
	
	// GET JSON DATA FROM CACHE
	$json_cart = $cache->get("cart");
	
	echo json_encode($json_cart);
	
	$lastUpdate = $json_cart["last-update"];
	$productLength = count($json_cart["product"]);
?>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KEV-GARAGE</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/kesv%20kecil.png">

        <link rel="stylesheet" type="text/css" href="css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/full-slider.css">
        <link rel="stylesheet" type="text/css" href="css/hover.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- owl carousel showcase -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
        
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
					<!--<div class="wrapper">-->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand img-responsive" href="index.php">
                            <img src="img/kesv%20kecil.png" id="logo-resize">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="custom-navbar">
                    
                   <ul class="nav navbar-nav navbar-right">
                       <!-- Search -->
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Find The Best Item Just for You">SHOP <b class="caret"></b></a>
                        <ul class="dropdown-menu wow fadeIn animated" data-wow-duration="0.5s" style="background-color: #333">
                           
                            <li class="dropdownsheader" style="padding-left:20px; color: #fff;">
                                MOTORSPORT
                            </li>
                            <li class="dropdowns">
                                <a href="showcase_item.php?idCategory=1&nameProduct=" style="color: #fff;">Engine</a>
                            </li>
                            <li class="dropdowns">
                                <a href="showcase_item.php?idCategory=2&nameProduct=" style="color: #fff;">Handling</a>
                            </li>
                            <li class="dropdowns">
                                <a href="showcase_item.php?idCategory=3&nameProduct=" style="color: #fff;">Accessories</a>
                            </li>
                            <li class="dropdowns">
                                <a href="showcase_item.php?idCategory=4&nameProduct=" style="color: #fff;">Rims</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdownsheader" style="padding-left:20px; color: #fff;">
                                SERVICE
                            </li>
                            <li class="dropdowns">
                                <a href="service.php#fullbodysticker" style="color: #fff;">Full Body Sticker</a>
                            </li>
                            <li class="dropdowns">
                                <a href="service.php#turboinstalation" style="color: #fff;">Turbo Instalation</a>
                            </li>
                            <li class="dropdowns">
                                <a href="service.php#carconsultation" style="color: #fff;">Car Consultation</a>
                            </li>
                            <li class="divider"></li>
                             <li class="dropdownsheader">
                                <a href="showcase_item.php?idCategory=5&nameProduct=" style="color: #fff;">KIDS E-CARS</a>
                            </li>
                             <li class="dropdownsheader">
                                <a href="showcase_item.php?idCategory=6&nameProduct=" style="color: #fff;">CLOTHES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="showcase_item.php?idCategory=7&nameProduct=" title="One Person Junk is Another Person Treasure">USED</a>
                    </li>
                    <li>
                        <a href="/blog" title="Find Latest News and Info about Kevgarage's Event">BLOG</a>
                    </li>
                    <li class="dropdown">
                        <a href="about.php" class="dropdown-toggle" data-toggle="dropdown" title="FAQ and Other Information">ABOUT <b class="caret"></b></a>
                        <ul class="dropdown-menu wow fadeIn animated" data-wow-duration="0.5s" style="background-color: #333;">

                            <li class="dropdownsheader">
                                <a href="about.php#contact" style="color: #fff;">CONTACT</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="about.php#faq" style="color: #fff;">FAQ</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="about.php#termcondition" style="color: #fff;">TERMS &amp; CONDITION</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="about.php#storepolicy" style="color: #fff;">STORE POLICY</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="about.php#shippingdelivery" style="color: #fff;">SHIPPING &amp; DELIVERY</a>
                            </li>
                        </ul>
                    </li>
                       <!-- Cart -->
                    <li>
					<?php 
						if($productLength==0){
					?>
						<a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 20px;"></span><span class="badge"><?php echo $productLength;?></span></a>                      
						<?php } if($productLength!=0){  ?>
						<a href="cart.php" title="Your Shopping Cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 20px;"></span><span class="badge"><?php echo $productLength;?></span></a>
					<?php }?>
                    </li>
                       <li>
                            <form id="search_box" name="search_box" class="navbar-form" role="search" method="GET" action="showcase_item.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="nameProduct">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit" style="background-color: #222"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                       </li>
                </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>

            <!-- /.container -->
        </nav>
        
        <div class="container-fluid" style="margin-top: 110px">
            
            <!-- Product -->
            <div class="container">
                <div class="row">
                    <div class="row col-md-8 col-md-offset-2 panel panel-default" style="margin-bottom: 15px; color:#eee;">
                        
                        <div class="row">                            
                            <div class="col-md-11 panel panel-default" style="margin:15px 0px 0px 30px; height:auto">
							<!-- DISINI STRUKNYA -->
							<tr>
								<div class="col-md-5">
									<td>Item</td>
								</div>
								<div class="col-md-5">
									<td>Keterangan</td>
								</div>
								<div class="col-md-2">
									<td>Harga</td>
								</div>
							</tr>
							<?php
								$totalHarga = 0;
								for($i=0;$i<count($json_cart["product"]);$i++) {
									$url = "http://www.kevgarage.com/kevgarage/index.php?r=api/ProductDetail&idProduct=".$json_cart["product"][$i]["idProduct"];
									$json_get = json_decode(file_get_contents($url));
									?>
									
									<div class="col-md-5">
										<td><?php echo $json_get->nameProduct;?> (<?php echo $json_cart["product"][$i]["qty"]?>)</td>
									</div>
									<div class="col-md-5">
										<td><?php echo $json_get->description;?></td>
									</div>
									<div class="col-md-2">
										<td>IDR <?php echo $json_get->price; $totalHarga += $json_get->price * $json_cart["product"][$i]["qty"];?></td>
									</div>
									<?php
								} 
							?>
                              
                            </div>
							
							<div class="row">
								<span class="pull-right" style="margin:10px 60px 0px 0px">Total Harga: IDR<?php echo $totalHarga?></span>
							</div>
                        </div>
						<form action="api/checkout.php" method="post">
							<div class="order-delivery" style="margin-left: 55px">
								<div class="form-group">
								  <label for="fname" name="name">Name: <?php echo $_POST['fname']." ".$_POST['lname']; ?></label>
								  <input name="name" type="hidden" value="<?php echo $_POST['fname']." ".$_POST['lname'];?>" >
								</div>
								
								<div class="form-group">
								  <label for="email" name="email">email: <?php echo $_POST['email']; ?></label>
								  <input name="email" type="hidden" value="<?php echo $_POST['email'];?>" >								  
								</div>
								
								<div class="form-group">
								  <label for="nohp" name="noHp">No HP: <?php echo $_POST['noHp']; ?></label>
								  <input name="noHp" type="hidden" value="<?php echo $_POST['noHp'];?>" >
								</div>
								
								<div class="form-group">
								  <label for="noTlp" name="noTlp">No Telepon: <?php echo $_POST['noTlp']; ?></label>
								  <input name="noTlp" type="hidden" value="<?php echo $_POST['noTlp'];?>" >
								</div>
								
								<div class="form-group">
								  <label for="address" name="address">Address: <?php echo $_POST['address']; ?></label>
								  <input name="address" type="hidden" value="<?php echo $_POST['address'];?>" >
								</div>
								
								<div class="form-group">
								  <label for="city" name="city">City: <?php echo $_POST['city']; ?></label>
								  <input name="city" type="hidden" value="<?php echo $_POST['city'];?>" >
								</div>
								
								<div class="form-group">
								  <label for="postalcode" name="postalCode">Postal Code: <?php echo $_POST['postalCode']; ?></label>
								  <input name="postalCode" type="hidden" value="<?php echo $_POST['postalCode'];?>" >
								</div>
								
								<div class="form-group">
								<?php
									date_default_timezone_set("Asia/Jakarta"); 
								?>
								  <input value="<?php echo $a= date("D j M Y "); echo $a= date("H:i:s");?>" name="datetime" type="hidden">							  
								</div>
								
								<div class="form-group">
								  <input name="jsonall" type="hidden" value="
								  <?php 
									$json_cart = $cache->get("cart");
									echo json_encode($json_cart);
									?>" >							  
								</div>
							</div>
							
							<div class="checkbox" style="margin-left: 20px">
							  <label style="color:#fff;"><input type="checkbox" value="">I confirm that I have read, understood and agree to the <a href="#">terms & conditions</a></label>
							</div>
							<div class="row" style="margin: 2px 35px 15px;">
							   <button type="submit" class="btn btn-default pull-right" style="margin-left: 5px;">Checkout</button>
							</div>
						</form>
                    </div>
                    
                </div>
                
               
            </div>
        </div>
        
        <!-- footer -->
        
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-4 col-centered ">
                        <h4>
                            <span style="font-size: 28px; color: #666;">	
                            Follow
                            </span>
                        </h4>
                        <div class="follow-icons">
                            <a href="http://www.twitter.com" class="twitter-follow-icons">
                                <img src="img/button/twitterfooterlogo.png">
                            </a>
                        </div>
                        <div class="follow-icons">
                            <a href="http://www.facebook.com" class="facebook-follow-icons">
                                <img src="img/button/facebookfooterlogo.png">
                            </a>
                        </div>
                        <div class="follow-icons">
                            <a href="http://www.path.com" class="path-follow-icons">
                                <img src="img/button/pathfooterlogo.png">
                            </a>
                        </div>
                        <div class="follow-icons">
                            <a href="http://www.instagram.com" class="instagram-follow-icons">
                                <img src="img/button/instagramfooterlogo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4 col-centered sitemap-copy">
                        <div class="about-copy">
                            <ul>
                                 <li><a href="/blog">BLOG</a></li>
                                 <li><a href="about.php#faq">FAQ</a></li>
                                 <li><a href="about.php#termcondition">TERMS &amp; CONDITIONS</a></li>
                                 <li><a href="about.php#contact">CONTACT US</a></li>
                                 <li><a href="about.php#storepolicy">STORE POLICY</a></li>
                                 <li><a href="about.php#shippingdelivery">SHIPPING &amp; DELIVERY</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 copyright col-centered">
                        <p>
                            2015 © <a href="index.html">KevGarage</a> by <a href="http://www.zonadolan.com">
                             <img src="img/aaaaasd.png" class="logosuperkecil"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->

        
        
        <!-- Full page search -->
        <div id="search">
            <button type="button" class="close" style="margin-top: 100px;">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/vendor/bootstrap.js"></script>
		<script src="js/vendor/jquery.easing.min.js"></script>
		<script src="js/vendor/wow.js"></script>
        <!-- owl carousel js -->
		<script src="js/vendor/owl.carousel.js"></script>
        <!-- elevate zoom -->
        <script src="js/vendor/jquery.elevateZoom-3.0.8.min.js"></script>
        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
        
        <!-- Script to Activate wow.js -->
        <script>
            new WOW().init();
        </script>
        
        <!-- Script for elevate zoom -->
        <script>
            //initiate the plugin and pass the id of the div containing gallery images 
            $("#product_image").elevateZoom({
                zoomType: "inner",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750,
                gallery:'product_gallery', 
                cursor: 'crosshair', 
                galleryActiveClass: 'active', 
                imageCrossfade: true, 
                lensFadeIn: 500, 
                loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'}); 
            //pass the images to Fancybox 
            $("#product_image").bind("click", function(e) { 
                var ez = $('#product_image').data('elevateZoom');	
            $.fancybox(ez.getGalleryList()); return false; });
        </script>
        
        <!-- Script to Activate owl carousel -->
        <script>
            $(document).ready(function() {
 
              $("#related-product").owlCarousel({

                  autoPlay: 3000, //Set AutoPlay to 3 seconds

                  items : 5,
                  stagePadding : 50,
                  loop : true,
                  dots : false,
                  nav : false,
                  itemsDesktop : [1199,3],
                  itemsDesktopSmall : [979,3]
                  

              });

            });
        </script>
        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>

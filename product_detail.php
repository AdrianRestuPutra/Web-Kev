<!doctype html>

<?php 
	// CACHE TEMPLATE
	require_once("phpFastCache/phpfastcache.php");
	
	$cache = phpFastCache();
	if ($cache->get("cart") == null) {
		// DOING INITIALIZE CACHE
		// THIS SHOULD BE CALLED ONCE AND ONLY ONCE
		$cart = array(
						"product" => array(),
						"last-update" => time(),
				);
		$cache->set("cart", $cart, 100);
	}
	
	// GET JSON DATA FROM CACHE
	$json_cart = $cache->get("cart");
	
	echo json_encode($json_cart);
	
	$lastUpdate = $json_cart["last-update"];
	$productLength = count($json_cart["product"]);
?>

<?php
	// API TEMPLATE PRODUCT
	$url = "http://192.168.1.108/kevgarage/index.php?r=api/ProductDetail&idProduct=";
	
	$idProduct = 0;
	$nameProduct = "";
	$idCategory = 0;
	$stock = 0;
	$price = 0;
	$imageName1 = "";
	$imageName2 = "";
	$imageName3 = "";
	$imageName4 = "";
	$description = "";
	$descriptionList = "";
	
	
	if (isset($_GET["idProduct"]) || $_POST["idProduct"]) {
		if (isset($_GET["idProduct"])) 
			$idProduct = $_GET["idProduct"];
		else $idProduct = $_POST["idProduct"];
		$json_get = json_decode(file_get_contents($url.$idProduct));
		
		$json = $json_get;
		echo json_encode($json);
		
		$nameProduct = $json->nameProduct;
		$idCategory = $json->idCategory;
		$stock = $json->stock;
		$price = $json->price;
		$imageName1 = $json->imageName1;
		$imageName2 = $json->imageName2;
		$imageName3 = $json->imageName3;
		$imageName4 = $json->imageName4;
		$description = $json->description;
		$descriptionList = $json->descriptionList;
	}
?>

<?php 
	// ADD TO CART TEMPLATE
	if (isset($_POST["qty"])) {
		$qty = $_POST["qty"];
		
		$json_cart["product"][$productLength] = array(
														"idProduct" => $_POST["idProduct"],
														"qty" => $qty,
													);
		
		$productLength++;
		
		$cache->set("cart", $json_cart, 100);
	}
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
                    <a class="navbar-brand img-responsive" href="#">
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
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">FEATURED</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">MOST POPULAR</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">MOST RECENT</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">MOTORSPORT</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Engine</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Handling</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Accessories</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Rims</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">SERVICE</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Full Body Sticker</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Turbo Instalation</a>
                            </li>
                            <li class="dropdowns">
                                <a href="#" style="color: #fff;">Car Consultation</a>
                            </li>
                            <li class="divider"></li>
                             <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">KIDS E-CARS</a>
                            </li>
                             <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">CLOTHES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="One Person Junk is Another Person Treasure">USED</a>
                    </li>
                    <li>
                        <a href="#" title="Find Latest News and Info about Kevgarage's Event">BLOG</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="FAQ and Other Information">ABOUT <b class="caret"></b></a>
                        <ul class="dropdown-menu wow fadeIn animated" data-wow-duration="0.5s" style="background-color: #333;">

                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">CONTACT</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">FAQ</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">TERMS &amp; CONDITION</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">STORE POLICY</a>
                            </li>
                            <li class="dropdownsheader">
                                <a href="#" style="color: #fff;">SHIPPING &amp; DELIVERY</a>
                            </li>
                        </ul>
                    </li>
                       <!-- Cart -->
                    <li>
                        <a href="cart.php" title="Your Shopping Cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 20px;"></span><span class="badge"><?php echo $productLength;?></span></a>

                    </li>
                       <li>
                            <form id="search_box" name="search_box" class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
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
                    <div class="col-md-5">
                        <img id="product_image" src="img/small/image1.png" data-zoom-image="img/large/image1.jpg"/> 
                        <div id="product_gallery"> 
                            <a href="#" data-image="img/small/image1.png" data-zoom-image="img/large/image1.jpg"> 
                                <img id="product_image" src="img/thumb/image1.jpg" /> 
                            </a> 
                            <a href="#" data-image="img/small/image2.png" data-zoom-image="img/large/image2.jpg"> 
                                <img id="product_image" src="img/thumb/image2.jpg" /> 
                            </a> 
                            <a href="#" data-image="img/small/image3.png" data-zoom-image="img/large/image3.jpg"> 
                                <img id="product_image" src="img/thumb/image3.jpg" /> 
                            </a>
                            <a href="#" data-image="img/small/image4.png" data-zoom-image="img/large/image4.jpg"> 
                                <img id="product_image" src="img/thumb/image4.jpg" /> 
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="container-fluid">
                            <!-- Product Name -->
                            <div class="row">
                                <h1><?php echo $nameProduct?></h1>
                            </div>
                            
                            <!-- product desc -->
                            <div class="row product-desc">
                                <p><?php echo $description?></p>
                            </div>
                            <!-- Description List -->
                            <div class="row product-description-list">
                                <h3>Description List</h3>
                                <ul>
                                    <li>desc 1</li>
                                    <li>desc 1</li>
                                    <li>desc 1</li>
                                </ul>
                            </div>
                             <div class="row prices">
                                <h3>PRICE :</h3>
                                 <p>IDR <?php echo $price?></p>

                            </div>
                            
                            <!-- product price and buy button -->
                            <div class="row" style="margin-top: 10px;">
                                <form method="POST" action="product_detail.php">
                                    <div class="col-md-4 quantity-product">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Quantity</span>
                                            <input type="number" class="form-control" min="<?php if ($stock == 0) echo 0; else echo 1;?>" max="<?php echo $stock?>" value="1" style="width: 50px" name="qty">
											<input value="<?php echo $idProduct?>" name="idProduct" type="hidden">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Add To Cart" class="btn btn-success btn-md"/>
                                    </div>
                                </form>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            <!-- Product -->
                
                <!-- Related Product -->
                <div class="row" style="margin-top: 20px;">
                    <h3>Related Product</h3>
                    <div id="related-product" class="owl-carousel owl-theme">
                        <!-- Gambar yg dimasukkan ukuran 300x250 -->
                      <div class="item">
                          <div class="smaller-thumbnail">
                                <img src="img/banner/engine-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                        <div class="item">
                            <div class="smaller-thumbnail">
                                <img src="img/banner/engine-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                      <div class="item"> 
                          <div class="smaller-thumbnail">
                                <img src="img/banner/handling-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                        <div class="item"> 
                          <div class="smaller-thumbnail">
                                <img src="img/banner/handling-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                           <div class="item"> 
                          <div class="smaller-thumbnail">
                                <img src="img/banner/handling-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                           <div class="item"> 
                          <div class="smaller-thumbnail">
                                <img src="img/banner/handling-sq-banner.png" />
                            </div>
                            <div class="details">
                                Nama
                            </div>
                            <div class="price">
                                Harga
                            </div>
                        </div>
                      <div class="item"><h1>5</h1></div>
                      <div class="item"><h1>6</h1></div>
                      <div class="item"><h1>7</h1></div>
                      <div class="item"><h1>8</h1></div>
                      <div class="item"><h1>9</h1></div>
                      <div class="item"><h1>10</h1></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- showcase -->
        <div class="push"></div>
        <!--</div>-->
        
        
<!--footer
        <footer>-->
        
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
                                 <li><a href="#">BLOG</a></li>
                                 <li><a href="#">FAQ</a></li>
                                 <li><a href="#">TERMS &amp; CONDITIONS</a></li>
                                 <li><a href="#">CONTACT US</a></li>
                                 <li><a href="#">STORE POLICY</a></li>
                                 <li><a href="#">SHIPPING &amp; DELIVERY</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 copyright col-centered">
                        <p>
                            2015 © <a href="index.html">KevGarage</a> by <a href="http://www.zonadolan.com">
                            <img src="img/button/facebookfooterlogo.png" class="logosuperkecil"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!--</footer>-->        <!--</footer>-->

        
        
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

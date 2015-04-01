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
		$cache->set("cart", $cart);
	}
	
	// GET JSON DATA FROM CACHE
	$json_cart = $cache->get("cart");
	
	echo json_encode($json_cart);
	
	$lastUpdate = $json_cart["last-update"];
	$productLength = count($json_cart["product"]);
?>

<?php
	// API TEMPLATE PRODUCT
	$url = "http://localhost/kevgarage/index.php?r=api/SortNewest";
	
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
	
	
	$json_get = json_decode(file_get_contents($url));
?>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KEV-GARAGE</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=640px, initial-scale=.5, maximum-scale=.5" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
        
        <!--font-->
        <link rel="stylesheet" type="text/css" href=""/>
        
        
        
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
                        <a href="#" title="Find Latest News and Info about Kevgarage's Event">BLOG</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="FAQ and Other Information">ABOUT <b class="caret"></b></a>
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

        <!-- Full Page Image Background Carousel Header -->
        <div class="container-fluid" style="height: 100%;">
            <div id="myCarousel" class="row carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill">
                            <img src="img/slider/opening%20banner.png" class="img-responsive" />
                        </div>
                        <div class="carousel-caption">
                            <h2>GRAND OPENING</h2>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        <div class="fill">
                            <img src="img/slider/1426879195013.jpg" class="img-responsive" />
                        </div>
                        <div class="carousel-caption">
                            <h2>KIDS ELECTRICAL CARS</h2>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Set the third background image using inline CSS below. -->
                        <div class="fill">
                            <img src="img/slider/1427912076754.jpg" class="img-responsive" />
                        </div>
                        <div class="carousel-caption">
                            <h2>CAR CONCEPTS &amp; FULL BODY STICKERS</h2>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>

            </div>
        </div>
        
        
        <!-- product -->
        <div class="container-fluid">
            
            <main class="container" role="main">
                <section class="home-three-banner">
                  <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                    <div class="col-xs-4 wow fadeInUp animated" style="visibility: visible" data-wow-delay="100ms">
                        <a href="http://localhost/web-kev/showcase_item.php?idCategory=1&nameProduct=" title="">
                            <img id="product-item" src="img/banner/engine-sq-banner.png" class="img-responsive" alt="" />
                            <!-- Caption -->
                            <h4>
                                <span id="product-caption">	
                                    New Performance
                                </span>
                            </h4>

                        </a>
                    </div>
                    <div class="col-xs-4 wow fadeInUp animated" data-wow-delay="300ms">
                        <a href="http://localhost/web-kev/showcase_item.php?idCategory=2&nameProduct=" title="">
                            <img id="product-item" src="img/banner/handling-sq-banner.png" class="img-responsive" alt="" />
                            <!-- Caption -->
                            <h4>
                                <span id="product-caption">	
                                    Handling Support
                                </span>
                            </h4>

                        </a>
                    </div>
                    <div class="col-xs-4 wow fadeInUp animated" data-wow-delay="500ms">
                        <a href="http://localhost/web-kev/showcase_item.php?idCategory=5&nameProduct=" title="">
                            <img id="product-item" src="img/banner/kids-sq-banner.png" class="img-responsive" alt="" />
                            <!-- Caption -->
                            <h4>
                                <span id="product-caption">	
                                    Kids Electrical cars
                                </span>
                            </h4>

                        </a>
                    </div>
                  </div>
                </section>
                
            </main>
        </div>
            <!-- showcase -->
            <div class="row wow fadeInUp animated" style="padding-left: 35px; padding-right: 35px;">
                <div class="showcase-part"><h2>Featured Products</h2></div>
                <div class="container">
                    <div class="row row-centered product-showcase" style="margin-right: auto; margin-left: auto; ">
						<?php $fitur = "http://localhost/kevgarage/index.php?r=api/FeatureProduct";
	
							$idFiture=1;
							$featureArray = array();	
							$json_get_feature = json_decode(file_get_contents($fitur));
							$featureArray[0] = $json_get_feature->idProduct1;
							$featureArray[1] = $json_get_feature->idProduct2;
							$featureArray[2] = $json_get_feature->idProduct3;
							$featureArray[3] = $json_get_feature->idProduct4;
							$featureArray[4] = $json_get_feature->idProduct5;
							
							for($i=0;$i<5;$i++) {
								$json_get_feature_object = json_decode(file_get_contents("http://localhost/kevgarage/index.php?r=api/ProductDetail&idProduct=".$featureArray[$i]));
								//echo json_encode($json_get_feature_object);
						?>
							<a href="product_detail.php?idProduct=<?php echo $json_get_feature_object->idProduct?>">
								<div class="col-md-2 item">
									<div class="thumbnail">
										<img src="<?php echo 'http://localhost/kevgarage/images/products/'.$json_get_feature_object->imageName1;?>" />
									</div>
									
									<div class="detail">
										<?php echo $json_get_feature_object->nameProduct;?>
									</div>
									
									<div class="harga">
										<?php echo $json_get_feature_object->price;?>
									</div>
								</div>
							</a>						
						<?php }?>
                    </div>
                </div>
            </div>
            <!-- showcase -->
        
          <!-- showcase -->
            <div class="row wow fadeInUp animated" style="padding-left: 35px; padding-right: 35px;">
                <div class="showcase-part"><h2>Latest Products</h2></div>
                <div class="container">
                    <div class="row row-centered product-showcase" style="margin-right: auto; margin-left: auto; ">
						<!-- BEGIN -->
						<?php 
							for($i=0;$i<5;$i++) {
								$json = $json_get[$i];
								//echo json_encode($json);
								
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
						?>
							<a href="product_detail.php?idProduct=<?php echo $json->idProduct?>">
								<div class="col-md-2 item">
									<div class="thumbnail">
										<img src="<?php echo 'http://localhost/kevgarage/images/products/'.$imageName1;?>" />
									</div>
									
									<div class="detail">
										<?php echo $nameProduct;?>
									</div>
									
									<div class="harga">
										<?php echo $price;?>
									</div>
								</div>
							</a>
						<?php }?>
                        <!--END-->
                    </div>
                    <!--
                    <div class="product-showcase">
                        <div class="item" >
                            <div class="img">
                                <img src="img/kesv%20kecil.png" class="img-responsive"/>
                            </div>
                            <div class="detail">
                                <h4>Jam Tangan</h4>
                            </div>
                        </div>
                        <div class="item" ></div>
                        <div class="item" ></div>
                        <div class="item" ></div>
                        <div class="item" ></div>
                    </div>-->
                </div>
            </div>
            <!-- showcase -->
        <!-- product -->
        
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

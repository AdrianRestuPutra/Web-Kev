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
	$url = "http://www.kevgarage.com/kevgarage/index.php?r=api/SearchShowcase&nameProduct=";
	$nameProduct = "";
	if (isset($_GET["nameProduct"])) $nameProduct = $_GET["nameProduct"];
	$typeSort = "";
	if (isset($_GET["typeSort"])) $typeSort = $_GET["typeSort"];
	$offset = 0;
	if (isset($_GET['offset'])) $offset = $_GET['offset'];
	$_idCategory = -1;
	if (isset($_GET['idCategory'])) $_idCategory = $_GET['idCategory'];
	
	if ($typeSort) {
		if ($typeSort == "SortCheap")
			$url = "http://www.kevgarage.com/kevgarage/index.php?r=api/SortPriceCheap&nameProduct=";
		else if ($typeSort == "SortExpensive")
			$url = "http://www.kevgarage.com/kevgarage/index.php?r=api/SortPriceExpensive&nameProduct=";
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
            
            <!-- Banner menu -->
            <div class="row">
			<?php
				if($_idCategory==1){
			?>
                <img src="img/banner/overhaul%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==2){?>
                <img src="img/banner/shock%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==3){?>
                <img src="img/banner/acc%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==4){?>
                <img src="img/banner/rims%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==5){?>
				<img src="img/banner/kidscar%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==6){?>
				<img src="img/banner/turbo%20banner2.jpg" class="img-responsive banner" />
				<?php } else if($_idCategory==7){?>
				<img src="img/banner/used%20banner2.jpg" class="img-responsive banner" />
				<?php } ?>
            </div>
            <!-- Banner menu -->
            
            <!-- showcase -->
            <div class="row wow fadeInUp animated" style="padding-left: 35px; padding-right: 35px;">
                <div class="row" style="margin-bottom: 30px; padding-bottom : 15px;">
                    <!-- sort 1 -->
                    <div class="btn-group sort-menu">
                      <button type="button" class="btn btn-default">Sort by</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu wow fadeIn animated" role="menu">
                        <li><a href="showcase_item.php?nameProduct=<?php echo $nameProduct;?>&typeSort=SortCheap&offset=<?php echo $offset;?>&idCategory=<?php echo $_idCategory;?>">Price Cheap</a></li>
                        <li><a href="showcase_item.php?nameProduct=<?php echo $nameProduct;?>&typeSort=SortExpensive&offset=<?php echo $offset;?>&idCategory=<?php echo $_idCategory;?>">Price Expensive</a></li>
                      </ul>
                    </div>
                    
                    
                </div>
            </div>
            <!-- showcase -->                
		</div>
		
			<div class="container">
				<div class="row row-centered product-showcase" style="margin-right: auto; margin-left: auto; ">
					<!-- BARIS 1 -->
					<?php
						$offset = 20 * ((int)$offset - 1);
						$json_get = json_decode(file_get_contents($url.$nameProduct.'&limit=20&offset='.$offset.'&idCategory='.$_idCategory));
						for($i=0;$i<count($json_get);$i++) {
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
										<img src="<?php echo 'http://www.kevgarage.com/kevgarage/images/products/'.$imageName1;?>" />
									</div>
									
									<div class="detail">
										<?php echo $nameProduct;?>
									</div>
									
									<div class="harga">
										<?php echo $price;?>
									</div>
								</div>
							</a>
						<?php }
					?>
					<!-- END BARIS 1-->
				</div>
			</div>
            
        <div class="push"></div>
            <!-- pagination -->
            <div class="row" style="padding-left: 35px; padding-right: 35px; background-color: #ccc" >
                <nav class="navbar-right">
                  <ul class="pagination">
                    <li class="disabled"> <!-- nanti dynamic disablednya -->
                      <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
					<?php
						$json_get = json_decode(file_get_contents('http://www.kevgarage.com/kevgarage/index.php?r=api/Search&nameProduct='.$_GET["nameProduct"]));
						$paging = count($json_get) / 20 + 1;
						for($i=1;$i<=$paging;$i++) {
					?>
							<li><a href="showcase_item.php?nameProduct=<?php echo $_GET['nameProduct']?>&offset=<?php echo $i?>&typeSort=<?php $typeSort?>&idCategory=<?php echo $_idCategory;?>"><?php echo $i?></a></li>
					<?php }?>
                    <li>
                      <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
            <!-- pagination -->

        
        <!-- showcase -->
        <!--</div>-->
        
        
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
        
        <!-- Script to Activate owl carousel 
        <script>
            $(document).ready(function() {
 
              $(".product-showcase").owlCarousel({

                  autoPlay: 3000, //Set AutoPlay to 3 seconds

                  items : 5,
                  dots : false,
                  nav : false,
                  itemsDesktop : [1199,3],
                  itemsDesktopSmall : [979,3]
                  

              });

            });
        </script>-->
        
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
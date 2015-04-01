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
                        <ul class="dropdown-menu" style="background-color: #333">
                           
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
                        <ul class="dropdown-menu" style="background-color: #333;">

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
						<?php } else if ($productLength!=0){  ?>
						<a href="cart.php" title="Your Shopping Cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 20px;"></span><span class="badge"><?php echo $productLength;?></span></a>
					<?php }
					?>
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
        
		<div>
        <!-- Section Contact -->
        <section id="contact" class="section-about-odd">
            <div class="container">
                <div class="row">
                    <div class="contacts" style="padding: 0 10px 10px;">
                        <p style="font-weight : 900; font-size : 200%;">CONTACTS</p>
                        <p>If you have any questions or concerns, feel free to contact us.</p>
                        <p style="font-weight: 600;">KEV GARAGE</p>
<!--
                        <p style="color: #2cc; font-weight: 900;">Support@kevgarage.com</p>
                        <p style="font-weight: 600;">(021) 123-45678</p>
-->
                        <p style="font-weight: 600;">Monday-Saturday, 10.00-18.00 WIB</p>
                        <p>Perumahan Taman Aries Blok E8 no. 30, Jakarta Barat</p>
                        <img src="img/maps.png" width="100%" height="auto" style="margin-bottom:20px;">
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section FAQ -->
        <section id="faq" class="section-about-even">
            <div class="container">
                <div class="row">
                    <div class="faqs" style="padding: 0 10px 10px;">
                        <p style="font-weight : 900; font-size : 200%;">FAQ</p>
                        <ul>
                            <li><b><i>What is your store policy for returns and exchanges?</i></b>
                                ALL SALES ARE FINAL. Please see <a href="#storepolicy" style="color: #2ee;">here</a> for more information.  </li>          
                            <li><b><i>Do you accept orders placed outside of Indonesia?</i></b>
                                No. we are sorry that we currently can not accepting any purchase outside Indonesia. </li>
                            <li><b><i>Why didn't I receive a confirmation email?</i></b>
                                Your confirmation email may have been filtered into your spam/junk folder. Please check both your inbox                                   and spam/junk folder for that message. If you still cannot locate it, please contact us so that we can                                   resend your confirmation. </li>
                            <li><b><i>I have a question about my order / I have an issue with my order. What do I do?</i></b>
                                If you have any questions, concerns, or issues about your order please email the inquiry to <span style="color: #2ee;">support@kevgarage.com</span> with your <i>Order Confirmation Number</i>. We'll help you resolve everything! </li>
                            <li><b><i>Where are your store located?</i></b>
                                Perumahan Taman Aries Blok E8 no. 30, Jakarta Barat. </br> for more info, see <a href="#contact" style="color: #2ee;">here</a> </li>
                            <li><b><i>How can i ask other question that's not written here?</i></b>
                                You can send use e-mail the inquiry to <span style="color: #2ee;">support@kevgarage.com</span> with subject <i>"ASK:(your topics)"</i>. We'll reply to your question as soon as we can. </li>
                            <li><b><i>How can I get updates about product releases and events?</i></b>
                                Follow our Instagram, Twitter, Path, and Facebook for the latest info!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Terms & Condition -->
        <section id="termscondition" class="section-about-odd">
            <div class="container">
                <div class="row">
                    <div class="terms" style="padding: 0 10px 10px;">
                        <p style="font-weight : 900; font-size : 200%;">Terms &amp; Condition</p>
                        <p><b><i>Links</i></b></p>
                        <p>This site may contain links to other sites on the Internet that are owned and operated by third parties. You acknowledge that we’re not responsible for the operation of or content located on or through any such site.</p> 
                        <p><b><i>Order Acceptance Policy</i></b></p>
                        <p>Your receipt of an electronic or other form of order confirmation does not signify our acceptance of your order, nor does it constitute confirmation of our offer to sell. Kevgarage.com reserves the right at any time after receipt of your order to accept or decline your order for any reason or to supply less than the quantity you ordered of any item.</p> 
                        <p><b><i>Other Conditions</i></b></p>
                        <p>These Conditions will supersede any terms and/or conditions you include with any purchase order, regardless of whether Kevgarage.com signs them or not. We reserve the right to make changes to this site and these Conditions at any time.</p>
                    </div>
                </div>
            </div>
        </section>
            
        <!-- Section Store Policy -->
        <section id="storepolicy" class="section-about-even">
            <div class="container">
                <div class="row">
                    <div class="policies" style="padding: 0 10px 10px;">
                        <p style="font-weight : 900; font-size : 200%;">Store Policy</p>
                        <p style="font-weight : 600;"> ALL SALES ARE FINAL. NO RETURN OR EXCHANGES.</p>
                        <p>Returns/Exchanges are only acceptable for any of these occurrences.</p>
                        <ul>
                            <li>Received incorrect or defective item(s)</li>
                            <li>Did not receive ordered item(s).</li>                            
                        </ul>
                        <p>You must contact us within 10 days of delivery date.</p>
                        <p>All returns/exchanges are subject to approval.</p>
                        <p>If you have any questions or concerns, feel free to contact us.</p>
                        <p style="font-weight: 600;">KEV GARAGE</p>
                        <p style="color: #2cc; font-weight: 900;">Support@kevgarage.com</p>
<!--                        <p style="font-weight: 600;">(021) 123-45678</p>-->
                        <p style="font-weight: 600;">Monday-Saturday, 10.00-18.00 WIB</p>

                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Shipping Delivery -->
        <section id="shippingdelivery" class="section-about-odd">
            <div class="container">
                <div class="row">
                    <div class="ships" style="padding: 0 10px 10px;">
                         <p style="font-weight : 900; font-size : 200%;">Shipping &amp; Delivery</p>
                         <p>This section will be updated later.</p>
                         <p>For more info regarding shipping and delivery,</p>
                         <p>please <a href="#contact" style="color: #2ee;">contact us</a>.</p>

                    </div>
                </div>
            </div>
        </section>
        </div>
		
        <div class="push" style="background-color: #444"></div>
        
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

        <!-- footer -->

		
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/vendor/bootstrap.js"></script>
		<script src="js/vendor/jquery.easing.min.js"></script>
		<script src="js/vendor/wow.js"></script>
        <!-- owl carousel js -->
		<script src="js/vendor/owl.carousel.js"></script>
        <!-- mouse scroll -->
        <script src="js/vendor/mousescroll.js"></script>
        <script src="js/vendor/smoothscroll.js"></script>
        
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
        
        <!-- Script to handle scroll -->
        <script>
            // Navigation Scroll
            $(window).scroll(function(event) {
                Scroll();
            });

            $('.navbar-collapse ul li a').on('click', function() {  
                $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
                return false;
            });

            // User define function
            function Scroll() {
                var contentTop      =   [];
                var contentBottom   =   [];
                var winTop      =   $(window).scrollTop();
                var rangeTop    =   200;
                var rangeBottom =   500;
                $('.navbar-collapse').find('.scroll a').each(function(){
                    contentTop.push( $( $(this).attr('href') ).offset().top);
                    contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
                })
                $.each( contentTop, function(i){
                    if ( winTop > contentTop[i] - rangeTop ){
                        $('.navbar-collapse li.scroll')
                        .removeClass('active')
                        .eq(i).addClass('active');			
                    }
                })
            };

            $('#tohash').on('click', function(){
                $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
                return false;
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

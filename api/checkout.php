<?php
	require_once("../phpFastCache/phpfastcache.php");
	
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
	
	//echo json_encode($json_cart);
	
	$cache = phpFastCache();
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$noHp = $_POST['noHp'];
	$noTlp = $_POST['noTlp'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$postalCode = $_POST['postalCode'];
	$datetime = $_POST['datetime'];
	$jsonall = $_POST['jsonall'];
	
	$url ="http://localhost/kevgarage/index.php?r=api/OrderForm&idTransaction=".$datetime."&name=".$name."&address=".$address."&email=".$email."&noHp=".$noHp."&city=".$city."&noTlp=".$noTlp."&postalCode=".$postalCode."&jsonall=".json_encode($json_cart)."&datetime=".$datetime;
	//str_replace(' ', '%20', $url);
	
	/*$postdata = http_build_query(
		array(
			'idTransaction' => $datetime,
			'name' => $name,
			'address' => $address,
			'email' => $email,
			'noHp' => $noHp,
			'city' => $city,
			'noTlp' => $noTlp,
			'postalCode' => $postalCode,
			'jsonall' => json_encode($json_cart),
			'datetime' => $datetime,
		)
	);

	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);

	$context  = stream_context_create($opts);

	$result = file_get_contents('http://localhost/kevgarage/index.php?r=api/FeatureProduct', false, $context);
	echo $result;
	$idTransaction = "";
	$name = "";
	$address = "";
	$email = "";
	$noHp = 0;
	$city = "";
	$noTlp = 0;
	$postalCode = 0;
	$jasonall = "";
	$datetime = "";*/
	
	
	$json_get = file_get_contents(str_replace(' ', '%20', $url));
	
	// Delete from cache
	$cache->delete("cart");

	// Clean up all cache
	$cache->clean();
	
	header("Location:../index.php");
	//echo $json_get;
?>
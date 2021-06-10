<?php
session_start();
include_once("config.php");


if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); 
	session_destroy();
	header('Location:'.$return_url);
}

if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$Product_ID 	= filter_var($_POST["Product_ID"], FILTER_SANITIZE_STRING); 
	$product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); 
	$return_url 	= base64_decode($_POST["return_url"]); 
	
	
	$results = $mysqli->query("SELECT productName,Price FROM product WHERE Product_ID ='$Product_ID' LIMIT 1");
	$obj = $results->fetch_object();
	
	if ($results) { 
		
		$new_product = array(array('name'=>$obj->productName, 'code'=>$Product_ID , 'TiradaProductTiga'=>$product_qty, 'Qiimaha'=>$obj->Price));
		
		if(isset($_SESSION["cart_session"])) 
		{
			$found = false; 
			
			foreach ($_SESSION["cart_session"] as $cart_itm) 
			{
				if($cart_itm["code"] == $Product_ID){ 

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'TiradaProductTiga'=>$product_qty, 'Qiimaha'=>$cart_itm["Qiimaha"]);
					$found = true;
				}else{

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'TiradaProductTiga'=>$cart_itm["TiradaProductTiga"], 'Qiimaha'=>$cart_itm["Qiimaha"]);
				}
			}
			
			if($found == false) 
			{
				$_SESSION["cart_session"] = array_merge($product, $new_product);
			}else{
				$_SESSION["cart_session"] = $product;
			}
			
		}else{
			$_SESSION["cart_session"] = $new_product;
		}
		
	}
	
	header('Location:'.$return_url);
}

if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["cart_session"]))
{
	$Product_ID 	= $_GET["removep"]; 
	$return_url 	= base64_decode($_GET["return_url"]); 

	
	foreach ($_SESSION["cart_session"] as $cart_itm) 
	{
		if($cart_itm["code"]!=$Product_ID){ 
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'TiradaProductTiga'=>$cart_itm["TiradaProductTiga"], 'Qiimaha'=>$cart_itm["Qiimaha"]);
		}
		
		$_SESSION["cart_session"] = $product;
	}
	
	header('Location:'.$return_url);
}
?>
<?php
include("config.php");
include("usersession.php");

$category_id = isset($_REQUEST['categoryId']) ? $_REQUEST['categoryId'] : 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

	<title>The Coders Online Grocery System</title>
	<link rel="shortcut icon" href="images/logo.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" /> 

	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/main.js" type="text/javascript"></script>

</head>
<body>

<?php
    include ("./header.php")
    	?>

	<div class="shopping-cart"  id="cart" id="right" >
		<dl id="acc">	
			<dt class="active">								
				<p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			</dt>
		<dd class="active" style="display: block;">
		
<?php

	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cartUpdate.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:orange" ><i>Total: RM </i> <big style="color:orange" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cartUpdate.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <br><br><h4 style="color:grey" align="center" >Shopping Car is empty</h4>';
}
?>

</dd>
</dl>
</div>
</div>

 <div class="clear"></div>
			</div>
		</div>
		
		<div id="slider">
			<div class="shell">
				<ul class="slider-items">
					<li>
						<img src="images/h1.png" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/onlineshop.png" alt="Slide Image" />
						<div class="slide-entry">

							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/h3.png" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
							<li>
						<img src="images/h2.png" alt="Slide Image" />
						<div class="slide-entry">

							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/h23.jpg" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s6.jpg" alt="Slide Image" />
						<div class="slide-entry"> 
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>

				</ul>
				<div class="cl">&nbsp;</div>
				<div class="slider-nav">
					
				</div>
			</div>
		</div>

		<div id="main" class="shell">
			<div id="content">
				
			</div>
			<div class="cl">&nbsp;</div>>
			
				<div id="products">
				<h2>Featured Products</h2>

	      <div class="section group">
		  
		  <?php

	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="grid_1_of_4 images_1_of_4">'; 
            echo '<form method="post" action="cartUpdate.php">';
			echo '<div class="product-thumb" ><img src="images/'.$obj->Picture.'"></div>';
            echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
            echo '<div class="product-desc">'.$obj->Description.'</div>';
            echo '<div class="product-info">';
			echo '<p><span class="price"> Price: RM <big style="color:orange">'.$currency.$obj->Price.'</big></span></p>';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button"  class="add_to_cart">Add to Cart</button></span> </div>';
			echo '</div></div>';
            echo '<input type="hidden" name="Product_ID" value="'.$obj->Product_ID.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
	<div class="cl">&nbsp;</div>
</div>
			

<div id="product-slider">
	<h2>Best Products</h2>
		<ul>	
		  	<?php
			$result=mysqli_query($mysqli,"select * from product") or die (mysqli_error());
			while($row=mysqli_fetch_array($result)){
			?>
				<li>
					<a href="products.php" title="Product Link"><img src="images/<?php echo $row['Picture']?>" alt="IMAGES" /></a>
						<div class="info">
							<h4><b><?php echo $row['productName']?></b></h4>
							<span class="number"><span>Price: <big style="color:orange">RM <?php echo $row['Price']?></big></span></span>
					
							<div class="cl">&nbsp;</div>	 
						</div>
				</li>
					 <?php } ?>
		</ul>
	<div class="cl">&nbsp;</div>
</div>
	
		</div>

		<?php
        include ("./footer.php")
    	?>

</body>
</html>
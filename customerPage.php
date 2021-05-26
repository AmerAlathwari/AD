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
						<img src="images/h2.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span>Fresh</span><span class="small"></span> &nbsp; Vegetable</h4>
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/h3.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span>Black Suit</span><span class="small"> </span>Fresh<span class="small"> Seafood</span></h3> 
					
						
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
							<li>
						<img src="images/s4.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span> Choose</span><span class="small"> Fresh</span>Fruits</h3> 
							
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s5.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span>Some Fruits</span><span class="small">&amp;</span><span>Fresh</span>Crops</h4>
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/s6.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span>Smart Dress</span><span class="small">of </span> Male And Females Suits</h3> 
					
							
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
				<div class="post">
						<h2>Welcome!</h2>
					<img src="images/logo.png" alt="Post Image" height="160" width="260"/>
					You can be confident when you're shopping online with SomStore. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                   such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted.. <a href="#" class="more" title="Read More">Read More</a></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>

			<div id="sidebar">
				<ul>
					<li class="widget">
						<h2>TOP Warehouse</h2>
						<div class="brands">
							<ul>
								<li><a href="warehouse_1.php" title="Brand 1"><img src="images/k.png" width="103" height="51" alt="Brand 1" /></a></li>
								<li><a href="warehouse_2.php" title="Brand 2"><img src="images/b.png" width="103" height="51" alt="Brand 2" /></a></li>
								<li><a href="warehouse_3.php" title="Brand 3"><img src="images/ab.png" width="103" height="51" alt="Brand 3" /></a></li>
								<li><a href="warehouse_4.php" title="Brand 4"><img src="images/33.png" width="103" height="51" alt="Brand 4" /></a></li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<a href="products.php" class="more" title="More Brands">All Products</a>
					</li>
				</ul>
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
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'"></div>';
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
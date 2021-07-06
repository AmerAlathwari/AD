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
	<link rel="stylesheet" href="css/category.css" type="text/css" media="all" />

	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/main.js" type="text/javascript"></script>

</head>
<style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1{
            color:#ccc;
            font-size:36px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }
    </style>
<body>

<?php
    include ("./header.php")
    	?>
		
		<div id="slider">
			<div class="shell">
				<ul class="slider-items">
					<li>
						<img src="images/1.png" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/2.png" alt="Slide Image" />
						<div class="slide-entry">

							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/3.png" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
							<li>
						<img src="images/4.png" alt="Slide Image" />
						<div class="slide-entry">

							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/5.png" alt="Slide Image" />
						<div class="slide-entry">
							<a href="products.php" class="button" title="Buy now"><span>Buy now</span></a>
						</div>
					</li>
					<li>
						<img src="images/6.png" alt="Slide Image" />
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
		<div class="cl">&nbsp;</div>
			<div id="category-page">
				<h2>Featured Products</h2>
					<div class="row mt-25">
					
							<?php
						$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
						
						$results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");

						if ($results) { 

							while($obj = $results->fetch_object())
							{
								echo '<div class="grid_1_of_4 images_1_of_4 col-3-3">'; 
								echo '<form method="post" action="cart_update.php">';
								echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'"></div>';
								echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
								echo '<div class="product-desc">'.$obj->Description.'</div>';
								echo '<div class="product-info">';
								echo '<p><span class="price"> Price:RM <big style="color:green">'.$currency.$obj->Price.'</big></span></p>';
								echo '<div>Qty <input type="text" name="product_qty" value="1" size="3" /></div>';
								echo '<div class="button"><span><img src="images/cart.jpg" /><button class="cart-button add_to_cart"></i>Add to Cart</button></span> </div>';
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
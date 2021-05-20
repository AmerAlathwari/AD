<?php
include("config.php");

$category_id = isset($_REQUEST['categoryId']) ? $_REQUEST['categoryId'] : 0;
?>

<!doctype html>

<html class="no-js" lang="">

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Coders Online Grocery System</title>
<link rel="shortcut icon" href="images/logo.png" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	 <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>

<body>

<section class="banner" role="banner">
  <header align="center">
    <div> <a class="logo" href="index.php"><img src="images/logo.png" alt="Home" width="80" height="80"></a>
		<h3>The Coders Online Grocery System</h3>
        <h4>Your No.1 Online Grocery Store</h4>
      </div>
  </header>
</section>

		<nav class="navigation" role="navigation">
			<ul class="primary-nav">
			  <li><a align="center" href="registerPage.php">Register</a></li>
			  <li><a align="center" href="SignIn.php">Sign In</a></li>
			</ul>
		</nav>
		  
<div class="clear"></div>
			</div>


		<!-- Begin Products -->
			
				<div id="products">
				<h2>Featured Products</h2>

	      <div class="section group">
		  
		  <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $currency = "$";
    if($category_id == 0){
        $results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
    } else {
        $results = $mysqli->query("SELECT * FROM product WHERE Category_ID='$category_id' ORDER BY Product_ID ASC");
    }
    if ($results) {
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="grid_1_of_4 images_1_of_4">'; 
			echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'" ></div>';
            echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
            echo '<div class="product-desc">'.$obj->Description.'</div>';
            echo '<div class="product-info">';
			echo '<p><span class="price"> Price:<big style="color:green">'.$currency.$obj->Price.'</big></span></p>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
				<div class="cl">&nbsp;</div>
			</div>
			
			<!-- End Products -->		
<!-- service section -->
<section id="service" class="service section">
  <div class="container">
    <div class="row" align="center">
      <div>
        <h4>Quality Groceries At An Affordable Price</h4>
		<p>Your freshly handpicked groceries & delivered from favourite supermarket to your home! Fresh produce, household, dairy and more.</p>
        <p>Stay Home & Safe While We Deliver To You. Complimentary Cutting Services. Shop Online Today And Guaranteed Next Day Delivery</p>
      </div>
    </div>
  </div>
</section>

    <?php
        include ("./footer.php")
    ?>

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script>
</body>
</html>

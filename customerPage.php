<?php
include("config.php");
include("usersession.php");

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
<link rel="stylesheet" href="css/font-awesome.min.css">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->

	 <link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
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
   //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    $currency = '$';
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
}
?>

			</dd>
	</dl>
</div>


<!--search and search button-->
<div style="margin-top: 80px">
    <form name="search_form" action="" method="post">
        <input type="search" id="search" name="search" placeholder="Search..."
            style="width: 40%">
    </form>
    <button onclick="searchFormValidate()" style="margin-top: 20px">Search</button>
</div>

<!--Display Searched Products-->
    <div id="search_result">
        <?php
            if (isset($_POST['search'])) {
                echo "<h2><i>Search Result</i></h2>";

                /* receive search word from search-box and query in database*/
                $search = $_POST['search'];
                $search = mysqli_real_escape_string($mysqli, $search);
                $sql1 = "Select * From product WHERE productName LIKE " . "'%" . $search . "%'";
                $result1 = $mysqli->query($sql1);
                ?>

                <?php
                /*display, if there is a search word in db. otherwise display 'no match'*/
                if ($result1->num_rows > 0) {

                    if ($result1->num_rows > 0) {
                        ?>
                        <summary><h3>Products (<?php echo $result1->num_rows; ?> items)</h3></summary>
                        <?php
                        while ($row = mysqli_fetch_array($result1)) {
                            echo "<div class='floating-box text-center'>";
                            if ($row['productName'])
                                echo "<img src='images/" . $row['Picture'] . "'  width='50'  height='50'>" . "<p><a style='color: red'>" .$row['productName']."<div>".$row['Description']."</div> $". $row['Price'] . "</a></p></div>";
                        } ?>

                        <?php
                    }

                } else {
                    echo "No match!";
                }
                ?>
                <?php
            }
        ?>
    </div>

		<!-- Begin Products -->
			
				<div id="products">
				<h2>Featured Products</h2>
                <div>Filter By</div>
                    <div class="form-group">
                        <!--fetch categories from database. -->
                        <?php
                        $results = $mysqli->query("SELECT * FROM category ORDER BY Category_ID ASC");
                        if ($results) {

                            //fetch results set as object and output HTML
                            while($obj = $results->fetch_object())
                            {
                                echo '<input type="button" value="'.$obj->Category_Name.'" onclick="filterProduct('.$obj->Category_ID.')"></input>';

                            }

                        }
                        ?>
                        <input type="button" value="All" onclick="filterProduct(0)"/>
                    </div>

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
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->Picture.'"></div>';
            echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
            echo '<div class="product-desc">'.$obj->Description.'</div>';
            echo '<div class="product-info">';
			echo '<p><span class="price"> Price:<big style="color:green">'.$currency.$obj->Price.'</big></span></p>';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button add_to_cart" >Add to Cart</button></span> </div>';
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
			
			<!-- End Products -->		
    <?php
        include ("./footer.php")
    ?>

<!-- JS FILES --> 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script>
</body>
<script src="js/customers.js"></script>
<script>
    function searchFormValidate() {
        var search = document.getElementById('search').value;
        if (!search) {
            alert('Please input word to search.');
        } else {
            document.forms['search_form'].submit();
        }
    }

    function filterProduct(id) {
        //alert(e.target.value);
        window.location.href='./customerPage.php?categoryId='+id;
    }
</script>
</html>

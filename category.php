<?php
include("config.php");
include("usersession.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <title>The Coders Online Grocery System</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/category.css" type="text/css" media="all" />

    <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>

    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="webthemez">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="src/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
</head>

<body>
<?php
include ("./header.php")
?>

<div id="main" class="shell">
    <div id="content">

    </div>
    <div class="cl">&nbsp;</div>

    <div id="category-page">
        <h2>Category</h2>

        <?php
        $results = $mysqli->query("SELECT * FROM category ORDER BY Category_ID ASC");
        if ($results) {

            //fetch results set as object and output HTML
            while ($obj = $results->fetch_object()) {
                echo '<button class="btn btn-sm btn-primary mr-2" onclick="filterProduct(' . $obj->Category_ID . ')">' . $obj->Category_Name . '</button>';
            }
        }
        ?>
        <button class="btn btn-sm btn-primary" onclick="filterProduct(0)">All</button>

        <div class="section group">

            <div class="row mt-25">
                <?php

                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                $category_id = isset($_REQUEST['c_id'])?$_REQUEST['c_id']:0;
                if($category_id ==0){
                    $results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");

                } else {
                    $results = $mysqli->query("SELECT * FROM product where Category_ID='$category_id' ORDER BY Product_ID  ASC");
                }
                if ($results) {

                    //fetch results set as object and output HTML
                    while($obj = $results->fetch_object())
                    {
                        echo '<div class="grid_1_of_4 images_1_of_4 col-3-3">';
                        echo '<form method="post" action="cart_update.php">';
                        echo '<div class="product-thumb" ><img src="images/'.$obj->Picture.'"></div>';
                        echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
                        echo '<div class="product-desc">'.$obj->Description.'</div>';
                        echo '<div class="product-info">';
                        echo '<p><span class="price"> Price: RM <big style="color:orange">'.$obj->Price.'</big></span></p>';
                        echo '<div>Qty <input type="text" name="product_qty" value="1" size="3" /></div>';
                        echo '<div class="button"><span><button class="cart-button add_to_cart"><i class="fa fa-shopping-cart fa-2x pr-1"></i>Add to Cart</button></span> </div>';
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
        </div>
<!--        <div class="section group">-->
<!---->
<!--            --><?php
//
//            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//
//            $results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
//            if ($results) {
//
//                //fetch results set as object and output HTML
//                while($obj = $results->fetch_object())
//                {
//                    echo '<div class="grid_1_of_4 images_1_of_4">';
//                    echo '<form method="post" action="cart_update.php">';
//                    echo '<div class="product-thumb" ><img src="images/'.$obj->Picture.'"></div>';
//                    echo '<div class="product-content"><h2><b>'.$obj->productName.'</b> </h2>';
//                    echo '<div class="product-desc">'.$obj->Description.'</div>';
//                    echo '<div class="product-info">';
//                    echo '<p><span class="price"> Price: RM <big style="color:orange">'.$obj->Price.'</big></span></p>';
//                    echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
//                    echo '<div class="button"><span><img src="images/cart.jpg" alt="" /><button class="cart-button"  class="add_to_cart">Add to Cart</button></span> </div>';
//                    echo '</div></div>';
//                    echo '<input type="hidden" name="Product_ID" value="'.$obj->Product_ID.'" />';
//                    echo '<input type="hidden" name="type" value="add" />';
//                    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
//                    echo '</form>';
//                    echo '</div>';
//                }
//
//            }
//            ?>
<!--        </div>-->
        <div class="cl">&nbsp;</div>
    </div>
</div>
<?php
include ("./footer.php")
?>

<script type="application/javascript">
    function filterProduct(id) {
        window.location.href="category.php?c_id="+id;
    }
</script>
</body>

</html>
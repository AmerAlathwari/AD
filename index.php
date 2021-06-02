<?php
include("config.php");

$category_id = isset($_REQUEST['categoryId']) ? $_REQUEST['categoryId'] : 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

    <title>The Coders Online Grocery System</title>
    <link rel="shortcut icon" href="images/logo.png"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/cart.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen"/>

    <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/main.js" type="text/javascript"></script>

</head>

<body>

<br>
<div id="main">

    <header>
        <h1><a align="center" class="logo" href="index.php"><img src="images/logo.png" alt="Home" width="100"
                                                                 height="100"></a></h1>
        <div id="top-nav">
            <ul>
                <li><a href="registerPage.php" title="Contact"> <span class="jananalibritish"> Register </span></a></li>
                <li class="janan"><a href="SignIn.php"><span class="jananalibritish"> Signin </span></a></li>
            </ul>
        </div>
    </header>


    <div id="content">
        <div class="post" align="center">
            <h1>Welcome To The Coders Store</h1>
            <br><h4>You can be confident when you're shopping online with The Coders Store. Due to the pandemic
                COVID-19, we are aware that people shift to online shopping to avoid gathering,
                Thus, we are here to provide you the best solution for you to shop online. We also provide pickup, so
                that you can should and pickup your groceries within few minutes.
                Shop with us! Cheap and save your time!</h4>

            <div class="cl">&nbsp;</div>
        </div>
    </div>
</div>

<div id="main" class="shell">
    <div id="content">
        <div id="content">

        </div>
    </div>


    <div class="cl">&nbsp;</div>

    <div id="products">
        <h2>Featured Products</h2>

        <div class="section group">

            <?php


            $results = $mysqli->query("SELECT * FROM product ORDER BY Product_ID ASC");
            if ($results) {

                //fetch results set as object and output HTML
                while ($obj = $results->fetch_object()) {
                    echo '<div class="grid_1_of_4 images_1_of_4">';
                    echo '<form method="post">';
                    echo '<div class="product-thumb"><img src="images/' . $obj->Picture . '"></div>';
                    echo '<div class="product-content"><h2><b>' . $obj->productName . '</b> </h2>';
                    echo '<div class="product-desc">' . $obj->Description . '</div>';
                    echo '<div class="product-info">';
                    echo '<p><span class="price"> Price: RM <big style="color:orange">' . $obj->Price . '</big></span></p>';
                    echo '</div></div>';
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
            $result = mysqli_query($mysqli, "select * from product") or die (mysqli_error());
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <li>
                    <a href="products.php" title="Product Link"><img src="images/<?php echo $row['Picture'] ?>"
                                                                     alt="IMAGES"/></a>
                    <div class="info">
                        <h4><b><?php echo $row['productName'] ?></b></h4>
                        <span class="number"><span>Price: <big style="color:orange">RM <?php echo $row['Price'] ?></big></span></span>

                        <div class="cl">&nbsp;</div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div class="cl">&nbsp;</div>
    </div>

</div>


<?php
include("./footer.php")
?>

</body>
</html>

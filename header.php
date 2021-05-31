<section class="banner" role="banner" >
  	<header >
		<h1 ><a align="center"  class="logo" href="customerPage.php"><img src="images/logo.png" alt="Home" width="100" height="100"></a></h1>
			<br><br><h1>THE CODERS ONLINE GROCERY STORE</h1>
			<div id="top-nav">
				<ul>
					<li><a href="#" title="Login Email"> <span class="janan"> <?php echo "Your Email Is: ". "<i><b>".$login_session."</b></i>" ;?> </span></a></li>
					<li > <a href="contact.php" title="Contact"> <span class="jananalibritish"> Contact  </span></a>  </li>
					<li class="janan"><a href="logout.php"><span class="jananalibritish">Logout </span></a></li>
				</ul>
			</div>
			<div class="cl">&nbsp;</div>

		<div id="navigation">
			<div class="shell">
				<ul  align="center">
					<li><a href="customerPage.php" >Home</a></li>
					<li><a href="products.php" >Product</a></li>
					<li><a href="#" >Category</a></li>
					<li><a href="#" >About us</a></li>
					<li><a href="contact.php" >Contact Us</a></li>
					<li><a href="faq.php" >FAQ</a></li>
					
				</ul>
<?php

$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$currency = "RM";
$total = 0;

if(isset($_SESSION["cart_session"]))
{
	echo '<details>';
	echo '<summary style="cursor: pointer" align="right">My Shopping Cart</summary>';
	echo '<div class="shopping-cart" id="cart">';
	echo '<dl id="acc">';
	echo '<dt class="active">';
	echo '<p class="shopping">Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
	echo '</dt>';
	echo '<dd class="active" style="display: block;">';
    echo '<ul>';

    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<br><h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Quantity</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong></span>';
        echo '<div class="p-price"><b><i>Price: </b></i> <strong style="color: #d7565b" ><big>'. $currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';

        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
		$_SESSION["TotalPrice"] = $total;
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total: </i> <big style="color:green" >'. $currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '<br><a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h6 class="text-center"></h6>';
}

echo '</dd>';
echo '</dl>';
echo '</div>';
echo '</details>'
?>
				<div class="cl">&nbsp;</div>
				
			</div>
		</div>

		</header>
</section>
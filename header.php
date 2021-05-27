<section class="banner" role="banner" >
  	<header >
		<h1 ><a align="center"  class="logo" href="customerPage.php"><img src="images/logo.png" alt="Home" width="100" height="100"></a></h1>
			<br><br><h1>THE CODERS ONLINE GROCERIES STORE</h1>
			<div id="top-nav">
				<ul>
					<li><a href="#" title="Login Email"> <span class="janan"> <?php echo "Your Email Is: ". "<i><b>".$login_session."</b></i>" ;?> </span></a></li>
					<li > <a href="contact.php" title="Contact"> <span class="jananalibritish"> Contact  </span></a>  </li>
					<li class="janan"><a href="logout.php"><span class="jananalibritish">Logout </span></a></li>
				</ul>
			</div>
			<div class="cl">&nbsp;</div>
	</header>
</section>

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
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:orange" ><i>Total: RM </i> <big style="color:orange" >'.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text" href="cart_update.php">Clear Cart</span></a>';
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
				<div class="cl">&nbsp;</div>
			</div>
		</div>
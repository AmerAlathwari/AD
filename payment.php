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
	<link rel="stylesheet" href="../css/userlogin.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />

	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="../js/jquery.js" type="text/javascript"></script>  
    <script src="js/main.js" type="text/javascript" charset="utf-8"></script>

	<link rel="stylesheet" href="../css/PaymentStyle.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/sliding.form.js"></script>
	<!-- Stripe JavaScript library -->
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
		ss{
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
		
		<script type="text/javascript">
			//set your publishable key
			Stripe.setPublishableKey('pk_test_51IzEVUAiAd3ZERxxkJIsEOeDR0R1gg9UfMcjlCRQaba0Dy8I5bXKhELHKNUWVnCCeozPA6DBULQS5dDVa8tl4qfh00eW2mignX');

			//callback to handle the response from stripe
			function stripeResponseHandler(status, response) {
				if (response.error) {
					//enable the submit button
					$('#payBtn').removeAttr("disabled");
					//display the errors on the form
					$(".payment-errors").html(response.error.message);
				} else {
					var form$ = $("#paymentFrm");
					//get token id
					var token = response['id'];
					//insert the token into the form
					form$.append("<input type='hidden' name='stripeToken' value='" 
			+ token + "' />");
					//submit form to the server
					form$.get(0).submit();
				}
			}
			$(document).ready(function() {
				//on form submit
				$("#paymentFrm").submit(function(event) {
					//disable the submit button to prevent repeated clicks
					$('#payBtn').attr("disabled", "disabled");
					
					//create single-use token to charge the user
					Stripe.createToken({
						number: $('.card-number').val(),
						cvc: $('.card-cvc').val(),
						exp_month: $('.card-expiry-month').val(),
						exp_year: $('.card-expiry-year').val()
					}, stripeResponseHandler);
					
					//submit from callback
					return false;
				});
			});
</script>

<div id="main" class="shell">
	<div id="content">	
		<br><br>
			<h2>Your Information</h2>
				<div class="brands">
		 			<div id="form_wrapper" class="form_wrapper">			
               			<?php  
						$id = $_SESSION['login_username'];
						$query = mysqli_query($mysqli,"SELECT * FROM customer WHERE Email = '$id'") or die (mysqli_error()); 
						$result = mysqli_fetch_array($query);	
						?>
							<table>	
								<span class="payment-errors"></span>
								<form  class="register active" action="payment_process.php" method="POST" id="paymentFrm">
									
									<tr>
										<td><input name="username" type="hidden" value="<?php echo $result['Cust_Id']?>"/></td></tr>
									<tr>
										<td>  <label>Name</label><input name="name"  type="text" required/></td></tr>
									<tr>
										<td> <label>Email</label><input name="email" type="text" required/></td></tr>
									<tr>  
										<td> <label>Card Number</label> <input name="card_num" size="20" type="text" autocomplete="off" class="card-number" required/></td></tr>
									<tr>  
										<td> <label>CVC</label> <input name="cvc" size="4" type="text" autocomplete="off" class="card-cvc" required/></td></tr>
									<tr>  
										<td> <label>Expiration (MM/YYYY)</label> 
											<input name="exp_month" size="2" type="text" class="card-expiry-month" required/>
											<span> / </span>
											<input name="exp_year" size="4" type="text" class="card-expiry-year" required/>
											</td></tr>
									<tr>
										<td> <label>Purchase Type</label> 
											<select name="type" id="select">
												<option value="pickup" puchaseType="01">Pick-Up</option>
											</select>
										</td>
									</tr>
										
										<?php

											$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
												
											if(isset($_SESSION["cart_session"]))
											{
												$total = 0;
												echo '<ol>';
												foreach ($_SESSION["cart_session"] as $cart_itm)
												{
												
													$subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
													$total = ($total + $subtotal); 
												}
												echo '</ol>';
												echo '<td Align="right">Total:RM <big style="color:green">'.$total.'</big></td>';

											}else{

											}
											?>
									
										<td colspan="3">		
										<button type="submit"  name="submit" class="a-btn"><span class="a-btn-text">Submit Payment</span> </button>	
									</td>
										
								</form>
							</table>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
	</div>
</div>
<div class="cl">&nbsp;</div>
<br><br>
		<?php
        include ("./footer.php")
    	?>

</body>
</html>
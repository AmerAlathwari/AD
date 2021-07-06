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
	   
	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
    <script src="js/main.js" type="text/javascript" charset="utf-8"></script>

	
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
		
<div id="main" class="shell">
<div id="content">
</div>
  <div class="post">
		<br><h3>1. What is The Coders Groceries Store?</h3>
			<br><p>The Coder Groceries Store provide an online grocery shopping where you can order and pickup your order within minutes!
			Our professionally-trained staff and experienced 'Order n Go' online shop and pickup at counter within minutes. It will save your time!!
			We are ready to serve you.</p>

		<br><h3>2. How can I contact The Coders Groceries Store?</h3>
			<br><p>Many ways!
			You may call us at +603 5521 4421 every day between 10am to 10pm.
			Alternatively, you may drop us a message in the ‘Contact Us’ section of system or email us at grocery@thecoders.com.
			Whatever your preferred communication channel, we are here for you!</p>

		<br><h3>3. How do I report an issue regarding my order?</h3>
			<br><p>You may email us at support@thecoders.com. to report order issues.
			We kindly ask for the following information so that we can provide you with a solution as speedily as possible:

				– Order number
				– Brief description of issue / affected item
				– Photos of affected item with clear views of the bar code (for damaged / incorrect items)</p>

		<br><h3>4. Why is my order takes longer time to get ready?</h3>
			<br><p>Delayed could be caused by a number of hindrances such as huge amount of order (at peak hour). 
				We will endeavour to notify you of such delays.</p>

		<br><h3>5. What is your cancellation policy?</h3>
			<br><p>You may cancel your order if our staff has not started the shopping process.
			For technical reasons, you cannot cancel your order once shopping has commenced.</p>

			<div class="cl">&nbsp;</div>
	</div>		
</div>
</div>
		<?php
        include ("./footer.php")
    	?>

</body>
</html>
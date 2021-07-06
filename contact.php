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
	<link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
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
		<div id="main" class="shell">
<br>
				<div id="form_wrapper" class="form_wrapper">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="POST" action="contact_process.php" id="frmcontact">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" id="name"value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" id="email"value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="phone" id="phone"value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="text"  id="textarea"> </textarea   maxlength="100"></span>
						    </div>
						   <div>
						   		<span><input type = "submit" name = "submit" id = "submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>					

		<script src="./js/jquery.min.js"></script>	
		<script type="text/javascript">
			$(function() {


			$("#submit").click(function(){

			var element = $(this);

			 if(confirm("Your feedback has successfully submitted"))
					  {

			 $.ajax({
			   type: "GET",
			   url: "contact.php",
			   data: info,
			   success: function(){
			   
			   }
			 });
					 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
					.animate({ opacity: "hide" }, "slow");

			 }

			return false;

			});

			});
		</script>

</script>
</div>
	<div class="cl">&nbsp;</div>
</div>
<?php
        include ("./footer.php")
    	?>

</body>
</html>
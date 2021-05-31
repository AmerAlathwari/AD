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
					    <form method="POST" action="feedback_process.php" id="frmcontact">
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
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
 
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'feedback_process.php',
        data: $("#frmcontact").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
</div>
	<div class="cl">&nbsp;</div>
</div>
<?php
        include ("./footer.php")
    	?>

</body>
</html>
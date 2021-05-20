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
<link rel="stylesheet" type="text/css" href="css/AnimateLogo.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />


</head>
<body>
<!-- header top section -->
<section class="banner" role="banner">
  <header align="center">
    <div> <a class="logo" href="index.php"><img src="images/logo.png" alt="Home" width="80" height="80"></a>
		<h3>SignUp Page</h3>
		<h4>Please Register Your Account Now !</h4>
	  </div>
  </header>
</section>


	<body>
		<div id="main" class="shell">
			<div id="content">
	
				<script type="text/javascript">
				$(document).ready(function() { 

					$('#btnSubmit').click(function() {  

						$(".error").hide();
						var hasError = false;
						var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

						var emailaddressVal = $("#email").val();
						if(emailaddressVal == '') {
							$("#email").after('<span class="error">Please enter your email address.</span>');
							hasError = true;
						}

						else if(!emailReg.test(emailaddressVal)) {
							$("#email").after('<span class="error">Enter a valid email address.</span>');
							hasError = true;
						}

						if(hasError == true) { return false; }

					});
				});

				</script>

									
				<div id="form_wrapper" class="form_wrapper">
					<table>
						<form  class="register active"  id="myForm" method="POST" action="insertCustomer.php">
							<th colspan="3"><h2 align="center">CUSTOMER REGISTRATION</h2> </th> 
													
								<tr>
									<td>  
										<label> Email</label>
										<input type="text" name="email" id="email"/>
										<span class="error">This is an error</span>
									</td>
									<td>   
										<label> FullName</label>
										<input type="text" name="name" />
										<span class="error">This is an error</span>					
									</td>
								</tr>
							   
								<tr>
									<td>  
										<label>Password</label>
										<input type="password" name="password1" id="password1" />

									</td>
								
									<td>   
										<label>UserName</label>
											<input type="text" name="username" id="username"/>
											<span class="error">This is an error</span>
									</td>
								</tr>
							   
								<tr>
									<td>  

										<label> Re-Password</label>
										<input type="password" name="password2"id="password2" />  
										<div id="pass-info"> </div>
									</td>
								
									<td>   
											<label> Phone</label>
											<input type="text" name="tell" id="tell"/>
											<span class="error">This is an error</span>
								   </td>
							   </tr>
							   
								<tr>
									<td>   
									
										<label> Country</label>
										<script type="text/javascript" src="js/countries.js"></script>
										<select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
									</td>
							   
									<td>   
										<label>Address</label>
										<input type="text" name="address" id="address"/>
										<span class="error">This is an error</span>   
									</td>
								</tr>
							   
								<tr>
									<td>   
										<label> City</label>
										<select name ="City" id ="state"></select>
										<script language="javascript">print_country("country");</script>
										<span class="error">This is an error</span>
									</td>
							   
									<td>   
										<label>Postal code</label>
										<input type="text" name="pcode" id="pcode"/>
										<span class="error">This is an error</span>
									</td>
								</tr>
							   
								<tr>
									<div class="bottom">
										<td colspan="3">	
											<button  class="btn btn-success"  type="submit" name="submit"> Register</button>			
										<div class="clear"></div>
									</div>
							   </tr>
						</form>
					</table>
				</div>
			</div>
		<!-- End Content -->
		</div>
    </body>
	
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

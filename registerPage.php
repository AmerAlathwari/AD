<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
    <meta charset="UTF-8" />
    <title>Login and Registration Form</title>
    <link rel="shortcut icon" href="images/logo.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />

</head>

<body>
<br><div id="main">

<header>
	<h1 ><a align="center"  class="logo" href="index.php"><img src="images/logo.png" alt="Home" width="100" height="100"></a></h1>
        <div id="top-nav">
			<ul>
				 <li class="janan"><a href="SignIn.php"><span class="jananalibritish">Signin</span></a></li>
			</ul>
        </div>
</header>
<br>

<div id="content">
  <div class="post" align="center">
					<h1 >Registration Form</h1>
					<br><h4>Please Register Your Account Now</h4>
			<div class="cl">&nbsp;</div>
	</div>		
</div>
</div>

		<section>
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
										<label>Email</label>
										<input type="text" name="email" id="email"/>
										<span class="error">This is an error</span>
									</td>
									<td>   
										<label>FullName</label>
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

										<label>Re-Password</label>
										<input type="password" name="password2"id="password2" />  
										<div id="pass-info"> </div>
									</td>
								
									<td>   
											<label>Phone</label>
											<input type="text" name="tell" id="tell"/>
											<span class="error">This is an error</span>
								   </td>
							   </tr>
							   
								<tr>
									<td>   
										<label>Country</label>
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
										<label>City</label>
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
		</div>
	</section>
	<div class="cl">&nbsp;</div>
</div>
<br><br>
	<?php
        include ("./footer.php")
    ?>

</body>
</html>
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


</head>
<body>
<!-- header top section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php"><img src="images/logo.png" alt="Home" width="50" height="50"></a>
      <h2 align="center">LogIn Page</h2>
	  <h4 align="center">Please Login or SignUp</h4></div>
  </header>
</section>

<!-- header content section -->
<section id="hero" class="section ">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-10 hero">
        <div class="hero-content">
        </div>
        <!-- hero --> 
      </div>
    </div>
  </div>
</section>
<!-- header content section --> 
<body>
        <div class="container">
			<div class="codrops-top">
            <header>
			    <p align="center" align="center"><b> <a href="#toregister"  class="a-btn"><span class="a-btn-text">Admin Login</span></a>  </b>	<b> <a href="#tologin"  class="a-btn"> <span class="a-btn-text">Customer Login</span> </a> </b>
				<a href="registerPage.php" class="a-btn"><strong><span class="a-btn-text">Create New Account</span></strong></a></p>
            </header>
			 <div class="clr"></div>
			 </div> <br><br>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="userValidate.php" method="post" autocomplete="on"> 
                                <h1>Customer Login</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your Email </label>
                                    <input type="text" name="magaca" required="required" type="text" placeholder="xxxx@gmail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                                    <input type="password" name='furaha' required="required" type="password" placeholder="eg. *********" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit"  name="submit"  value =" Login">
								</p>
                            </form>
                        </div>
						
						<div id="register" class="animate form">
                            <form  action="employeeValidate.php" method="post" autocomplete="on"> 
                             <h1>Admin Login</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your User Name </label>
                                    <input type="text" name="magaca" required="required" type="text" placeholder="myusername "/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                                    <input type="password" name='furaha' required="required" type="password" placeholder="eg. *******" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>

								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
<!-- service section -->
<section id="service" class="service section">
  <div class="container">
  </div>
</section>
<!-- service section --> 
<!-- footer section -->
<footer class="footer">
  <div class="container">
    <div class="col-md-8 left">
      <h4>Don't forget to shop now! For any enquiries :</h4>
      <p> Call: +603 5521 4421 OR Email : <a href="mailto:alyanasuha1@gmail.com"> grocery@thecoders.com </a></p>
    </div>
    <div class="col-md-4 right">
      <p>© 2021 All rights reserved. All Rights Reserved<br>
        Made with <i class="fa fa-heart pulse"></i> by The Coders Team</p>
    </div>
  </div>
</footer>
<!-- footer section --> 

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script>
</body>
</html>

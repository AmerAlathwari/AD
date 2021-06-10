<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form</title>
        <link rel="shortcut icon" href="images/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/AnimateLogo.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

	   	<link rel="stylesheet" href="css/userlogin.css" type="text/css" media="all" />

</head>
<body>

<div class="container">
    <header>
        <h1><p> <a href="Sign In.php"><img src="images/logo.png" width="80" height="80" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>The Coders Groceries Store</p> </h1>  
        <h1><p><strong>Login Form</strong> <span>Please Login Or Sign Up </span></p></h1>
    </header>

<div class="codrops-top">
    <header>
    <p ><b> <a href="#toregister"  class="a-btn"><span class="a-btn-text">Admin Login</span></a>  </b>	
    <b> <a href="#tologin"  class="a-btn"> <span class="a-btn-text">Customer Login</span> </a> </b>
    <a href="registerPage.php" class="a-btn"><strong><span class="a-btn-text">Create New Account</span></strong></a>
    <a href="index.php" class="a-btn"><strong> <span class="a-btn-text">Back To Home</span></strong></a> </p>
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
                    <h1>Customer Login:</h1> 
                    <p> 
                        <label for="username" class="uname" data-icon="u" > Your Email </label>
                        <input type="text" name="magaca" required="required" type="text" placeholder="xxx@gmail.com"/>
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
</html>

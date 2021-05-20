<header align="center" >
    <div> <a class="logo" href="customerPage.php"><img src="images/logo.png" alt="Home" width="80" height="80"></a> 
</header>
  
	<nav class="navigation" role="navigation">
			<ul class="primary-nav">
				<li><a href="#" title="Login Email"><?php echo "Welcome Mr./Ms. : ". "<i><b>".$login_session."</b></i>" ;?> </span></a></li>
				<li > <a href="contact.php" title="Contact">Contact</a></li>
				<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
			</ul>
      </nav>
<div id="content-wrap">		  
	  <section id="secondary_bar">

             <nav align="center" ><!-- Defining the navigation menu -->
                <ul >
                    <li class="selected"><a href="index.php">Home</a></li>
                    <li><a href="addSupplier.php">Supplier</a></li>
                    <li><a href="addProduct.php">Product</a></li>
                    <li><a href="Employee.php">Employee</a></li>
                    <li><a href="addCategory.php">Categories</a></li>
					<li class="logout"> <a href="../logout.php">Logout</a></li>
                    <li class="logout"> <span class="check"> <?php echo "Welcome Mr/Miss:   ". "<font color='##fa5400'><i><b>".$login_session."</b></i></font>" ;?> </span></li>
					
                </ul>
				
            </nav>
				
            </nav>

	</section><!-- end of secondary bar -->
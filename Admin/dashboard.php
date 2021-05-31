	<!-- header top section -->
	<section class="banner" role="banner">
	  <header align="center">
		<a  href="../Admin/index.php"><img src="../images/logo.png" alt="Home" width="80" height="80"></a>
		<h3> The Coders Online Grocery System | Administration </h3>
	  </header>
	</section>
	
<div id="content-wrap">	
	<section id="secondary_bar">

             <nav align="center" ><!-- Defining the navigation menu -->
                <ul >
					<li class="logout"> <a href="../logout.php">Logout</a></li>
                    <li class="logout"> <span class="check"> <?php echo "Welcome Mr/Miss:   ". "<font color='##fa5400'><i><b>".$login_session."</b></i></font>" ;?> </span></li>
					
                </ul>
				
            </nav>
				
            </nav>

	</section><!-- end of secondary bar -->

<aside id="sidebar" class="column">
    <!-- Begin Search -->
    <div id="search">
        <form action="#" method="post" accept-charset="utf-8">
            <input type="text"  title="Search..." class="blink field"  placeholder="Search Product"   name='search' size=60 maxlength=100 />
            <input class="search-button" type="submit" value="Submit" />
            <div class="cl">&nbsp;</div>
        </form>

    </div>
    <!-- End Search -->
    <hr/>

    <h3>Reports</h3>
    <ul class="toggle">
        <li class="icn_settings"><a href="orderHistory.php">Order Report</a></li>
        <li class="icn_settings"><a href="#">Employee Report</a></li>
        <li class="icn_settings"><a href="#">Customer Report</a></li>
        <li class="icn_settings"><a href="#">Product Report</a></li>
        <li class="icn_settings"><a href="salesReport.php">Sales Report</a></li>

    </ul>

    <h3>Administrator</h3>
    <ul class="toggle">
        <li class="icn_add_user"><a href="Employee.php">Add Employee</a></li>
        <li class="icn_photo"><a href="addProduct.php">Add Product</a></li>
        <li class="icn_tags"><a href="addSupplier.php">Add Supplier</a></li>
        <li class="icn_new_article"><a href="addCategory.php">Add Category</a></li>

    </ul>

    <h3>Tables</h3>
    <ul class="toggle">
        <li class="icn_categories"><a href="#">Order Detail</a></li>
        <li class="icn_categories"><a href="#">Customer Detail</a></li>
    </ul>

</aside><!-- end of sidebar -->


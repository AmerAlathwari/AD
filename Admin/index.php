<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>

<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Coders Online Grocery System</title>
	<link rel="shortcut icon" href="../images/logo.png" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/flexslider.css">
	<link rel="stylesheet" href="../css/jquery.fancybox.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/font-icon.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>

		<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
	
	    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	</script>


	<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>


	<script type="text/javascript">
	$(document).ready(function() {

		// load messages every 1000 milliseconds from server.
		load_data = {'fetch':1};
		window.setInterval(function(){
		 $.post('shout.php', load_data,  function(data) {
			$('.message_box').html(data);
			var scrolltoh = $('.message_box')[0].scrollHeight;
			$('.message_box').scrollTop(scrolltoh);
		 });
		}, 1000);
		
		//method to trigger when user hits enter key
		$("#shout_message").keypress(function(evt) {
			if(evt.which == 13) {
					var iusername = $('#shout_username').val();
					var imessage = $('#shout_message').val();
					post_data = {'username':iusername, 'message':imessage};
					
					//send data to "shout.php" using jQuery $.post()
					$.post('shout.php', post_data, function(data) {
						
						//append data into messagebox with jQuery fade effect!
						$(data).hide().appendTo('.message_box').fadeIn();
		
						//keep scrolled to bottom of chat!
						var scrolltoh = $('.message_box')[0].scrollHeight;
						$('.message_box').scrollTop(scrolltoh);
						
						//reset value of message box
						$('#shout_message').val('');
						
					}).fail(function(err) { 
					
					//alert HTTP server error
					alert(err.statusText); 
					});
				}
		});
		
		//toggle hide/show shout box
		$(".close_btn").click(function (e) {
			//get CSS display state of .toggle_chat element
			var toggleState = $('.toggle_chat').css('display');
			
			//toggle show/hide chat box
			$('.toggle_chat').slideToggle();
			
			//use toggleState var to change close/open icon image
			if(toggleState == 'block')
			{
				$(".header div").attr('class', 'open_btn');
			}else{
				$(".header div").attr('class', 'close_btn');
			}
			 
			 
		});
	});

	</script>
	</head>

<body>
	<!-- header top section -->
	<section class="banner" role="banner">
	  <header id="header">
		<div class="header-content clearfix"> <a class="logo" href="Admin/index.php"><img src="../images/logo.png" alt="Home" width="50" height="50"></a>
		  <nav class="navigation" role="navigation">
			<ul class="primary-nav">
			  <li class="icn_jump_back"><a href="../logout.php">Logout</a></li>
			</ul>
		  </nav>
		  <p align="center" align="center"><b> <a href="addProduct.php"  class="a-btn"><span class="a-btn-text">Add Product</span></a>  </b>	<b> <a href="#tologin"  class="a-btn"> <span class="a-btn-text">Add employee</span> </a>   </b>	<b> <a href="#tologin"  class="a-btn"> <span class="a-btn-text">Categories</span> </a> </b></p>
	  </header>
	</section>
   	
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
		    <li class="icn_settings"><a href="#">Order Report</a></li>
			<li class="icn_settings"><a href="#">Employee Report</a></li>
			<li class="icn_settings"><a href="#">Customer Report</a></li>
			<li class="icn_settings"><a href="#"> Product Report</a></li>
     		
		</ul>
	
		<h3>Administrator</h3>
		<ul class="toggle">
		    <li class="icn_add_user"><a href="#">Add Employee</a></li>
			<li class="icn_photo"><a href="addProduct.php">Add Product</a></li>
			<li class="icn_tags"><a href="addSupplier.php">Add Warehouse</a></li>
			<li class="icn_new_article"><a href="addCategory.php">Add Category</a></li>
		
		</ul>
		
        <h3>Tables</h3>
		<ul class="toggle">
		    <li class="icn_categories"><a href="#">Order Detial</a></li>
     		<li class="icn_categories"><a href="#">Customer Detail</a></li>
		</ul>

	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Welcome To <strong>"The Coders System Management"</strong> Admin Panel As: <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4> 
		
		<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count">1,876</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,103</p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count">1,646</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,054</p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<?php
			$result = mysqli_query($mysqli,"SELECT * FROM contact");
		?>
<div id="tab2" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
		<thead>
		<thead><th colspan="7"> Commands and Complain </th></thead>
		<thead>
			</tr>
				<th>Check</th> 
				<th> ID</th>
				<th> Name</th>			  
				<th>Email</th>
				<th>TellePhone</th>	
				<th>Comment</th>				
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($result))
			{?>

			<tr>
				<td><input type="checkbox"></td>
				<td><?Php echo $row['contact_id']; ?></td>
				<td><?php echo $row['Name']; ?></td>
				<td><?php echo $row['Email']; ?></td>
				<td><?php echo $row['Phone']; ?></td>
				<td><?php echo $row['Subject']; ?></td>
				<td> <a href="conDelete.php?delete=<?php echo $row['contact_id']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
			</tr>

			<?php }mysqli_close($mysqli);?>
		</tbody>
	</table>
	
</div><!-- end of #tab2 -->
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>
    </div>
</div>

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

<!-- footer section -->
<footer class="footer">
  <div class="container">
    <div class="col-md-6 left">
      <h4>Don't forget to shop now! For any enquiries :</h4>
      <p> Call: +603 5521 4421 OR Email : <a href="mailto:alyanasuha1@gmail.com"> grocery@thecoders.com </a></p>
    </div>
    <div class="col-md-6 right">
      <p>© 2021 All rights reserved. All Rights Reserved<br>
        Made with <i class="fa fa-heart pulse"></i> by The Coders Team</p>
    </div>
  </div>
</footer>
<!-- footer section --> 

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.fancybox.pack.js"></script> 
<script src="../js/retina.min.js"></script> 
<script src="../js/modernizr.js"></script> 
<script src="../js/main.js"></script>
</body>
</html>

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
		<div class="header-content clearfix"> <a class="logo" href="../Admin/index.php"><img src="../images/logo.png" alt="Home" width="50" height="50"></a>
		  <nav class="navigation" role="navigation">
			<ul class="primary-nav">
			  <li class="icn_jump_back"><a href="../logout.php">Logout</a></li>
			</ul>
		  </nav>
		  <p align="center" align="center"><b> <a href="addProduct.php"  class="a-btn"><span class="a-btn-text">Add Product</span></a>  </b>	<b> <a href="#"  class="a-btn"> <span class="a-btn-text">Add employee</span> </a>   </b>	<b> <a href="#"  class="a-btn"> <span class="a-btn-text">Categories</span> </a> </b></p>
	  </header>
	</section>
	
  <div id="content-wrap">	
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
			<li class="icn_tags"><a href="addWarehouse.php">Add Warehouse</a></li>
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

		<script type="text/javascript">
			function validateForm()
			{
			var a=document.forms["addCategory"]["categoryName"].value;
			if (a==null || a=="")
			  {
			  window.alert("Pls. Enter The Category Name !!!");

			  return false;
			  }
			var b=document.forms["addCategory"]["description"].value;
			if (b==null || b=="")
			  {
			  alert("Pls. Enter The Description !!!");
			  return false;
			  }
			var a=document.forms["addCategory"]["file"].value;
			if (a==null || a=="")
			  {
			  alert("Pls. You Have Been Missing Employee Full Name !!!");
			  return false;
			  }

			}
		</script>

		<script type="text/javascript">
			$(function() {
				$('#empValid').keyup(function() {
				
					if (this.value.match(/[^a-zA-Z]/g)) {
						this.value = this.value.replace(/[^a-zA-Z ]/g, '');
						
					}
					Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
				});
			});
		</script>
		
	<div id="form_wrapper" class="form_wrapper">
		<table>
			<form class="register active" id="myForm" action="insertCategory.php" method="POST" name="addEmployee" >
				<th colspan="3"><h2>Add Category</h2> </th> 
				<tr>
					<td>  
						<label>Category Name</label>
							<input type="text" id="empValid" name="categoryName" placeholder="Category Name" required>
							<span class="error">This is an error</span>
					</td>
					<td>   
						<label>Description</label>
							<input type="text" id="empValid" name="description" placeholder="Description" required>
							<span class="error">This is an error</span>
					</td>
					<td>  
						<label> Select Image</label>
							<input type="file" name="picture" id="picture"  required>
							<span id="pass-info"> </span>					   
					</td>
				</tr>
				<tr>
					<div class="bottom">
						<td colspan="3">	
							<button name="submit" id="save" title="Click to Save"  class="a-btn"> <span class="a-btn-text">Add Category</span></button>
						</td>
						<div class="clear"></div>
					</div>
				</tr>
			</form>		
		</table>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){ 
			$("#save").click(function() { 
			 
				$.ajax({
				cache: false,
				type: 'POST',
				url: 'insertCategory.php',
				data: $("#myForm").serialize(),
				success: function(d) {
					$("#someElement").html(d);
				}
				});
			}); 
		});
	</script>
		

	<div class="tab_container">
		<?php
		$result = mysqli_query($mysqli,"SELECT * FROM category");
		?>
    <div id="tab1" class="tab_content">
		<table class="tablesorter" cellspacing="0"> 
			<thead><th colspan="6">Category Data List</th></thead>
			<thead>
				</tr>
				<th>Check</th> 
				<th> ID</th>
				<th> Category</th>			  
				<th>Discription</th>
				<th>Picture</th>				
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result))
				{?>
				<tr>
					<td><input type="checkbox"></td>
					<td><?Php echo $row['Category_ID']; ?></td>
					<td><?php echo $row['Category_Name']; ?></td>
					<td><?php echo $row['Discription']; ?></td>
					<td><img src="../images/<?php echo $row['Picture']; ?>" width="40" height="40"></td>
					<td> <a href="#?update=<?php echo $row['Category_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
					 <a href="#?delete=<?php echo $row['Category_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
				</tr>
				<?php }mysqli_close($mysqli);?>
			</tbody>
		</table>  
	</div> 
</div><!-- end of .tab_container -->
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

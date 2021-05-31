<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>The Coders Online Grocery System</title>

	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	
	<script src="./js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="./js/hideshow.js" type="text/javascript"></script>
	<script src="./js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./js/jquery.equalHeight.js"></script>
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


	<!--<script type="text/javascript" src="./js/jquery-1.9.0.min.js"></script>-->
    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>


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
	
    <?php
        include ("./dashboard.php")
    ?>
	

<section id="main" class="column">
	<h4 class="alert_info">Welcome To <strong>"The Coders System Management"</strong> Admin Panel As: <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>




		<script type="text/javascript">
			$(function() {
			
				$('.user').keyup(function() {
				
					if (this.value.match(/[^a-zA-Z]/g)) {
					
						this.value = this.value.replace(/[^a-zA-Z ]/g, '');
						 window.alert("Please. Sir In A UserName Field Only Charecters Allowed !!!");
					}
					
				});
			});
		</script>
		
	   
		
	<div id="form_wrapper" class="form_wrapper">

		<table>
			<form class="register active"  action="insertProduct.php" method="POST" id="myForm">

				<th colspan="3"><h2>ADD NEW PRODUCT</h2> </th> 
					<tr>
						<td>  

							<label> Name</label>
							<input type="text" name="name" id="name"  class="" required>
							<span class="error">This is an error</span>
							
						</td>
						<td>   
							<label>Category</label>

								 <?php
								include('../config.php');
								$name= mysqli_query($mysqli,"select * from category");

								echo '<select  name="select"  id="ml" class="ed">';
								echo '<option selected="selected">Select</option>';
								 while($res= mysqli_fetch_assoc($name))
								{

								echo '<option value="'.$res['Category_ID'].'">';
								echo $res['Category_Name'];
								echo'</option>';
								}
								echo'</select>';

								?>
							<span class="error">This is an error</span>

						</td>
			   
						<td>  

							<label>Brand</label>
							<input type="text"  name="model"  id="model"  required> 
							<span id="pass-info"> </span>				   
						</td>
					</tr>

					<tr>
						<td> 
						   
							<label>Type</label>
							<input type="text" name="type" id="type"  required>
							<span id="pass-info"> </span>
						</td>
						<td> 
							<label>Supplier</label>
								<?php
								include('../config.php');
								$name= mysqli_query($mysqli,"select * from warehouse");

								echo '<select   name="WH"  id="ml" class="ed">';
								echo '<option selected="selected">Select</option>';
								 while($res= mysqli_fetch_assoc($name))
								{

								echo '<option  value="'.$res['Warehouse_ID'].'">';
								echo $res['Warehouse'];
								echo'</option>';
								}
								echo'</select>';

								?>
							<span class="error">This is an error</span>
								
						</td>
				
						<td>   
							<label>Description</label>
							<input type="text"  name="ml"  id="ml"  maxlength="50" required> 
							<span id="pass-info"> </span>
						</td>
					</tr>
			   
					<tr>
						<td>  

							<label>Price</label>
							<input type="text"  name="price"  id="price"  style="text-align: right"  required>
							<span class="error">This is an error</span>
							
						
						</td>
						<td>   

							<label>Picture</label>
							<input type="file" name="picture" id="picture"  required>
							<span class="error">This is an error</span>
						</td>
					</tr>
			   
						<div class="bottom">
							<td colspan="3">	
								<button name="save" id="delbutton" title="Click to Save"  class="a-btn" > <span class="a-btn-text"> Add Product</span></</button>
							<div class="clear"></div>
                            </td>
						</div>
			</form>
		</table>
						
		<!--<script src="js/jquery.js"></script>	-->
		<script src="./js/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {


			$("#delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			 if(confirm("You have Pressed 'Add Product' button \n Are you sure to SAVE the Product?"))
					  {

			 $.ajax({
			   type: "GET",
			   url: "prodDelete.php",
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
	</div>

	<?php
	$result = mysqli_query($mysqli,"SELECT * FROM product");
	?>

	<div id="tab1" class="tab_content">
		<table class="tablesorter" cellspacing="0"> 
			<thead>  <th Colspan="11">  The Coders Product Data List </th></thead>
			<thead>
				</tr>
					<th>Check</th> 
					<th>ID</th>
					<th>Name</th>			  
					<th>Category</th>
					<th>Brand</th>				
					<th>Type</th>
					<th>WareHouse</th>				
					<th>Description</th>
					<th>Price</th>				
					<th>Picture</th>
					<th>Actions</th>
				</tr>
			</thead>
			
			<tbody>
				<?php while($row = mysqli_fetch_array($result))
				{?>

					<tr>
						<td><input type="checkbox"></td>
						<td><?Php echo $row['Product_ID']; ?></td>
						<td><?php echo $row['productName']; ?></td>
						<td><?php echo $row['Category_ID']; ?></td>
						<td><?php echo $row['Model']; ?></td>
						<td><?Php echo $row['Type']; ?></td>
						<td><?php echo $row['Warehouse_ID']; ?></td>
						<td><?php echo $row['Description']; ?></td>
						<td><?php echo $row['Price']; ?></td>
						<td> <img src="../images/<?php echo $row['Picture']; ?> " width="40" height="40"   ></td>
						<td> <a href="prodViewUpdate.php?update=<?php echo $row['Product_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
							<a href="prodDelete.php?delete=<?php echo $row['Product_ID']; ?>" onClick="del(this);" title="Delete" class="delbutton"><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
					</tr>

				<?php }mysqli_close($mysqli);?>
			</tbody>
		</table>  
	 </div> 


		<script src="./js/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {


			$(".delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			 if(confirm("Sure you want to DELETE this product? If NO, Please click CANCEL button !!"))
					  {

			 $.ajax({
			   type: "GET",
			   url: "prodDelete.php",
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
</section>
</div>
</div>

    <?php
        include ("./footer.php")
    ?>

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./js/jquery-1.11.3.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.fancybox.pack.js"></script> 
<script src="./js/retina.min.js"></script> 
<script src="./js/modernizr.js"></script> 
<script src="./js/main.js"></script>
</body>
</html>

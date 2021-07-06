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


	$(".tab_content").hide(); 
	$("ul.tabs li:first").addClass("active").show();
	$(".tab_content:first").show(); 


	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); 
		$(this).addClass("active"); 
		$(".tab_content").hide(); 

		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});

});
    </script>
	
	    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	</script>

	<script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>


	<script type="text/javascript">
	$(document).ready(function() {


		load_data = {'fetch':1};
		window.setInterval(function(){
		 $.post('shout.php', load_data,  function(data) {
			$('.message_box').html(data);
			var scrolltoh = $('.message_box')[0].scrollHeight;
			$('.message_box').scrollTop(scrolltoh);
		 });
		}, 1000);
		

		$("#shout_message").keypress(function(evt) {
			if(evt.which == 13) {
					var iusername = $('#shout_username').val();
					var imessage = $('#shout_message').val();
					post_data = {'username':iusername, 'message':imessage};
					
	
					$.post('shout.php', post_data, function(data) {
						

						$(data).hide().appendTo('.message_box').fadeIn();
		

						var scrolltoh = $('.message_box')[0].scrollHeight;
						$('.message_box').scrollTop(scrolltoh);
						
		
						$('#shout_message').val('');
						
					}).fail(function(err) { 
					
	
					alert(err.statusText); 
					});
				}
		});
		

		$(".close_btn").click(function (e) {

			var toggleState = $('.toggle_chat').css('display');
			

			$('.toggle_chat').slideToggle();
			
	
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
	
		<?php
			$result = mysqli_query($mysqli,"SELECT * FROM payment");
		?>
<div id="tab2" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
		<thead>
		<thead><th colspan="7">Order Details</th></thead>
		<thead>
			</tr>
				<th>Check</th> 
				<th>ID</th>
    	      	<th>FullName</th>
              	<th>Email</th>			  
    			<th>PCode</th>
		    	<th>Adress</th>	
             	<th>Country</th>	
             	<th>City</th>
              	<th>Phone</th>
			  	<th>Warehouse</th>
			  	<th>Delivery Address</th>
			  	<!-- <th>Currency</th> -->
			  	<th>Total Amount</th>
			  	<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_array($result))
			{?>

			<tr>
				<td><input type="checkbox"></td>
    			<td><?Php echo $row['order_ID']; ?></td>
    			<td><?php echo $row['Full_Name']; ?></td>
   				<td><?php echo $row['Email']; ?></td>
				<td><?php echo $row['Postal_Code']; ?></td>
				<td><?php echo $row['Home_Address']; ?></td>
				<td><?php echo $row['Country']; ?></td>
				<td><?php echo $row['City']; ?></td>
				<td><?php echo $row['Phone']; ?></td>
				<td><?php echo $row['Warehouse_ID']; ?></td>
				<td><?php echo $row['Dilivery_Address']; ?></td>
				<!-- <td><?php echo $row['Currency']; ?></td> -->
				<td><?php echo $row['Total_Amount']; ?></td>
    			<td> <a href="PaymentDelete.php?delete=<?php echo $row['order_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
			</tr>

			<?php }mysqli_close($mysqli);?>
		</tbody>
	</table>
	
</div>
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.fancybox.pack.js"></script> 
<script src="../js/retina.min.js"></script> 
<script src="../js/modernizr.js"></script> 
<script src="../js/main.js"></script>
</body>
</html>

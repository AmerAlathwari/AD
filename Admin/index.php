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
		</article>
		
		<?php
			$result = mysqli_query($mysqli,"SELECT * FROM contact");
		?>
<div id="tab2" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
		<thead>
		<thead><th colspan="7">Customer Feedback / Complaint</th></thead>
		<thead>
			</tr>
				<th>Check</th> 
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone No.</th>	
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

<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>

<html class="no-js" lang="">

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

		<script type="text/javascript">
			function validateForm()
			{
			var a=document.forms["addCategory"]["categoryName"].value;
			if (a==null || a=="")
			  {
			  window.alert("Please. Enter The Category Name !!!");

			  return false;
			  }
			var b=document.forms["addCategory"]["description"].value;
			if (b==null || b=="")
			  {
			  alert("Please. Enter The Description !!!");
			  return false;
			  }
			var a=document.forms["addCategory"]["file"].value;
			if (a==null || a=="")
			  {
			  alert("Please. You Have Been Missing Employee Full Name !!!");
			  return false;
			  }

			}
		</script>

		<script type="text/javascript">
			$(function() {
				$('#categoryName').keyup(function() {
				
					if (this.value.match(/[^a-zA-Z]/g)) {
						this.value = this.value.replace(/[^a-zA-Z ]/g, '');
						
					}
					Alart("Numbers IS NOT Allowed!!!!!! !!!");
				});
			});
		</script>
		
	<div id="form_wrapper" class="form_wrapper">
		<table>
			<form class="register active" id="myForm" action="insertCategory.php" method="POST" name="addEmployee" >
				<th colspan="3"><h2>ADD NEW CATEGORY</h2> </th> 
				<tr>
					<td>  
						<label>Category Name</label>
							<input type="text" id="categoryName" name="categoryName" placeholder="Category Name" required>
							<span class="error">This is an error</span>
					</td>
					<td>   
						<label>Description</label>
							<input type="text" id="description" name="description" placeholder="Description" required>
							<span class="error">This is an error</span>
					</td>
					<td>  
						<label> Select Image</label>
							<input type="file" name="image" id="image"  required>
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

	<script>
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
			<thead><th colspan="6">List of Category</th></thead>
			<thead>
				</tr>
				<th>Check</th> 
				<th>ID</th>
				<th>Category</th>			  
				<th>Description</th>
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
					<td> <a href="catViewUpdate.php?update=<?php echo $row['Category_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
					 <a href="catDelete.php?delete=<?php echo $row['Category_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
				</tr>
				<?php }mysqli_close($mysqli);?>
			</tbody>
		</table>  
	</div> 
</div>
</section>

    <?php
        include ("./footer.php")
    ?>

<!-- JS FILES --> 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="./js/jquery-1.11.3.min.js"></script>
<script src="./js/bootstrap.min.js"></script> 
<script src="./js/jquery.fancybox.pack.js"></script> 
<script src="./js/retina.min.js"></script> 
<script src="./js/modernizr.js"></script> 
<script src="./js/main.js"></script>
</body>
</html>

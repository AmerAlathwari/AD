<?php 
	include("../config.php");
    include("../session.php");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>The Coders System Management | Administrator</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
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

</head>


<body>

    <?php
        include ("./dashboard.php")
    ?>
	
	<section id="main" class="column">
	<?php
		$update=$_GET['update'];
		$result = mysqli_query($mysqli,"SELECT * FROM category where Category_ID ='$update'");
	?>
	
<?php if($row = mysqli_fetch_array($result))
  {?> 
  
	<div id="form_wrapper" class="form_wrapper">
		<form class="quick_search">
			<input type="text"  value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		
		<table>
			<form class="register active" action="catUpdate.php" method="POST" enctype="multipart/form-data" autocomplete="off">
				<th colspan="3"><h2>UPDATE CATEGORY INFORMATION</h2> </th> 
					<input type="hidden" id="ID" name="ID" value="<?php echo $row['Category_ID'];?>"  placeholder="ID" required>
					<span class="error">This is an error</span>
		<tr>
			<td>  
			  <label>Category Name</label>
				<input type="text" id="categoryName" name="categoryName"  value="<?php echo $row['Category_Name'];?>" placeholder="Insert Category Name" required>
				<span class="error">This is an error</span>
			</td>
		   <td>   
			<label>Description</label>
				<input type="text" id="description" name="description" value="<?php echo $row['Discription'];?>" placeholder="Insert Description" required>
				<span class="error">This is an error</span>
			</td>
			<td>  
				<label>Image</label>
				<input type="file" name="image" id="image" value="<?php echo $row['Picture'];?>" required>
				<span class="error">This is an error</span>					   
			</td>
		</tr>

		<tr>
			<div class="bottom">
				<td colspan="3">	
					<button type="submit"  name="submit" value="Update" class="a-btn"> <span class="a-btn-text">Update Category</span></button>
				</td>
				<div class="clear"></div>
			</div>
		</tr>
		</form>		
	</table>
</div>
 </div> 
		<?php }?>
	</section>
    </div>
</div>
    
</body>
</html>
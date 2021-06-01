	
	<?php 
include("../session.php");
	include("../config.php");
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
$result = mysqli_query($mysqli,"SELECT * FROM product  where Product_ID ='$update'");
?>
<?php if($row = mysqli_fetch_array($result))
  {?> 
  
<div id="form_wrapper" class="form_wrapper">
		<form class="quick_search">
			<input type="text"  value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		
	<table>
		<form class="register active" action="prodUpdate.php" method="POST" enctype="multipart/form-data" autocomplete="off">
			<th colspan="3"><h2>Update Product Data</h2> </th> 
				<input type="hidden" id="ID" name="ID" value="<?php echo $row['Product_ID'];?>"  placeholder="ID" required>
				<span class="error">This is an error</span>
   <tr>
		<td>  
			<label>Full Name</label>
				<input type="text" id="fname" name="fname" value="<?php echo $row['productName'];?>"  placeholder="Full name" required>
				<span class="error">This is an error</span>
		</td>
		<td>   
			<label>Category Name</label>

				<?php echo $row['Category_ID'];?>
				<?php
		include('../config.php');
		$name= mysqli_query($mysqli,"select * from category");

		echo '<select  name="cname"  id="ml" class="ed">';
		echo '<option selected="selected">Select</option>';
		 while($res= mysqli_fetch_assoc($name))
		{

		echo '<option value="'.$res['Category_ID'].'" '.($row['Category_ID'] == $res['Category_ID'] ? "selected" : '').'>';
		echo $res['Category_Name'];
		echo'</option>';
		}
		echo'</select>';

		?>
			<span class="error">This is an error</span>
		</td>
		
		<td>   
		<label>Brand</label>
			<input type="text" id="model" name="model" value="<?php echo $row['Model'];?>" placeholder="User name" required>
			<span class="error">This is an error</span>
	   </td>
   </tr>
   
   <tr>
		<td>  
			<label>Type</label>
				<input type="text" id="type" name="type" value="<?php echo $row['Type'];?>"  placeholder="Full name" required>
				<span class="error">This is an error</span>
		</td>
		<td>   

			<label>Supplier</label>

				<?php
				include('../config.php');
				$name= mysqli_query($mysqli,"select * from warehouse");

				echo '<select   name="whouse"  id="ml" class="ed">';
				echo '<option selected="selected">Select</option>';
				 while($res= mysqli_fetch_assoc($name))
				{

				echo '<option  value="'.$res['Warehouse_ID'].'" '.($row['Warehouse_ID'] == $res['Warehouse_ID'] ? "selected" : '').'>';
				echo $res['Warehouse'];
				echo'</option>';
				}
				echo'</select>';

				?>
				<span class="error">This is an error</span>
		</td>
		<td>   
			<label>Description</label>
				<input type="text" id="desp" name="desp" value="<?php echo $row['Description'];?>" placeholder="User name" required>
				<span class="error">This is an error</span>
		</td>
	</tr>
    <tr>
		<td>  
			 <label>Price (RM)</label>
				<input type="text" id="price" name="price" value="<?php echo $row['Price'];?>"  placeholder="Full name" required>
				<span class="error">This is an error</span>
		</td>
		<td>   
			<label>Image</label>
				<input type="file" name="picture" id="picture"  value="<?php echo $row['Picture'];?>" required>
				<span class="error">This is an error</span>
		</td>
	</tr>
	<tr>
		<div class="bottom">
			<td colspan="3">	
				<button type="submit"  name="submit" value="Update" class="a-btn"> <span class="a-btn-text">Update Product</span></button>
			</td>							
		<div class="clear"></div>
		</div>
	<tr>
		</form>			
	</table>
</div>
         <?php }?>
	</section>
    </div>
</div>
    
</body>
</html>
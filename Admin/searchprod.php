<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>The Coders Online Grocery System</title>
	
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
	

<SCRIPT language="Javascript">
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
           
         return true;
		  
      }
     

   </SCRIPT>
 <script type="text/javascript">
        $(function() {
            $('#num').keyup(function() {
			
                if (this.value.match(/[^0-9,.]/g)) {
                    this.value = this.value.replace(/[^0-9,./g, '');
					
                }
				Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('#text').keyup(function() {
			
                if (this.value.match(/[^a-zA-Z]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
					
                }
				Alart("Numbers IS NOT Allowed Sir!!!!!! !!!");
            });
        });
    </script>
	
	<div id="form_wrapper" class="form_wrapper">


</head>

					<script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
    
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'insertProduct.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>

	</div>

 <html>
<head>
	<meta charset="utf-8"/>
	<title>The Coders Online Grocery System</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
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
<?php

//capture search term and remove spaces at its both ends if the is any
$searchTerm = trim($_POST["search"]);

//check whether the name parsed is empty
if($searchTerm == "")
{
	echo "Enter name you are searching for.";
	exit();
}
?>

<?php
//database connection info
$db_host = "localhost"; //server
$db_name = "grocerysystem"; //database name
$db_username = "root"; //dabases user name
$db_password = "root"; //password

//connecting to server and creating link to database
$link = mysqli_connect($db_host, $db_name, $db_username, $db_password);
?>
<?php
//MYSQL search statement
$query ="SELECT * FROM product WHERE productName LIKE '%$searchTerm%'";

$results = mysqli_query($link, $query);
?>

 <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

			<thead>  <th Colspan="11">  The Coders Product Data Table </th></thead>
		<thead>
			</tr>
				<th>Check</th> 
				<th>ID</th>
				<th>Name</th>			  
				<th>Category</th>
				<th>Model</th>				
				<th>Type</th>
				<th>WareHouse</th>				
				<th>Description</th>
				<th>Price</th>				
				<th>Picture</th>
				<th>Actions</th>
			</tr>
		</thead>
<tbody>



<?php
/* check whethere there were matching records in the table
by counting the number of results returned */

if(mysqli_num_rows($results) >= 1)
{?>
<?php
	$output = "";
	while($row = mysqli_fetch_array($results))
	{ ?>


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
			<a href="prodDelete.php?delete=<?php echo $row['Product_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
    </tr>

	<?php } ?>

  <?php }mysqli_close($mysqli); ?>

</html>
   
</body>

</html>
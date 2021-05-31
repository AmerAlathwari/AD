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
				Alart("Numbers is NOT Allowed. Please re-enter your data");
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('#text').keyup(function() {
			
                if (this.value.match(/[^a-zA-Z]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
					
                }
				Alart("Numbers is NOT Allowed. Please re-enter your data");
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

</head>
<?php

$searchTerm = trim($_POST["search"]);

if($searchTerm == "")
{
	echo "Enter name you are searching for.";
	exit();
}
?>

<?php

$db_host = "localhost"; 
$db_name = "grocerysystem"; 
$db_username = "root"; 
$db_password = "root"; 


$link = mysqli_connect($db_host, $db_name, $db_username, $db_password);
?>
<?php

$query ="SELECT * FROM warehouse WHERE Warehouse LIKE '%$searchTerm%'";

$results = mysqli_query($link, $query);
?>

 <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

		
<div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

		<thead>  <th Colspan="9">  The Coders Supplier Data Table </th></thead>
		<thead>
		<thead>
			</tr>
				<th>Check ID</th> 
				<th>ID</th>
				<th>Name</th>			  
				<th>Country</th>
				<th>City</th>				
				<th>Address</th>
				<th>Postal Code</th>				
				<th>Email</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>


<?php


if(mysqli_num_rows($results) >= 1)
{?>
<?php
	$output = "";
	while($row = mysqli_fetch_array($results))
	{ ?>


    <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['Warehouse_ID']; ?></td>
    <td><?php echo $row['Warehouse']; ?></td>
   <td><?php echo $row['Country']; ?></td>
	<td><?php echo $row['City']; ?></td>
	<td><?php echo $row['Address']; ?></td>
	<td><?php echo $row['PostalCode']; ?></td>
	<td><?php echo $row['Email']; ?></td>
    <td> <a href="wareViewUpdate.php?update=<?php echo $row['Warehouse_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="DeleteWarehouse.php?delete=<?php echo $row['Warehouse_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
    </tr>

	<?php } ?>

  <?php }mysqli_close($mysqli); ?>

</html>
   
</body>

</html>
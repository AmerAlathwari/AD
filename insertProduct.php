

<?php
   include('../config.php');
$fname = strtotime(date('Y-m-d H:i')).'_'.$_FILES['picture']['name'];
$sql="INSERT INTO product (productName, Category_ID, Model,Type, Warehouse_ID, Description,Price, Picture) 
VALUES ('$_POST[name]', '$_POST[select]', '$_POST[model]', '$_POST[type]', '$_POST[WH]', '$_POST[ml]', '$_POST[price]', '$fname')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  if(!empty($_FILES['picture']['tmp_name'])){
  	move_uploaded_file($_FILES['picture']['tmp_name'], '../images/'.$fname);
  }
  header("location: addProduct.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 


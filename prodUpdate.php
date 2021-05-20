<?php
include '../config.php';

?>

<?php 

if (isset($_POST['submit'])){
$id=$_POST['ID'];

$fullname  =$_POST['fname'];
$cname     =$_POST['cname'];
$model     =$_POST['model'];
$type      =$_POST['type'];
$whouse    =$_POST['whouse'];
$desp      =$_POST['desp'];
$price     =$_POST['price'];
$picture   =$_FILES['picture']['name'];
$fname     = strtotime(date('Y-m-d H:i')).'_'.$picture;


$query="update product  set productName ='$fullname', Category_ID ='$cname', Model ='$model'   , Type ='$type' , Warehouse_ID='$whouse' , Description='$desp' , Price='$price'   , Picture='$fname'  where Product_ID =$id ";
$rows=mysqli_query($mysqli,$query);
echo "Succesfully updated ".$rows;
 if(!empty($_FILES['picture']['tmp_name'])){
  	move_uploaded_file($_FILES['picture']['tmp_name'], '../images/'.$fname);
  }
mysqli_close($mysqli);

header("location: addProduct.php?msg= Update successful.");
exit();
}

?>


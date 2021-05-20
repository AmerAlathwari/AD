<?php
include '../config.php';
?>

<?php 

if (isset($_POST['submit'])){
$id=$_POST['ID'];

echo $wname    =$_POST['wname'];
echo $country   =$_POST['country'];
echo $email    =$_POST['email'];
echo $address  =$_POST['address'];
echo $city     =$_POST['city'];
echo $pcode    =$_POST['pcode'];



echo $query="update warehouse set Warehouse ='$wname', Country ='$country', Email ='$email'   , Address ='$address' , City='$city' , PostalCode='$pcode' where Warehouse_ID =$id ";
$rows=mysqli_query($mysqli,$query);
echo "Update Successfully".$rows;
mysqli_close($mysqli);
header("location: addSupplier.php?msg= Update successful. ");
exit();
}

?>


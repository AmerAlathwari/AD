<?php
include '../config.php';
?>

<?php 

if (isset($_POST['submit'])){
	
$id=$_POST['ID'];

$categoryName    =$_POST['$categoryName'];
$description     =$_POST['$description'];
$picture         =$_POST['picture'];


$query="update category set Category_Name ='$categoryName', Discription ='$description', Picture ='$picture' where Category_ID =$id ";
$rows=mysqli_query($mysqli,$query);
echo "Succesfully updated ".$rows;
mysqli_close($con);
header("location: addCategory.php?msg= Update successful");
exit();
}

?>


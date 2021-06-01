<?php
include '../config.php';
?>

<?php 

if (isset($_POST['submit'])){
	
$id=$_POST['ID'];

$categoryName    		=$_POST['$categoryName'];
$description     		=$_POST['$description'];
$image   				    =$_FILES['image']['namee'];
$categoryName     	= strtotime(date('Y-m-d H:i')).'_'.$image;


$query="update category set Category_Name ='$categoryName', Discription ='$description', Picture ='$image' where Category_ID =$id ";
$rows=mysqli_query($mysqli,$query);
echo "Succesfully updated ".$rows;
 if(!empty($_FILES['image']['tmp_namee'])){
  	move_uploaded_file($_FILES['image']['tmp_namee'], '../images/'.$categoryName);
  }
mysqli_close($con);
header("location: addCategory.php?msg= Update successful");
exit();
}

?>


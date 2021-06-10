<?php 
    include("../config.php");?>
<?php

$delete= $_GET['delete'];

if(empty($delete)){
    echo "Please select any data";

}else{
    $query="delete from category where Category_ID =".$delete."";
    $result=mysqli_query($mysqli,$query);
        header("location: addCategory.php?msg= Data deleted successfully !!");
exit();
    mysqli_close($mysqli);
}
?>


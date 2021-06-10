<?php 
    include("../config.php");?>
<?php

$delete= $_GET['delete'];
if(empty($delete)){
    echo "Please select any data";

}else{
    $query="delete from warehouse where Warehouse_ID=".$delete."";
    $result=mysqli_query($mysqli,$query);
        header("location: addSupplier.php?msg = Data deleted successfully !!");
exit();
mysqli_close($mysqli);
}
?>
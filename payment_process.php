<?php
   include('config.php');
  ?>
  <?php
   if (isset($_POST['submit'])){
    $id=$_POST['cust_ID'];
    
    $Full_Name          =$_POST['fullname'];
    $Email              =$_POST['email'];
    $Postal_Code        =$_POST['pcode'];
    $Home_Address       =$_POST['address'];
    $Country            =$_POST['country'];
    $City               =$_POST['city'];
    $Phone              =$_POST['phone'];
    $Warehouse_ID       =$_POST['warehouse'];
    $Dilivery_Address   =$_POST['delivery'];
    $Total_Amount       =$_POST['Totalka'];;
   

$sql="INSERT INTO payment (Full_Name, Email, Postal_Code, Home_Address, Country, City, Phone, Warehouse_ID, Dilivery_Address, Total_Amount) 
VALUES ('$_POST[fullname]', '$_POST[email]', '$_POST[pcode]', '$_POST[address]', '$_POST[country]', '$_POST[city]', '$_POST[phone]', '$_POST[warehouse]', '$_POST[delivery]', '$_POST[Totalka]' )";


if (!mysqli_query($mysqli,$sql))
  {
    
  }
  session_start();
if(session_destroy())
  {
    header("location: payment.php");
    echo "1 payment data has been processed";
    }
    mysqli_close($mysqli);
  }
?> 
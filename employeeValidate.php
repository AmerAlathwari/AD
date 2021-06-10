<?php 
	include("config.php"); 
    session_start();
{

	$magaca=$_POST['magaca'];
	$furaha=$_POST['furaha'];
	
	$magaca= mysqli_real_escape_string( $mysqli,$magaca);
	$furaha = mysqli_real_escape_string( $mysqli, $furaha);

    $fetch=mysqli_query( $mysqli, "select Employee_ID from employee where Username='$magaca' and Password = '$furaha'");
    $count=mysqli_num_rows($fetch);
    if($count!="")
    {
    $_SESSION['login_username']=$magaca;
	 header("location: Admin/index.php");
    }
    else
    {
	   header('Location: SignIn.php');
	}

}
?>

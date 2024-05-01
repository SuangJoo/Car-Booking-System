<?php

include 'cbssession.php';
if(!session_id())
{
	session_start();
}


include("dbconnectlocal.php");

$uid = $_SESSION['uid'];
$vreg = $_POST['vreg'];
$vtype = $_POST['vtype'];
$vmodel = $_POST['vmodel'];
$vyear = $_POST['vyear'];
$vprice= $_POST['vprice'];


//Update vehicle info into DB
$sql = "UPDATE tb_vehicle 
		SET v_type='$vtype', v_model='$vmodel', v_year='$vyear', v_price='$vprice', v_status='1'
		WHERE v_reg = '$vreg'";

mysqli_query($con, $sql);
$result=mysqli_query($con, $sql);
if($result){
  $_SESSION['vreg'] = "Successfully modify vehicle information!";
  header('location: viewvehicle.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);



?>



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


//Record (Insert) new booking info into DB
$sql = "INSERT INTO tb_vehicle (v_reg, v_type, v_model, v_year, v_price, v_status)
		VALUES('$vreg','$vtype','$vmodel','$vyear','$vprice', '1')";

$result=mysqli_query($con, $sql);
if($result){
  $_SESSION['vreg'] = "Successfully add new vehicle!";
  header('location: viewvehicle.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);


?>



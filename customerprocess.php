<?php

include 'cbssession.php';
if(!session_id())
{
	session_start();
}


include("dbconnectlocal.php");



$uid = $_SESSION['uid'];
//$bid = $_POST['bid'];
$fvec = $_POST['fvec'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];


//Calculate number of days
$pickup = date('Y-m-d H:i:s', strtotime($fpdate));
$return = date('Y-m-d H:i:s', strtotime($frdate));
$daydiff = abs(strtotime($frdate)-strtotime($fpdate));//Seconds
//$daydiff = abs($return-$pickup);
$daynum = $daydiff/(60*60*24);

//Retrieve price from DB
$sqlprice = "SELECT v_price FROM tb_vehicle WHERE v_reg = '$fvec'";
$resultprice = mysqli_query($con, $sqlprice);
$rowprice = mysqli_fetch_array($resultprice);

//Calculate total price
$totalprice = $daynum * ($rowprice['v_price']);

//Record (Insert) new booking info into DB
$sql = "INSERT INTO tb_booking (b_customer, b_vehicle, b_pdate, b_rdate, b_total, b_status)
		VALUES('$uid','$fvec','$fpdate','$frdate','$totalprice', '4')";

$result=mysqli_query($con, $sql);
if($result){
 // $_SESSION['bid'] = "Successfully Booking! Wait for approval.";
  
  header('location: customermanage.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);

?>



<?php include 'footermain.php';?>
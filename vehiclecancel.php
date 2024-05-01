<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}


include('dbconnectlocal.php');


//get booking ID from URL
if(isset($_GET['id']))
{
	$vreg = $_GET['id'];
}

//SQL delete
$sql = "UPDATE tb_vehicle SET v_status = '2' WHERE v_reg = '$vreg' LIMIT 1";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('location: viewvehicle.php');

?>


<?php include 'footermain.php';?>


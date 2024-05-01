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
	$bid = $_GET['id'];
}

//SQL delete
$sql = "UPDATE tb_booking SET b_status = '3' WHERE b_id = '$bid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('location: customermanage.php');

?>


<?php include 'footermain.php';?>


<?php
session_start();
//DB Connection
include("dbconnectlocal.php");

//Retrieve input
$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];

//To prevent SQL injection
$fic = stripcslashes($fic);
$fpwd = stripcslashes($fpwd);
$fic = mysqli_real_escape_string($con, $fic);
$fpwd = mysqli_real_escape_string($con, $fpwd);
//Get user data from DB

$sql = "SELECT * FROM tb_user WHERE u_id ='$fic' AND u_pwd ='$fpwd'" ;


//Execute SQL
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

//Login check
if($count==1) //User found
{
	//Set session
	$_SESSION['u_id']=session_id();
	$_SESSION['uid']=$fic;

	if($row['u_type']==1)   //Staff
	{
		header('location:staff.php');
	}
	else                   //Customer
	{
		header('location:customer.php');
	}
	
}
else         //User not foundx
{
	//Display error
	include 'headermain.php';
	echo'User Not Found';
	include 'footermain.php';
}

mysqli_close($con);


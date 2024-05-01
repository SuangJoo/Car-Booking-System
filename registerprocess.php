<?php
include("dbconnectlocal.php");

$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];
$fname = $_POST['fname'];
$fadd = $_POST['fadd'];
$fcontact = $_POST['fcontact'];
$femail = $_POST['femail'];
$flno = $_POST['flno'];


$hash = password_hash($fpwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO tb_user (u_id, u_pwd, u_name, u_address, u_phone, u_email, u_lno, u_type, u_pic)
		VALUES('$fic','$hash','$fname','$fadd','$fcontact', 'femail','$flno','2', '')";

mysqli_query($con, $sql);
mysqli_close($con);

include 'headermain.php';

?>

<div class="container">
	<h3>Registration Successful. Please login to book</h3>
	<a href="login.php">Login Page</a>
	
</div>

<?php include 'footermain.php';?>
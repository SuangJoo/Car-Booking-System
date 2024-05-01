<?php
include 'cbssession.php';
if(!session_id())
{
  session_start();
}


include("dbconnectlocal.php");

$uid = $_SESSION['uid'];
$uname = $_POST['u_name'];
$uadd = $_POST['u_address'];
$uphone = $_POST['u_phone'];
$ulno = $_POST['u_lno'];
$uemail = $_POST['u_email'];


if(isset($_POST["upload"])){
    //Get the name of images
    $getname = $_FILES['image']['name'];

    //image path
    $image_Path = "uploads/".basename($getname);
    $sqlim = "UPDATE tb_user 
              SET u_name='$uname', u_address='$uadd', u_phone='$uphone', u_lno='$ulno',u_email='$uemail', u_pic='$getname'
              WHERE u_id = '$uid'";

    $sql_run = mysqli_query ($con,$sqlim);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $image_Path)){
        mysqli_close($con);
         header('location: customerviewprofile.php');
        echo "Your Image uploaded successfully";
    }else{
        echo "No Insert Image";
    }          
}

   ?>



<?php include 'footermain.php';?>
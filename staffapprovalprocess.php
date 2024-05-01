<?php
include 'cbssession.php';

if(!session_id())
{
     session_start();
}

include("dbconnectlocal.php");

//Retrieve data from approval page

$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];


//Update booking status
$sql = "UPDATE tb_booking 
        SET  b_status='$fstatus'
        WHERE b_id= '$fbid'";

//var_dump($sql);        
$result=mysqli_query($con, $sql);
if($result){
  // $_SESSION['bid'] = "Successfully manage approval!";
  // $to = $_POST['femail'];
  //        $subject = "Car Booking Confirmation";
         
  //        $message = "<b>This is booking confirmation message. Kindly view your booking in the system.</b>";
  //        $message .= $fbid;
         
  //        $header = "From:ngsuangjoo@gmail.com \r\n";
  //        $header .= $_POST['femail'];
  //        $header .= "MIME-Version: 1.0\r\n";
  //        $header .= "Content-type: text/html\r\n";
         
  //        $retval = mail ($to,$subject,$message,$header);
         
  //        if( $retval == true ) {
  //           echo "Message sent successfully...";
  //        }else {
  //           echo "Message could not be sent...";
  //        }
  header('location: staffview.php');
}
else{
  echo "Something went wrong";
}
mysqli_close($con);

?>
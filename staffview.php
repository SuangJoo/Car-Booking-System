<?php 

include 'cbssession.php';
if (!session_id())
{
	session_start();
}

include 'headerstaff.php';
include ('dbconnectlocal.php');


//Retrieve new bookings
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
        WHERE b_status!= '3'";
$result = mysqli_query($con, $sql);


?>

<?php

if(isset($_SESSION['bid'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['bid'];

?>
</div>

<?php
  unset($_SESSION['bid']);
}

?>

<div class="container">
<br><h3>Booking List</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pick Up Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

  	<?php
  		while($row=mysqli_fetch_array($result))
  		{
  			echo '<tr>';
  			echo "<td>".$row['b_id']."</td>";
  			echo "<td>".$row['u_name']."</td>";
  			echo "<td>".$row['v_model']."</td>";
  			echo "<td>".$row['b_pdate']."</td>";
  			echo "<td>".$row['b_rdate']."</td>";
  			echo "<td>".$row['b_total']."</td>";
  			echo "<td>".$row['s_desc']."</td>";
  			echo '<td>';
  				echo "<a href = 'staffchange.php?id=".$row['b_id']."' class = 'btn btn-warning'>Change</a> ";
  				
  			echo '</td>';
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	<br><br><br>

	
</div>

<?php include 'footermain.php';?>
<?php 

include 'cbssession.php';
if (!session_id())
{
	session_start();
}

include 'headercustomer.php';
include ('dbconnectlocal.php');

$uid = $_SESSION['uid'];

//Retrieve individual bookings
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_customer = '$uid'";
$result = mysqli_query($con, $sql);


?>

<?php 
if(isset($_SESSION['bid'])){
?>
<div class="alert alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Well done!</strong> <?php echo $_SESSION['bid'];?>
</div>

<?php 
unset($_SESSION['bid']);}
?>

<div class="container">
<br><h3>Your Booking List</h3>
<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">Booking ID</th>
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
  			echo "<td>".$row['v_model']."</td>";
  			echo "<td>".$row['b_pdate']."</td>";
  			echo "<td>".$row['b_rdate']."</td>";
  			echo "<td>".$row['b_total']."</td>";
  			echo "<td>".$row['s_desc']."</td>";
  			echo '<td>';
  				echo "<a href = 'customermodify.php?id=".$row['b_id']."' class = 'btn btn-warning'>Modify</a> &nbsp";
  				echo "<a onClick=\" javascript:return confirm('Are you sure to cancel the booking?');\" href = 'customercancel.php?id=".$row['b_id']."' class = 'btn btn-danger'>Cancel</a>";
  			echo '</td>';
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	
	
</div>
<br><br><br>
<?php include 'footermain.php';?>
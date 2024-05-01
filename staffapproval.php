<?php 

include 'cbssession.php';
if (!session_id())
{
	session_start();
}

include 'headerstaff.php';
include ('dbconnectlocal.php');

if(isset($_GET['id']))
{
	$bid = $_GET['id'];
}

//Retrieve new bookings
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
        WHERE b_id = '$bid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<div class="container">
<br><h3>Booking Details</h3>

		<form class= "form-horizontal" method="POST" action="staffapprovalprocess.php">

		<table class="table table-hover">
			<tr>
				<td>Booking ID</td>
				<td><?php echo $bid; ?></td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td><?php echo $row['u_name']; ?></td>
			</tr>
			<tr>
				<td>Customer Contact</td>
				<td><?php echo $row['u_phone']; ?></td>
			</tr>
			<tr>
				<td>Customer Address</td>
				<td><?php echo $row['u_address']; ?></td>
			</tr>
			<tr>
				<td>Vehicle</td>
				<td><?php echo $row['v_model']; ?></td>
			</tr>
			<tr>
				<td>Pickup Date</td>
				<td><?php echo $row['b_pdate']; ?></td>
			</tr>
			<tr>
				<td>Return Date</td>
				<td><?php echo $row['b_rdate']; ?></td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td><?php echo $row['b_total']; ?></td>
			</tr>
			<tr>
				<td>Approval</td>
				<td> <?php
      					$sqlstatus = "SELECT * FROM tb_status";
       					$resultstatus = mysqli_query($con, $sqlstatus);

        				echo ' <select class="form-select" name="fstatus" id="exampleSelect1">';
      

        				while($rowstatus=mysqli_fetch_array($resultstatus))
        				{
        					echo"<option value= '".$rowstatus['s_id']."'>".$rowstatus['s_desc']."</option>";
       					 }

        				echo '</select>';
      				?>
				</td>
			</tr>


			

		</table>
		<input type="hidden" name="fbid" value="<?php echo $row['b_id']; ?>">
		<button type="submit" class="btn btn-primary">Process</button>
<br><br><br><br><br><br><br><br>
			
		</form>


	
	
</div>

<?php include 'footermain.php';?>
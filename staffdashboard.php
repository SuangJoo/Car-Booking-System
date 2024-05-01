<?php

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headerstaff.php';

include("dbconnectlocal.php");


$uid = $_SESSION['uid'];

$sql = "SELECT * FROM tb_vehicle WHERE v_status!='2'";

$result = mysqli_query($con, $sql);


//Retrieve individual bookings
$sqli = "SELECT * FROM tb_booking
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_status='4'";
$resulti = mysqli_query($con, $sqli);
mysqli_close($con);
?>

<div class="container">
<br><h3>Vehicle List</h3>
<table class="table table-hover">
  <thead>
    <tr class='table-primary'>
      <th scope="col">Vehicle Registration ID</th>
      <th scope="col">Model</th>
      <th scope="col">Type</th>
      <th scope="col">Year</th>
      <th scope="col">Price</th>
      
      
    </tr>
  </thead>
  <tbody>

  	<?php
  		while($row=mysqli_fetch_array($result))
  		{
  			echo '<tr>';
  			echo "<td>".$row['v_reg']."</td>";
  			echo "<td>".$row['v_model']."</td>";
  			echo "<td>".$row['v_type']."</td>";
  			echo "<td>".$row['v_year']."</td>";
  			echo "<td>".$row['v_price']."</td>";
  		
  			
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	
	
</div>

<div class="container">
<br><h3>Your Booking List</h3>
<table class="table table-hover">
  <thead>
    <tr class='table-primary'>
      <th scope="col">Booking ID</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pick Up Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>

    <?php
      while($rowi=mysqli_fetch_array($resulti))
      {
        echo '<tr>';
        echo "<td>".$rowi['b_id']."</td>";
        echo "<td>".$rowi['v_model']."</td>";
        echo "<td>".$rowi['b_pdate']."</td>";
        echo "<td>".$rowi['b_rdate']."</td>";
        echo "<td>".$rowi['b_total']."</td>";
        echo "<td>".$rowi['s_desc']."</td>";
        
        echo '</tr>';
      }

    ?>

   
  
    
  </tbody>
</table>
  
  
</div><br><br><br>

<?php include 'footermain.php';?>

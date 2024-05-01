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
mysqli_close($con);


?>

<?php

if(isset($_SESSION['vreg'])){
?>
<div class="alert alert-success">
  <strong>Success! </strong><?php
  echo $_SESSION['vreg'];

?>
</div>

<?php
  unset($_SESSION['vreg']);
}

?>

<div class="container">
<br><h3>Vehicle List</h3>
<table class="table table-hover">
  <thead>
    <tr class='table-info'>
      <th scope="col">Vehicle Registration ID</th>
      <th scope="col">Model</th>
      <th scope="col">Type</th>
      <th scope="col">Year</th>
      <th scope="col">Price</th>
      <th scope="col">Manage</th>
      
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
  		
  			echo '<td>';
  				echo "<a href = 'vehiclemodify.php?id=".$row['v_reg']."' class = 'btn btn-warning'>Modify</a> &nbsp";
  				echo "<a onClick=\" javascript:return confirm('Are you sure to delete this?');\" href = 'vehiclecancel.php?id=".$row['v_reg']."' class = 'btn btn-danger'>Cancel</a>";
  			echo '</td>';
  			echo '</tr>';
  		}

  	?>

   
  
    
  </tbody>
</table>
	
	
</div>

<?php include 'footermain.php';?>

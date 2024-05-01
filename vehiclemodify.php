<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headerstaff.php';
include('dbconnectlocal.php');

if(isset($_GET['id']))
{
  $vreg = $_GET['id'];
}

$sql = "SELECT * FROM tb_vehicle WHERE v_reg = '$vreg'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>



<div class="container">

<div class = "col-sm-6">
<br>
<form method="POST" action="vehiclemodifyprocess.php">
  <fieldset>
    <legend>Modify Vehicle Information</legend>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Registration Number : <?php echo $vreg;?></label>
      

     
    </div>


      
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Type</label>
      <input type="text" name="vtype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['v_model'];?>" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Vehicle Model</label>
      <input type="text" name="vmodel" class="form-control" id="exampleInputPassword1" value="<?php echo $row['v_type'];?>" required>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Product Year</label>
      <input type="text" name="vyear" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['v_year'];?>" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Price</label>
      <input type="text" name="vprice" class="form-control" id="exampleInputPassword1" value="<?php echo $row['v_price'];?>" required>
    </div>

    <input type="hidden" name="vreg" value="<?php echo $row['v_reg']?>" >
    <br><br><br>

    
    <button type="submit" class="btn btn-dark">Update</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>


 <br><br><br>


</div>
</div>

<?php include 'footermain.php';?>
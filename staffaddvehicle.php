<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headerstaff.php';
include('dbconnectlocal.php');
?>



<div class="container">

<div class = "col-sm-6">
<br>
<form method="POST" action="addvehicleprocess.php">
  <fieldset>
    <legend>Add Vehicle</legend>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Registration Number</label>
      <input type="text" name="vreg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Vehicle Registration Number" required>

     
    </div>


      
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Type</label>
      <input type="text" name="vtype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Vehicle Type" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Vehicle Model</label>
      <input type="text" name="vmodel" class="form-control" id="exampleInputPassword1" placeholder="Enter Vehicle Model" required>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Vehicle Product Year</label>
      <input type="text" name="vyear" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Vehicle Product Year" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Price</label>
      <input type="text" name="vprice" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" required>
    </div>

    
    <br><br><br>

    
    <button type="submit" class="btn btn-dark">Add</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>


 <br><br><br>


</div>
</div>

<?php include 'footermain.php';?>
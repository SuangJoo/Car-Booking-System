<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headercustomer.php';
include('dbconnectlocal.php');

//get booking ID from URL
if(isset($_GET['id']))
{
	$bid = $_GET['id'];
}

$sql = "SELECT * FROM tb_booking WHERE b_id = '$bid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);




?>

<div class="container">

<div class="row">
	<br><br>
  <div class="col-sm-6">

  <div class="row">
  <div class="col-sm-6"><img class="img-thumbnail" src="img/X70.jpg"></div>
  <div class="col-sm-6">Proton X70<br>Year 2022<br>RM200</div>
  </div><br><br>

  
  <div class="row">
  <div class="col-sm-6"><img class="img-thumbnail" src="img/hondacity.jpg"></div>
  <div class="col-sm-6">Honda City<br>Year 2020<br>RM150</div>
  </div><br><br>

  <div class="row">
  <div class="col-sm-6"><img class="img-thumbnail" src="img/jaguar.jpg"></div>
  <div class="col-sm-6">Jaguar<br>Year 2021<br>RM300</div>
  </div><br><br>

</div>


<div class = "col-sm-6">
<br>
<form method="POST" action="customermodifyprocess.php">
  <fieldset>
    <legend>Modify Form</legend>

    <label for="exampleSelect1" class="form-label mt-4">Booking ID : <?php echo $bid;?></label>

<div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Vehicle</label>
      <?php
       $sqlv = "SELECT * FROM tb_vehicle";
       $resultv = mysqli_query($con, $sqlv);

        echo ' <select class="form-select" name="fvec" id="exampleSelect1">';
      

        while($rowv=mysqli_fetch_array($resultv))
        {
        	if($rowv['v_reg']==$row['b_vehicle'])
        	{
        		echo"<option selected ='Selected' value= '".$rowv['v_reg']."'>".$rowv['v_model']."</option>";

        	}
        	else
        	{
        		echo"<option value= '".$rowv['v_reg']."'>".$rowv['v_model']."</option>";
        	}

        	
        }

        echo ' </select>';
      ?>


      

    </div>

    <div class="form-group row">
      
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Pick Up Date</label>
      <input type="date" name="fpdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['b_pdate']?>" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
      <input type="date" name="frdate" class="form-control" id="exampleInputPassword1" value="<?php echo $row['b_rdate']?>" required>
    </div>

    <input type="hidden" name="fbid" value="<?php echo $row['b_id']?>" >

    
    <br><br><br><br><br><br>

    
    <button type="submit" class="btn btn-dark">Book</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>





</div>

<?php include 'footermain.php';?>
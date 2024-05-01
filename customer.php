<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headercustomer.php';
include('dbconnectlocal.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
<form method="POST" action="customerprocess.php">
  <fieldset>
    <legend>Booking Form</legend>

<div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Vehicle</label>
      <?php
       $sql = "SELECT * FROM tb_vehicle WHERE v_status != '2'";
       $result = mysqli_query($con, $sql);

        echo ' <select class="form-select" name="fvec" id="exampleSelect1">';
      

        while($row=mysqli_fetch_array($result))
        {
        	echo"<option value= '".$row['v_reg']."'>".$row['v_model']."</option>";
        }

        echo ' </select>';
      ?>


      

    </div>

    <div class="form-group row">
      
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Pick Up Date</label>
      <input type="date" name="fpdate" class="form-control" id="fpdate" aria-describedby="emailHelp" placeholder="Enter IC Number" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
      <input type="date" name="frdate" class="form-control" id="frdate" placeholder="Enter Your Password" required>
    </div>

    
    <br><br><br><br><br><br>

    
    <button type="submit" class="btn btn-dark">Book</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>

</form>





</div>

 <script>

$("#frdate").change(function () {
    var startDate = document.getElementById("fpdate").value;
    var endDate = document.getElementById("frdate").value;

    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("Return date should be greater than Pick up date!");
        document.getElementById("frdate").value = "";
    }
});

</script>
<?php include 'footermain.php';?>
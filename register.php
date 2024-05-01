<?php include 'headermain.php';?>

<div class="container">
	<br>
<form method="POST" action="registerprocess.php">
  <fieldset>
    <legend>Registration Form</legend>
    <div class="form-group row">
      
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">IC Number</label>
      <input type="text" name="fic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter IC Number" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Create Password</label>
      <input type="password" name="fpwd"class="form-control" id="exampleInputPassword1" placeholder="CREATE a STRONG Password" required>
    </div>

    
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Full Name</label>
      <input type="text" name="fname"class="form-control" id="exampleInputPassword1" placeholder="Enter Your Full Name" required>
    </div>

    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Address</label>
      <textarea name="fadd"class="form-control" id="exampleTextarea" rows="3" placeholder="Enter your Address"></textarea>
     
    </div>

    <div class="form-group">
      <label for="formFile" class="form-label mt-4">Contact Number</label>
      <input type="text" name="fcontact"class="form-control" id="exampleInputPassword1" placeholder="Enter Your Contact Number" required>
    </div>

    <div class="form-group">
      <label for="formFile" class="form-label mt-4">Email</label>
      <input type="text" name="femail"class="form-control" id="exampleInputPassword1" placeholder="Enter Your Email" required>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">License Number</label>
      <input type="text" name="flno"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Valid License Number" required>
    </div>  

 <br><br><br><br><br><br>
    
    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>
<br><br><br><br>
</div>

<?php include 'footermain.php';?>
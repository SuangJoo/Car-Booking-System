<?php include 'headermain.php';?>

<div class="container">
	<br>
	<form method="POST" action="loginprocess.php">
  <fieldset>
    <legend>Login Form</legend>
    <div class="form-group row">
      <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()", 0);
        window.onunload=function(){null;}
      </script>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">IC Number</label>
      <input type="text" name="fic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter IC Number" required>

     
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" name="fpwd"class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" required>
    </div>

    
    <br><br><br><br><br><br>

    
    <button type="submit" class="btn btn-dark">Login</button>
    <button type="reset" class="btn btn-warning">Clear Form</button>
  </fieldset>
</form>
</div>

<?php include 'footermain.php';?>
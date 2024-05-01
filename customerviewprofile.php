<?php 

include 'cbssession.php';
if(!session_id())
{
	session_start();
}

include 'headercustomer.php';
include('dbconnectlocal.php');

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM tb_user WHERE u_id='$uid'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result)
?>

<div class="container rounded bg-white mt-5 mb-5">
  
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><?php echo "<img class='rounded-circle mt-5' width='150px' src='uploads/".$row['u_pic']."'>" ?><span class="font-weight-bold"><?php echo $row['u_name']?></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="u_name" value="<?php echo $row['u_name'] ?>"></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="u_phone" value="<?php echo $row['u_phone'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="u_address" value="<?php echo $row['u_address'] ?>"></div>
                    
                    
                    <div class="col-md-12"><label class="labels">License Number</label><input type="text" class="form-control" name="u_lno" value="<?php echo $row['u_lno'] ?>"></div>

                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="u_email" value="<?php echo $row['u_email'] ?>"></div>
                   
                </div>

               
               
                <div class="mt-5 text-center"><a href="customerprofile.php" class="btn btn-danger" name="upload">Edit</a></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</form>
</div>

<?php include 'footermain.php';?>
<?php

include 'cbssession.php';

if (!session_id())
{
   session_start();
}


include ('dbconnectlocal.php');
include 'headerstaff.php';

$uid = $_SESSION['uid'];
//$week = $_GET['week'];

?>

<div class = "container my-5">
    <br>
        <form method ="POST" action="">
            <fieldset>
                <legend>Search Booking</legend>
                <br>

      <input type="text" placeholder="Search booking ID. Eg: 1" name="search">
      <button type="submit" name="submit" class="btn btn-primary">Search</button>
</fieldset>
</form>
      <div class="container">
<br><h3>Search Booking</h3>
<table class="table table-hover">

   <?php
    if(isset($_POST['submit'])){
        $search=$_POST['search'];
        $sql="SELECT * FROM tb_booking 
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_id ='$search'";

        $query_run = mysqli_query($con, $sql);
        if($query_run){
        if(mysqli_num_rows($query_run)>0){
            echo '<thead>              
                <tr>
                <th>Booking ID</th>
                <th>Vehicle</th>
                <th>Pick Up Date</th>
                <th>Return Date</th>
                <th>Total Price</th>
                <th>Status</th>
        

                </tr>
                </thead>';
               while($rows=mysqli_fetch_assoc($query_run)){
               echo '<tbody>
               <tr>
               <td>'.$rows['b_id'].'</td>
               <td>'.$rows['v_model'].'</td>
               <td>'.$rows['b_pdate'].'</td>
               <td>'.$rows['b_rdate'].'</td>
               <td>'.$rows['b_total'].'</td>
               <td>'.$rows['s_desc'].'</td>
 
               </tr>
               <tbody>';}


            }
            else{
                echo '<h2>Data not found</h2>';
            }
        }
        
    }
    ?>




</table>
</div>








</div>

<?php include 'footermain.php' ?>


<?php
session_start();
include "dbconnection.php";
$regid=$_SESSION['user'];
// echo $regid;
$date = date('y-m-d');  

// echo $date;
mysqli_query($con,"UPDATE tbl_drivinglicense SET `paystatus`='Paid',`date`='$date' WHERE reg_id='$regid';
");

  ?>
<script>
  alert("Paid Successfully");
  </script>
<?php
header("location:driving_bill.php");
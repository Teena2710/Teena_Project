<?php
session_start();
include "dbconnection.php";
$regid=$_SESSION['user'];
$a=mysqli_query($con,"select * from tbl_drivinglicense where reg_id='$regid'");
$ro=mysqli_fetch_array($a);
$b=$ro['driving_id'];


$a=mysqli_query($con,"select * from tbl_duplicatelicense where driving_id='$b'");
// echo $regid;
$date = date('y-m-d');  

// echo $date;
mysqli_query($con,"UPDATE tbl_duplicatelicense SET `paystatus`='Paid',`pay_date`='$date' WHERE driving_id='$b';");

  ?>
<script>
  alert("Paid Successfully");
  </script>
<?php
header("location:duplicate_bill.php");
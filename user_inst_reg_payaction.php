<?php
session_start();
include "dbconnection.php";
$regid=$_SESSION['user'];
// echo $regid;
$date = date('y-m-d');  

// echo $date;
mysqli_query($con,"UPDATE tbl_user_inst_reg SET `paystatus`='Paid',`pay_date`='$date' WHERE regid='$regid';");

  ?>
<script>
  alert("Paid Successfully");
  </script>
<?php
header("location:user_inst_reg_bill.php");
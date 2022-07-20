<?php
session_start();
include "dbconnection.php";
$regid=$_SESSION['user'];
// echo $regid;
$date = date('y-m-d');  

// echo $date;
mysqli_query($con,"UPDATE tbl_ownership SET `paystatus`='Paid',`pay_date`='$date' WHERE reg_id='$regid';
");

  ?>
<script>
  alert("Paid Successfully");
  </script>
<?php
header("location:ownership_bill.php");
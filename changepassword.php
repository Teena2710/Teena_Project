<?php
session_start();
// if(!isset($_SESSION['user']))
// {
// header('location:index.html');
// }
$loginid=$_SESSION['user'];

include('dbconnection.php');

if(isset($_POST['change']))
{
  $cpass=$_POST['cpassword'];
  $npass=$_POST['newpassword'];
  $res=mysqli_query($con,"select * from tbl_login where password='$cpass'") or die(mysqli_error($con));
  $chk=mysqli_num_rows($res);
  if($chk>0)
  {
    mysqli_query($con,"update tbl_login set password='$npass' where login_id='$loginid'") or die(mysqli_error($con));
    echo "<script>alert('Password changed successfully');</script>";
  }
  else
  {
    echo "<script>alert('Current password entered is wrong');</script>";
  }
  

}

?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Change Password</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript">



$(document).ready(function() {
$("form").submit(function() {

var validation = $(this); // Select Form
//var log_type = $("#type");




if (validation.find("[name='cpassword']").val() == '') {
  alert('Enter Current Password');
  return false;
}

if (validation.find("[name='newpassword']").val() == '') {
  alert('Enter New Password');
  return false;
}

if (validation.find("[name='repassword']").val() == '') {
  alert('Enter Confirm New Password');
  return false;
}






alert('Password Changed sucessfully');

$("#myform")[1].reset();
});
});
</script>

</head>
<script>
function pageRedirect() {
window.location.href = "userpanel.php";
}
</script>

    <script type="text/javascript">
function checkpass()
{
if(document.chngpwd.newpassword.value!=document.chngpwd.repassword.value)
{
alert('New Password and Confirm Password field does not match');

return false;
}
return true;
} 

</script>

<body background=white>
    <div class="centerr">
      <h1>Change Password</h1>
      <!-- <?php //echo $_SESSION['msg1'];?><?php //echo $_SESSION['msg1']="";?> -->
      <form method="post" name="chngpwd" action="" onSubmit="return checkpass();">
        
         
        <div class="txt_field">
          <input type="password" name="cpassword" >
          <span></span>
          <label>Current Password</label>
        </div>
        <div class="txt_field">
          <input type="password"  name="newpassword">
          <span></span>
          <label>New Password</label>
        </div>
        <div class="txt_field">
          <input type="password"  name="repassword">
          <span></span>
          <label>Confirm Password</label>
        </div>
        
        <input type="submit" name="change" value="Update Password">
       <!-- <a href="index.html">Home</a>
   <p><a href="logout.php">Logout</a>-->
     
      </form>
    </div>

  </body>
</html>
  
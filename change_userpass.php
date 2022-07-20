<?php
session_start();
include 'dbconnection.php';

if(isset($_SESSION['user']))
    $loginid=$_SESSION['user'];

   
// if(!isset($_SESSION['user']))
// {
// header('location:index.html');
// }
// $loginid=$_SESSION['user'];


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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>RTO  - Regional Transport Authority</title>
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
        <link href="css/style.css" rel="stylesheet">
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
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>RTO</h1>
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 - 5:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

       <!-- Nav Bar Start -->
       <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
                           <!--<a href="service.html" class="nav-item nav-link">Service</a>--> 
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                                <div class="dropdown-menu">
                                   
                                    <a href="drivinglic.php" class="dropdown-item">Driving License</a>
                                    <a href="duplicatelicense.php" class="dropdown-item">Duplicate License</a>
                                    <a href="learnerslicense.php" class="dropdown-item">Learners License</a>
                                    <a href="ownership.php" class="dropdown-item">Ownership Transfer</a>
                                    <a href="renewal.php" class="dropdown-item">Renewal License</a>
                                    <a href="vregistration.php" class="dropdown-item">Vehicle Registration</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Certificates</a>
                                <div class="dropdown-menu">
                                    <a href="affidavit.html" class="dropdown-item">Affidavit Form(English)</a>
                                    <a href="affidavit_mala.html" class="dropdown-item">Affidavit Form(Malayalam)</a>
                                    <a href="driving_user.php" class="dropdown-item">Driving License</a>
                                    <a href="duplicate_user.php" class="dropdown-item">Duplicate License</a>
                                    <a href="ownership_user.php" class="dropdown-item">Ownership Transfer</a>
                                    <a href="renewal_user.php" class="dropdown-item">Renewal License</a>
                                    <a href="vreg_user.php" class="dropdown-item">Vehicle Registration</a>
                                    
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Appointment</a>
                                <div class="dropdown-menu">
                                    <a href="userappointment.php" class="dropdown-item">Appointment</a>
                                    <a href="appointment_status.php" class="dropdown-item">Status</a>
                                    
                                    
                                </div>
                            </div>
                            <!-- <a href="userprofile.php" class="nav-item nav-link">User Profile</a> -->
                            <!-- <a href="userappointment.php" class="nav-item nav-link">Appointment</a> -->
                            <a href="userzone.php" class="nav-item nav-link">Attend Exam</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Institution</a>
                                <div class="dropdown-menu">
                                    <a href="user_inst_reg.php" class="dropdown-item">Institution Registration</a>
                                    <a href="user_inst_status.php" class="dropdown-item">Status</a>
                                    
                                    
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
                                <div class="dropdown-menu">
                                    <a href="userprofile.php" class="dropdown-item">User Profile</a>
                                    <a href="change_userpass.php" class="dropdown-item">Change Password</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                   
                                    
                                </div>
                            </div>
                            <!-- <a href="changepassword.php" class="nav-item nav-link">Change Password</a>
                            <a href="logout.php" class="nav-item nav-link">Logout</a> -->
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        

        

    <div class="centerr">
      <h1 align="center">Change Password</h1>
      <!-- <?php //echo $_SESSION['msg1'];?><?php //echo $_SESSION['msg1']="";?> -->
      <form method="post" name="chngpwd" action="" onSubmit="return checkpass();">
        
         
        <div class="txt_field">
        <label>Current Password</label>
          <input type="password" name="cpassword" style="width:300px;">
          <span></span>
         
        </div><br>
        <div class="txt_field">
        <label>New Password</label>
          <input type="password"  name="newpassword" style="width:300px;">
          <span></span>
          
        </div><br>
        <div class="txt_field">
        <label>Confirm Password</label>
          <input type="password"  name="repassword" style="width:300px;">
          <span></span>
         
        </div><br>
        
        <input type="submit" name="change" value="Update Password" style="
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
   
     
      </form>
    </div>

 
  


     



        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

<?php
session_start();
require("dbconnection.php");
$regid= $_SESSION['user'];
if(isset($_POST['Register']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $house_name=$_POST['house_name'];
  $state=$_POST['state'];
  $district=$_POST['district'];


  $sql=mysqli_query($con,"INSERT INTO `tbl_user_inst_reg` (`regid`,`fname`, `lname`,  `age`, `gender`, `email`, `house_name`,`state`, `district`,`is_approved`) VALUES ('$regid','$fname', '$lname', '$age', '$gender', '$email', '$house_name', '$state','$district', 'NO')") or die(mysqli_error($con));
  if($sql)
    echo "<script>alert('Registered  Successfully');</script>";
}

  
$apiKey="rzp_test_aqdHcuc0AG6Ugo";

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
//   window.history.forward();
//   function noBack() {
//       window.history.forward();
 // }
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
                            <a href="userpanel.php" class="nav-item nav-link active">Home</a>
                            <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
                           <!--<a href="service.html" class="nav-item nav-link">Service</a>--> 
                            
                                    <a href="logout.php" class="nav-item nav-link active">Logout</a>
                                   
                                    
                              
                           
                            <!-- <a href="changepassword.php" class="nav-item nav-link">Change Password</a>
                            <a href="logout.php" class="nav-item nav-link">Logout</a> -->
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>


</head>
<!-- <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_JldVq1f1QPcwmv" async> </script> </form> -->
    <form action="user_inst_reg_payaction.php?id=<?php echo $regid;?>" method="post" style="margin-top:50px;" align="center">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="900000"
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-buttontext="Procced to Pay"
    data-name="RTO-User Institution Registration"
   
    data-image=""
    data-prefill.name=""
  
    data-theme.color="indigo"
></script>

</form> 
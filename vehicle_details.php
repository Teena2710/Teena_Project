<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['vid']))
   $vnum=$_GET['vid'];

//  $vehicle_id=$_SESSION['vehicle_id'];

//$res=mysqli_fetch_array($q);
$sql=mysqli_query($con,"select * from tbl_vehicle_details where vehicle_id='2'") or die(mysqli_error($con));
//echo $sql;
if(isset($_POST['vehicledetails']))
{
    $vehicle_id=$_POST['vehicle_id'];
    $_SESSION['vehicle_id']=$vehicle_id;
    header('location:vehicle_details_pdf.php');
}

if(isset($_POST['submit']))
{
    // $sql=mysqli_query($con,"SELECT * FROM `tbl_vehicle_details`") or die(mysqli_error($con));
    $sbmt=$_POST['submit'];
    $_SESSION['submit']= $sbmt;
  header('location:accident_details_pdf.php');
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Vehicle Number Details</title>
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
    <link href="css/style.css" rel="stylesheet">
    </head>
  <body background="img/log_bg.jpg">
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
                            <a href="number.php"  class="nav-item nav-link active">Home</a>
                           
                           
                            
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                           
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
     
         
       <center>
           <div class="cer">
       <?php

while($row = mysqli_fetch_assoc($sql)) {
?>
        <form method="post" action="" >
            
                 <h1 align="center">Vehicle Details</h1>
                      <div class="txt_field">
                        <input type="text"  value="<?php echo $row['vehicle_no']; ?>" maxlength="50" >
                        <span></span>
                        <label>Vehicle Number</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['vehicle_name']; ?>" maxlength="50" >
                        <span></span>
                        <label>Vehicle Name</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['first_owner']; ?>" maxlength="50" >
                        <span></span>
                        <label>First Owner</label>
                     </div>
                    
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['issurance_policy_no']; ?>" maxlength="50" >
                        <span></span>
                        <label>Issurance Policy Number</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['issurance_company']; ?>" maxlength="50" >
                        <span></span>
                        <label>Issurance Company</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['issurance_validity']; ?>" maxlength="50" >
                        <span></span>
                        <label>Issurance Validity</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['owner_name']; ?>" maxlength="50" >
                        <span></span>
                        <label> Owner Name</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['registering_authority']; ?>" maxlength="50" >
                        <span></span>
                        <label>Registering Authority</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['registration_date']; ?>" maxlength="50" >
                        <span></span>
                        <label>Registration Date</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['vehicle_age']; ?>" maxlength="50" >
                        <span></span>
                        <label>Vehicle Age</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['pucc _No']; ?>" maxlength="50" >
                        <span></span>
                        <label>PUCC No</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['pucc_validity']; ?>" maxlength="50" >
                        <span></span>
                        <label>PUCC Validity</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['tax_validity']; ?>" maxlength="50" >
                        <span></span>
                        <label>Tax Validity</label>
                     </div>
                     <td width=300><form method="post" action="">
                            <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id'];?>">
                     <a href="vehicle_details_pdf.php"><input type="submit" name="vehicledetails"  value="Print"></a>
                     
                     <a href="accident_details_pdf.php"><input type="submit" name="submit" value="Accident Details"></a>
                <?php
                
}
?>
                      
        </body>
</html>
<?php
session_start();
include 'dbconnection.php';

$accident_id=$_SESSION['accident_id'];

$result=mysqli_query($con,"SELECT *  from tbl_accident_details where accident_id=$accident_id") or die(mysqli_error($con));


if(isset($_POST['accidentdetails']))
{
    $accident_id=$_POST['accident_id'];
    $_SESSION['accident_id']=$accident_id;
    header('location:accident_details_pdf.php');
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Accident Details</title>
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
                            <a href="vehicle_details.php"  class="nav-item nav-link active">Home</a>
                           
                           
                            
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

while($row = mysqli_fetch_array($sql)) {
?>
        <form method="post" action="#" >
            
                 <h1 align="center">Accident Details</h1>
                      <div class="txt_field">
                        <input type="text"  value="<?php echo $row['vehicle_no']; ?>" maxlength="50" >
                        <span></span>
                        <label>Vehicle Number</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['fir_no']; ?>" maxlength="50" >
                        <span></span>
                        <label>Fir No</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['time_of_accident']; ?>" maxlength="50" >
                        <span></span>
                        <label>	Time of Accident</label>
                     </div>
                    
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['date_of_accident']; ?>" maxlength="50" >
                        <span></span>
                        <label>Date of Accident</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['name_of_place']; ?>" maxlength="50" >
                        <span></span>
                        <label>Name of Place</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['police_station']; ?>" maxlength="50" >
                        <span></span>
                        <label>Police Station</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['district']; ?>" maxlength="50" >
                        <span></span>
                        <label> District</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['state']; ?>" maxlength="50" >
                        <span></span>
                        <label>State</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['accident_type']; ?>" maxlength="50" >
                        <span></span>
                        <label>Accident Type</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['no_of_persons_killed']; ?>" maxlength="50" >
                        <span></span>
                        <label>No of Persons Killed</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['no_of_persons_injured']; ?>" maxlength="50" >
                        <span></span>
                        <label>No of Persons Injured</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['type_of_collision']; ?>" maxlength="50" >
                        <span></span>
                        <label>Type of Collision</label>
                     </div>
                     <div class="txt_field">
                        <input type="text"   value="<?php echo $row['	speed_limit']; ?>" maxlength="50" >
                        <span></span>
                        <label>Speed Limit</label>
                     </div>
                     <td width=300><form method="post">
                            <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id'];?>">
                    
                     <a href="accident_details_pdf.php"><input type="submit" name="accidentdetails"  value="Print"></a>
                <?php
}
?>
                      
        </body>
</html>
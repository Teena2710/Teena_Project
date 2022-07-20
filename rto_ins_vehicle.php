
<?php
session_start();
include 'dbconnection.php';


$sql=mysqli_query($con,"SELECT fname,lname,ins_name,phone,vname1,mileage1,vname2,mileage2,vname3,mileage3 FROM `tbl_inst_vreg`  order by 'inst_vreg_id' ASC") or die(mysqli_error($con));
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
                            <a href="rtopanel.php"  class="nav-item nav-link active">Home</a>
                            <!-- <button onclick="document.location='drivinglic.php'">Back</button> -->
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
    <h1 align="center">Institution Vehicle  List</h1>
    <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>Name</b></td><td><b>Institution Name</b></td><td><b>Phone</b></td><td><b>LMV Name</b></td><td><b>LMW Mileage </b></td><td><b>MCW/OG Name</b></td><td><b>MCW/OG Mileage</b></td><td><b>MCW/G Name</b></td><td><b>MCW/G Mileage</b></td><td></td></tr>
   
            <?php 
                while($res=mysqli_fetch_array($sql))
                {
                ?><form method="post">
                    <tr>
                                   <!--write all columns res-->
                        <td><?php echo $res['fname']." ".$res['lname'];?></td>
                        <td><?php echo $res['ins_name'];?></td>
                        <td><?php echo $res['phone'];?></td>
                        <td><?php echo $res['vname1'];?></td>
                        <td><?php echo $res['mileage1'];?></td>
                        <td><?php echo $res['vname2'];?></td>
                        <td><?php echo $res['mileage2'];?></td>
                        <td><?php echo $res['vname3'];?></td>
                        <td><?php echo $res['mileage3'];?></td>
                      
                       
                          
                            </form></td>

                    </tr>
                
                <?php
                }
                ?>
        </table>
    </body>
</html>

            
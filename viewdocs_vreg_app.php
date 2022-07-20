<?php
session_start();
include 'dbconnection.php';
$lid=$_SESSION['user'];

// if(isset($_SESSION['vreg_id']))
//     $vreg_id=$_SESSION['vreg_id'];
$res=mysqli_query($con,"select * from tbl_vreg where reg_id=$lid");
$row=mysqli_fetch_array($res);
?>
<?php
if(isset($_POST['vehicle_update']))
{

    $filepath2=pathinfo($_FILES['vimage']['name']) ;
    $extension2=$filepath2['extension'];
    $rd=  rand();
    $vname= $rd.'.'.$extension2;
    $pathinfo2='uploads/'.$vname;
    move_uploaded_file($_FILES['vimage']['tmp_name'],$pathinfo2);

    $sql= mysqli_query($con,"UPDATE tbl_vreg SET `vehicle_img`='$vname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }

}
if(isset($_POST['i_update']))
{

    $filepath23=pathinfo($_FILES['identity_proof']['name']) ;
    $extension23=$filepath23['extension'];
    $rd=  rand();
    $iname= $rd.'.'.$extension23;
    $pathinfo23='uploads/'.$iname;
    move_uploaded_file($_FILES['identity_proof']['tmp_name'],$pathinfo23);

    $sql= mysqli_query($con,"UPDATE tbl_vreg SET `identity_proof`='$iname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }

}
if(isset($_POST['sslc_update']))
{

    $filepath24=pathinfo($_FILES['sslc']['name']) ;
    $extension24=$filepath24['extension'];
    $rd=  rand();
    $sname= $rd.'.'.$extension24;
    $pathinfo24='uploads/'.$sname;
    move_uploaded_file($_FILES['sslc']['tmp_name'],$pathinfo24);

    $sql= mysqli_query($con,"UPDATE tbl_vreg SET `sslc`='$sname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }

}
if(isset($_POST['update']))
{

    echo 'siCXKJN,';
    /*
    $filepath1=pathinfo($_FILES['aadhar']['name']) ;
    $extension1=$filepath1['extension'];
    $rd=  rand();
    $aname= $rd.'.'.$extension1;
    $pathinfo='uploads/'.$aname;
    move_uploaded_file($_FILES['aadhar']['tmp_name'],$pathinfo);

    $sql= mysqli_query($con,"UPDATE tbl_vreg SET `aadhar`='$aname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }
    */

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
                        <button  class="nav-item nav-link active"><a href="vehicle_app.php">Home</a></button>
                            <button  class="nav-item nav-link active"><a href="logout.php" >Logout</a></button>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <center>
            <form method="post" action="" enctype="multipart/form-data">
        <h3>Identity Proof</h3>
        <embed  src="uploads/<?php echo $row['identity_proof']?>" width="300" height="400"/>
        <!-- <img width=500 height=500 src='uploads/<?php echo $row['identity_proof']?>'><br> -->
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current Identity Proof</span>
            <input type="text" name="identity_proof" value="<?php echo $row['identity_proof']; ?>" maxlength="50" required="">
            <input type="file"   name="identity_proof" value=""> 
          </div>
          <input type="submit" name="i_update" value="Update" style="width: 32%;
    margin-left: 50px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;"> 
        <h3>SSLC</h3>
        <!-- <img width=500 height=500 src='uploads/<?php echo $row['sslc']?>'><br> -->
        <embed  src="uploads/<?php echo $row['sslc']?>" width="700" height="500"/>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current SSLC</span>
            <input type="text" name="sslc" value="<?php echo $row['sslc']; ?>" maxlength="50" required="">
            <input type="file"   name="sslc" value=""> 
          </div>
          <input type="submit" name="sslc_update" value="Update" style="width: 32%;
    margin-left: 50px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
  
        <h3>Aadhar</h3>
        <!-- <img width=500 height=500 src='uploads/<?php echo $row['aadhar']?>'><br> -->
        <embed  src="uploads/<?php echo $row['aadhar']?>" width="300" height="400"/>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current Aadhar</span>
            <input type="text" name="aadhar" value="<?php echo $row['aadhar']; ?>" maxlength="50" required="">
            <input type="file"   name="aadhar" value=""> 
          </div>
         
        <input type="submit" name="update" value="Update" style="width: 32%;
    margin-left: 50px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
        <h3>Vehicle Image</h3>
        <!-- <img width=500 height=500 src='uploads/<?php echo $row['vehicle_img']?>'><br> -->
        <embed  src="uploads/<?php echo $row['vehicle_img']?>" width="300" height="400"/>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current Vehicle Image</span>
            <input type="text" name="vimg" value="<?php echo $row['vehicle_img']; ?>" maxlength="50" required="">
            <input type="file"   name="vimage" value=""> 
          </div>
          <input type="submit" name="vehicle_update" value="Update" style="width: 32%;
    margin-left: 50px;
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
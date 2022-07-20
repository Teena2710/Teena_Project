<?php
session_start();
include 'dbconnection.php';
$lid=$_SESSION['user'];
// if(isset($_SESSION['owner_id']))
// $owner_id=$_SESSION['owner_id'];
$res=mysqli_query($con,"select * from tbl_ownership where reg_id=$lid");
$row=mysqli_fetch_array($res);
?>
<?php

if(isset($_POST['update']))
{

    $filepath1=pathinfo($_FILES['aadhar']['name']) ;
    $extension1=$filepath1['extension'];
    $rd=  rand();
    $aname= $rd.'.'.$extension1;
    $pathinfo='uploads/'.$aname;
    move_uploaded_file($_FILES['aadhar']['tmp_name'],$pathinfo);

    $sql= mysqli_query($con,"UPDATE tbl_ownership SET `aadhar`='$aname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }

}
if(isset($_POST['pucc_update']))
{
    $filepath3=pathinfo($_FILES['pucc']['name']) ;
    $extension3=$filepath3['extension'];
    $rd=  rand();
    $pname= $rd.'.'.$extension3;
    $pathinfo3='uploads/'.$pname;
    move_uploaded_file($_FILES['pucc']['tmp_name'],$pathinfo3);

    $sql= mysqli_query($con,"UPDATE tbl_ownership SET pollution='$pname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }
    
}
if(isset($_POST['sslc_update']))
{

    $filepath2=pathinfo($_FILES['sslc']['name']) ;
    $extension2=$filepath2['extension'];
    $rd=  rand();
    $sname= $rd.'.'.$extension2;
    $pathinfo2='uploads/'.$sname;
    move_uploaded_file($_FILES['sslc']['tmp_name'],$pathinfo2);

    $sql= mysqli_query($con,"UPDATE tbl_ownership SET `sslc`='$sname' where reg_id=$lid")
    or die(mysqli_error($con));
    if($sql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
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
        <script>
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
    function ValidateSingleInput(oInput) {
      if (oInput.type == "file") {
          var sFileName = oInput.value;
          if (sFileName.length > 0) {
              var blnValid = false;
              for (var j = 0; j < _validFileExtensions.length; j++) {
                  var sCurExtension = _validFileExtensions[j];
                  if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                      blnValid = true;
                      break;
                  }
              }
              
              if (!blnValid) {
                  alert("Sorry, file is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                  oInput.value = "";
                  return false;
              }
          }
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
                            <!-- <a href="userpanel.php" class="nav-item nav-link active">Home</a> -->
                            <button  class="nav-item nav-link active"><a href="ownership_app.php">Home</a></button>
                            <button  class="nav-item nav-link active"><a href="logout.php" >Logout</a></button>
                            
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <center>
        <form action="viewdocs_owner_app.php" method="POST" enctype="multipart/form-data">
          
        
  
    <h3>Aadhar</h3>
        <embed width=250 height=350 src='uploads/<?php echo $row['aadhar']?>'/><br>
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
        <h3>SSLC</h3>
        <embed width=700 height=500 src='uploads/<?php echo $row['sslc']?>'/><br>
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
        <h3>PUC Certificate</h3>
        <embed width=400 height=500 src='uploads/<?php echo $row['pollution']?>'/><br>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current PUCC</span>
            <input type="text" name="pucc" value="<?php echo $row['pollution']; ?>" maxlength="50" required="">
            <input type="file"   name="pucc" value=""> 
          </div>
        <input type="submit" name="pucc_update" value="Update" style="width: 32%;
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

       


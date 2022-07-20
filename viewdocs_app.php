<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['driving_id']))
    $driving_id=$_SESSION['driving_id'];
$res=mysqli_query($con,"select * from tbl_drivinglicense where driving_id=$driving_id");
$row=mysqli_fetch_array($res);
?>
<?php
$lid=$_SESSION['user'];
if(isset($_POST['update']))
{
    // $filename=$_FILES["aadhar"]["name"];
    // $tempname=$_FILES["aadhar"]["tmp_name"];
    // $pathinfo="uploads/".$filename;
    

    // $sql= mysqli_query($con,"UPDATE tbl_drivinglicense SET `aadhar`='$filename' where `reg_id`='$lid'")
    // or die(mysqli_error($con));
    // if($sql)
    // {
    //    move_uploaded_file($tempname,$pathinfo);
  
    // echo  "<script>
    //  alert('Updated successfully');</script>";
     
    // }
    $filepath1=pathinfo($_FILES['aadhar']['name']) ;
    $extension1=$filepath1['extension'];
    $rd=  rand();
    $aname= $rd.'.'.$extension1;
    $pathinfo='uploads/'.$aname;
    move_uploaded_file($_FILES['aadhar']['tmp_name'],$pathinfo);
    $ql= mysqli_query($con,"UPDATE tbl_drivinglicense SET `aadhar`='$aname' where `reg_id`='$lid'")
     or die(mysqli_error($con));
   
    if($ql)
    {
       
  
    echo  "<script>
     alert('Updated successfully');</script>";
     
    }


}
if(isset($_POST['img_update']))
{

    $filepath=pathinfo($_FILES['file']['name']) ;
    $extension=$filepath['extension'];
      
    $iname= date('H-i-s').'.'.$extension;
    $path='img/'.$iname;
    move_uploaded_file($_FILES['file']['tmp_name'],$path);

    $sql= mysqli_query($con,"UPDATE tbl_drivinglicense SET `image`='$iname' where `reg_id`='$lid'")
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

    $sql= mysqli_query($con,"UPDATE tbl_drivinglicense SET `sslc`='$sname' where `reg_id`='$lid'")
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
                        <button  class="nav-item nav-link active"><a href="driving_app.php">Home</a></button>
                            <button  class="nav-item nav-link active"><a href="logout.php" >Logout</a></button>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <center>
            <form action="viewdocs_app.php" method="post" enctype="multipart/form-data">
            <h3>Image</h3>
        <!-- <img width=500 height=500  src='img/<?php echo $row['image']?>'><br><br> -->
        <embed src="img/<?php echo $row['image']?>" width=250 height=300/>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current Image</span>
            <input type="text" name="file" value="<?php echo $row['16']; ?>" maxlength="50" required="">
            <input type="file"   name="file" value=""> 
          </div>
        <input type="submit" name="img_update" value="Update" style="width: 32%;
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
        <!-- <img width=500 height=500  src='uploads/<?php echo $row['aadhar']?>'><br><br> -->
        <embed src="uploads/<?php echo $row['aadhar']?>" width=250 height=350/>
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
        <embed width=700 height=500 src='uploads/<?php echo $row['sslc']?>'/>
        <div class="input-box" align="center" style="margin-left:50px;">
            <span class="details">Current SSLC</span>
            <input type="text" name="sslc" value="<?php echo $row['18']; ?>" maxlength="50" required="">
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
</form>
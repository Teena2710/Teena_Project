<?php
session_start();
include'dbconnection.php';
$myfile=file("output.txt");
foreach($myfile as $s)
{
    $num= $s;
}
$_SESSION['vno']=$num;
$sql=mysqli_query($con,"SELECT vehicle_id FROM `tbl_vehicle_details` where vehicle_no='HR26 BP3543' or vehicle_no='H982 FKL' ") or die(mysqli_error($con));
//echo $sql;
$res=mysqli_fetch_array($sql);
 if(isset($_POST['submit']))
{
    // $sql=mysqli_query($con,"SELECT * FROM `tbl_vehicle_details`") or die(mysqli_error($con));
    // $sbmt=$_POST['submit'];
    // $_SESSION['submit']= $sbmt; 
    $_SESSION['vid']=$res['vehicle_id']; 
  header('location:vehicle_details.php');
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
    <style>
            button {
    width: 82%;
    margin-left: 35px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
}
</style>

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
                            <a href="rtopanel.php"  class="nav-item nav-link active">Home</a>
                           
                           
                            
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                           
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
  <!-- <Button onclick="history.back()" align="left" style=" background-color:	#BBC4C2;   height:35px;">Go back!</button> -->
<div class="ce">
      <h1>Vehicle Details</h1>
   
      <form action="" method="post" >
      <div class="txt_field">

        <input type="text" value="<?php $myfile=file("output.txt");
foreach($myfile as $s)
{
    echo $s;
}?>"   name="vno"  > 
	      <span></span>
        <label>Vehicle no</label>
      </div>
     
         <a href="vehicle_details.php?vid=<?php echo $s ?>"  > <input type="submit" name="submit"  value="Submit"></a>
           
   
         
        </form>
    
      </div>
      
        
   
</body>
</html>
<?php
session_start();
include'dbconnection.php';
if(!isset($_SESSION['user']))
{
header('location:index.html');
}
$regid=$_SESSION['user'];

if(isset($_POST['verifyemail']))
{
  $user=$_POST['email'];
  $q=mysqli_query($con,"select * from tbl_register where email='$user'");
  $count=mysqli_num_rows($q);
  if($count>0)
  {
    $otp=rand(100000,999999);
    $_SESSION['check']=$otp;
    $to      = $user;
    $subject = 'Email Verification';
    $message = 'For requesting your services, you have to enter this verification code when prompted:  '.$otp;
    $headers = 'From: RTO <teenarose2403@gmail.com>'       . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

    $result=mail($to, $subject, $message, $headers);
    if($result)
    {
      mysqli_query($con,"insert into tbl_drivinglicense(reg_id,email)values('$regid','$user')");

      echo "<script>alert('Mail Send Successfully');window.location.href='drivinglic_2.php';</script>";     
    }
    else
    {
      echo "<script>alert('Something went wrong...');</script>";
     
    }
  }
  else
  {
    echo "<script>alert('Email not found');</script>";
  }
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Driving License </title>
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
 
    <style>
            button {
    width: 85%;
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
  <body background=white>

    <div class="centerotp">
      <h1>Driving License</h1>
   
      <form action="" method="post" >
        <div class="txt_field">
           
            <input type="text" name="email" > 
	    <span></span>
            <label>Email</label>
	</div>
            <input type="submit" name="verifyemail"  value="Verify">
         
        </form>
        <button onclick="document.location='userpanel.php'">Back</button>
      </div>

        
        
      </form>
    

      
    
</body>
</html>
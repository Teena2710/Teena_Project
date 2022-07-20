<?php
session_start();
require("dbconnection.php");
 $chk=$_SESSION['check'];
if(isset($_POST['otpverify']))
{
  $enteredotp=$_POST['enteredotp'];
  if($enteredotp == $chk)
  {
    echo "<script>alert('email verified');window.location.href='duplicatelicense_verified.php';</script>";
  }
  else{
    echo "<script>alert('invalid otp');</script>";

  }

}



?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Duplicate License</title>
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
      <h1>Duplicate License</h1>
   
      <form action="" method="post" >
        <div class="txt_field">
           
            <input type="text" name="enteredotp"  >  
	    <span></span>
            <label>Enter otp received</label>
	</div>
            <input type="submit" name="otpverify"  value="Verify">
         
        </form>
        <button onclick="document.location='duplicatelicense.php'">Back</button>
    </div>
      
  
  

</body>
</html>
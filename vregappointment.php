<?php
session_start();
require("dbconnection.php");
// $chk=$_SESSION['check'];
$date=date('Y-m-d');
if(isset($_SESSION['vehicle_id']))
{
 
  $vid= $_SESSION['vehicle_id'];
  $sql=mysqli_query($con,"select * from tbl_vreg where vreg_id=$vid") or die(mysqli_error($con));
  $row=mysqli_fetch_array($sql);
}
if(isset($_POST['submit'])){
  $applno=$_POST['applno'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $user=$row['email'];
  
  
  $to      = $user;
  $subject = 'Appointment Details - Vehicle Registration';
  $message = 'Your application no for vehicle registration:  '.$applno."\n".'Reporting Date: '.$date."\n".' Reporting Time: '.$time;
  $headers = 'From: RTO <teenarose2403@gmail.com>'       . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

  $result=mail($to, $subject, $message, $headers);
  if($result)
  {
    //mysqli_query($con,"insert into tbl_drivinglicense(reg_id,email)values('$regid','$user')");

    echo "<script>alert('Mail Send Successfully');window.location.href='vregappointment.php';</script>";     
  }
  else
  {
    echo "<script>alert('Something went wrong...');</script>";
   
  }
}


?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Vehicle Registration</title>
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
    <!-- <link href="css/style1.css" rel="stylesheet"> -->
    <link href="css/style2.css" rel="stylesheet">
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
<script>
 function tim(){
  if (document.getElementById('time').value =="" )
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Please enter time';
		}

 }
 </script>   
  </head>
  <body >
    <!-- Nav Bar Start -->
     <!-- <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="rto_vreg.php"  class="nav-item nav-link active">Home</a>
                           
                           
                            
                            <a href="logout.php" class="nav-item nav-link">Logout</a>
                           
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>   -->
        <!-- Nav Bar End -->
  <!-- <Button onclick="history.back()" align="left" style=" background-color:	#BBC4C2;   height:35px;">Go back!</button> -->
<!-- <div class="center">
      <h1>Vehicle Registration Appointment</h1>
   
      <form action="" method="post" >
      <div class="txt_field">
        <input type="text" value="<?php //echo $row['reg_id'];?>" name="applno"  > 
	      <span></span>
        <label>Application no</label>
      </div>
      <div class="txt_field">
      <input type="text"  name="time" id="time" onkeyup="tim();"placeholder="HH:MM AM/PM" pattern="^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$" required>
	      <span id="message"></span>
        <label>Enter Time</label>
      </div>
      <div class="txt_field">
        <input type="text" value="<?php //echo $date;?>" name="date"  > 
	      <span></span>
        <label>Enter Date</label>
      </div>
            <input type="submit" name="submit"  value="Submit">
           
   
         
        </form>
    
      </div>
       -->

       <div class="cont">
    <div class="title"><b>Vehicle Registration Appointment<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Application no</span>
            <input type="text" value="<?php echo $row['reg_id'];?>" name="applno"> 
          </div>
          <div class="input-box">
            <span class="details" id="message">Enter Time</span>
            <input type="text" name="time" id="time" onkeyup="tim();"placeholder="HH:MM AM/PM" pattern="^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$" required>  
          </div><br/>
          <div class="input-box">
            <span class="details">Enter Date</span>
            
            <input  type="text" value="<?php echo $date;?>" name="date"  >  
           
          </div>
         
          
          
          </div><br>
          <input type="submit" name="submit"  value="Submit" style="width: 82%;
    margin-left: 35px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;"><br><br>
    <A href="rto_vreg.php"><input type="submit" name="submit"  value="Back" style="width: 82%;
    margin-left: 35px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
         
        </div>
      
        
   
</body>
</html>
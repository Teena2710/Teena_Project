<?php
session_start();
require("dbconnection.php");
// $chk=$_SESSION['check'];
$date=date('Y-m-d');
if(isset($_SESSION['dupid']))
{
 
  $dupid= $_SESSION['dupid'];
  // echo $dupid;
  $sql=mysqli_query($con,"SELECT * FROM `tbl_duplicatelicense` join tbl_drivinglicense on tbl_duplicatelicense.driving_id=tbl_drivinglicense.driving_id where tbl_duplicatelicense.dup_id=$dupid;") or die(mysqli_error($con));
  $row=mysqli_fetch_array($sql);
}

if(isset($_POST['submit'])){
  $applno=$_POST['applno'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $user=$row['email'];
  
  
  $to      = $user;
  $subject = 'Appointment Details - Duplicate License';
  $message = 'Your application no for duplicate license:  '.$applno."\n".'Reporting Date: '.$date."\n".' Reporting Time: '.$time;
  $headers = 'From: RTO <teenarose2403@gmail.com>'       . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

  $result=mail($to, $subject, $message, $headers);
  if($result)
  {
    //mysqli_query($con,"insert into tbl_drivinglicense(reg_id,email)values('$regid','$user')");

    echo "<script>alert('Mail Send Successfully');window.location.href='duplicateappointment.php';</script>";     
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
  <body background="img/log_bg.jpg">
    
<!-- <div class="center">
      <h1>Duplicate License Appointment</h1>
   
      <form action="" method="post" >
      <div class="txt_field">
        <input type="text" value="<?php echo $row['reg_id'];?>" name="applno"  > 
	      <span></span>
        <label>Application no</label>
      </div>
      <div class="txt_field">
      <input type="text"  name="time" id="time" onkeyup="tim();"placeholder="HH:MM AM/PM" pattern="^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$" required>
	      <span id="message"></span>
        <label>Enter Time</label>
      </div>
      <div class="txt_field">
        <input type="text" value="<?php echo $date;?>" name="date"  > 
	      <span></span>
        <label>Enter Date</label>
      </div>
            <input type="submit" name="submit"  value="Submit">
           
   
         
        </form>
        
      </div>
       -->
       <div class="cont">
    <div class="title"><b>Duplicate License Appointment<b></div>
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
    <A href="rto_duplicatelic.php"><input type="submit" name="submit"  value="Back" style="width: 82%;
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
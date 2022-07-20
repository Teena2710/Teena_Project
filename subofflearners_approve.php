<?php
session_start();
require("dbconnection.php");

$date=date('Y-m-d');
if(isset($_SESSION['lid']))
{
 
  $reid= $_SESSION['lid'];
  $sql=mysqli_query($con,"select * from tbl_learners_reg where learners_id=$reid") or die(mysqli_error($con));
  $row=mysqli_fetch_array($sql);
}
if(isset($_POST['submit'])){
  $learners_id=$_POST['learners_id'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $user=$row['email'];
  
  
  $to      = $user;
  $subject = 'Exam Details - Learners License';
  $message = 'Your application no for Learners license:  '.$learners_id."\n".'Exam Date: '.$date."\n".' Exam Time: '.$time;
  $headers = 'From: RTO <teenarose2403@gmail.com>'       . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

  $result=mail($to, $subject, $message, $headers);
  if($result)
  {
    //mysqli_query($con,"insert into tbl_drivinglicense(reg_id,email)values('$regid','$user')");

    echo "<script>alert('Mail Send Successfully');window.location.href='subofflearners_approve.php';</script>";     
  }
  else
  {
    echo "<script>alert('Something went wrong...');</script>";
   
  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  -Learners Approval</title>
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
      function tim()
	{
		if (document.getElementById('time').value =="" )
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Please enter date';
		}
		
	}

      </script>
  </head>
  <body background="img/log_bg.jpg">

   
       <div class="cont">
    <div class="title"><b>Learners License Approval<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Application no</span>
            <input type="text" value="<?php echo $row['learners_id'];?>" name="learners_id"> 
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
    <A href="rto_renewal.php"><input type="submit" name="submit"  value="Back" style="width: 82%;
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
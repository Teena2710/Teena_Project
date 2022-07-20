<?php
session_start();
require("dbconnection.php");

$date=date('Y-m-d');
$rid= $_SESSION['user']; 
  $sql=mysqli_query($con,"select * from tbl_register where reg_id=$rid") or die(mysqli_error($con));
  $row=mysqli_fetch_array($sql);


  if(isset($_POST['submit']))
  {
    $appl_no=$row['reg_id'];
    $app_name=$_POST['appname'];
    $name=$_POST['name'];
    $date=$_POST['date'];
   
  
    $sql=mysqli_query($con,"INSERT INTO `tbl_appointment` ( `application_no`, `application_name`, `name`, `date`,`is_approved`)VALUES('$appl_no', '$app_name', '$name', '$date', 'NO')") or die(mysqli_error($con));
    if($sql)
      echo "<script>alert('Registered Successfully');window.location.href='userpanel.php';</script>";
  }

  if(isset($_POST['back'])){
    echo"<script type='text/javascript'>
    location='userpanel.php';
    </script>";
  }  
  

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - User Appointment</title>
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
<script type="text/javascript">
$(document).ready(function() {
  $("form").submit(function() {

    var validation = $(this); // Select Form
    //var log_type = $("#type");


    

    

    if (validation.find("[name='app_name']").val() == '') {
      alert('Please Select Application Name');
      return false;
    }

    if (validation.find("[name='name']").val() == '') {
      alert('Enter  Applicant Name');
      return false;
    } 

   
   
    alert('You registered sucessfully');

    $("#myform")[1].reset();
  });
});
</script>

</head>
<script>
function pageRedirect() {
	window.location.href = "userappointment.php";
}
</script> 
  </head>
  <body background="img/log_bg.jpg">
 
    

   
  <!-- <Button onclick="history.back()" align="left" style=" background-color:	#BBC4C2;   height:35px;">Go back!</button> -->
<!-- <div class="center">
      <h1>Renew Appointment</h1>
   
      <form action="" method="post" >
      <div class="txt_field">
        <input type="text" value="<?php //echo $row['reg_id'];?>" name="applno"  > 
	      <span></span>
        <label>Application no</label>
      </div>
      <div class="txt_field">
        <input type="time"  name="name" > 
	      <span></span>
        <label>Enter Name</label>
      </div>
      <div class="txt_field">
        <input type="text" name="email"  > 
	      <span></span>
        <label>Enter Email</label>
      </div>
            <input type="submit" name="submit"  value="Submit">
           
   
         
        </form>
       
      </div>
       -->
        
       <div class="cont">
    <div class="title"><b>Renew Appointment<b></div>
    <br/> <br> 
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Application no</span>
            <input type="text" value="<?php echo $row['reg_id'];?>" name="applno"> 
          </div>
          <div class="input-box">
            <span class="details" id="message"><label for="appname">Enter Application Name</label></span>
           
             <!-- <input name="appname" id="appname" onkeyup="app_name();">   -->
            <select name="appname" id="appname"  onkeyup="app_name();" style="  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  height: 50px;
  width: 425px;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;">
              <option value="Select" >Select</option>
              <option value="Driving License">Driving License</option>
              <option value="Duplicate License">Duplicate License</option>
              <option value="Ownership Transfer">Ownership Transfer</option>
              <option value="Renewal License">Renewal License</option>
              <option value="Vehicle Registration">Vehicle Registration</option>
              <select>
          </div>
          <div class="input-box" id="message2">
            <span class="details">Enter Name</span>
            <input  type="text" value="" name="name" id="name" onkeyup="Name();" >  
           
          </div>
          <div class="input-box">
            <span class="details">Enter Date</span>
            
            <input  type="text" value="<?php echo $date;?>" name="date"  >   
           
          </div>
          
         
          
          
          </div>
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
    outline: none;"><br>
    <a href="userpanel.php"><input type="submit" name="back"  value="Back" style="width: 82%;
    margin-left: 35px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;"></a>
         
        </div>
      
</body>
</html>
<?php
session_start();
require("dbconnection.php");
$regid= $_SESSION['user'];

if(isset($_POST['apply']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $leave_type=$_POST['leave_type'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];
  $leave_session=$_POST['leave_session'];
  $date=date('Y-m-d');

  
  $sql=mysqli_query($con,"INSERT INTO `tbl_leave` (`reg_id`,`first_name`, `last_name`,  `leave_type`, `start_date`, `end_date`, `leave_session`,`applied_on`,`is_approved`) VALUES ('$regid','$fname', '$lname', '$leave_type', '$start_date', '$end_date', '$leave_session', '$date', 'NO')") or die(mysqli_error($con));
  if($sql)
    echo "<script>alert('Applied Successfully');</script>";
}

  

if(isset($_POST['back']))
{
    
    header('location:instructorpanel.php');
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Leave</title>
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

 </script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" ></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"  rel="stylesheet">
    <script>
$(document).ready(function (){
  var minDate=new Date();
$("#start_date").datepicker({
  showAnim:'drop',
  numberOfMonth:1,
  minDate: minDate,
  dateFormat:'dd/mm/yy',
  onClose:function(selectedDate){
$('#start_date').datepicker("option","minDate",selectedDate);

  }
});

$("#end_date").datepicker({
  showAnim:'drop',
  numberOfMonth:1,
  minDate: minDate,
  dateFormat:'dd/mm/yy',
  onClose:function(selectedDate){
$('#end_date').datepicker("option","minDate",selectedDate);

  }
});
});
    </script>
  </head>
  <body background=white>


      <div class="leave">
    <div class="title"><b>Apply Leave<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" value="" name="fname" id="fname" required autofocus autocomplete = "off" required onchange ="ValidName();"> 
            <span id="msg1" style="color:red;"></span>
                        <script>        
                            function ValidName() 
                            {
                                var val = document.getElementById('fname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
                                                document.getElementById('fname').value = "";
                                    return false;
                                }
                            document.getElementById('msg1').innerHTML=" ";
                                return true;
                            }
                            </script> 
          </div>
          <div class="input-box">
            <span class="details" >Last Name</span>
            <input type="text"  value="" name="lname" id="lname" required autofocus autocomplete = "off" required onchange ="Validlname();"> 
            <span id="msg2" style="color:red;"></span>
                        <script>        
                            function Validlname() 
                            {
                                var val = document.getElementById('lname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg2').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
                                                document.getElementById('lname').value = "";
                                    return false;
                                }
                            document.getElementById('msg2').innerHTML=" ";
                                return true;
                            }
                            </script> 
         
          </div>
          <div class="input-box">
            <span class="details" >Leave Type</span>
        <select name="leave_type" name="leave_type" style="height:45px;width:430px;" required>
        <option value="Select">Select</option>
          <option value="Sick Leave">Sick Leave</option>
          <option value="Hospitalisation Leave">Hospitalisation Leave</option>
          <option value="Maternity Leave">Maternity Leave</option>
          <option value="Emergency Leave">Emergency Leave</option>
          <option value="Other">Other</option>
        
        </select>
          
          </div>
          <div class="input-box">
            <span class="details" >Start Date</span>
            <input type="text"  value="" name="start_date" id="start_date" required>  
          </div>
          <div class="input-box">
            <span class="details" >End Date</span>
            <input type="text"  value="" name="end_date" id="end_date" required>  
          </div>
          <div class="input-box">
            <span class="details" >Session</span>
            <select name="leave_session" name="leave_session" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
          <option value="FN">FN</option>
          <option value="AN">AN</option>
          <option value="Full Day">Full Day</option>
          </div><br>
         
        

          </div><br><br/><br/>
          <input type="submit" name="apply"  value="Apply" style="width: 190%;
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
   
    <A href="instructorpanel.php"><input name="back"  value="Back" style="width: 190%;
    margin-left: 35px;
    height: 50px;
    border: 1px solid;
    text-align:center;
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

<?php
include 'dbconnection.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $paddress=$_POST['paddress'];
  $phone=$_POST['phone_no'];
  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $repass=$_POST['repass'];

  mysqli_query($con,"insert into tbl_inst_register(fname,lname,gender,email,paddress,license_type,phone_no,username,password,repassword)values('$fname','$lname','$gender','$email','$paddress','$license_type','$phone','$username','$pass','$repass')");
$last_id=mysqli_insert_id($con);
mysqli_query($con,"insert into tbl_login values($last_id, '$username','$pass','instructor','4')") or die(mysqli_error($con));

  header('location:login.php');




}


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Ownership Transfer License</title>
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
    
    <script type="text/javascript">
$(document).ready(function() {
  $("form").submit(function() {

    var validation = $(this); // Select Form
    //var log_type = $("#type");


    if (validation.find("[name='fname']").val() == '') {
      alert('Enter First Name');
      return false;
    }
   
    if (validation.find("[name='lname']").val() == '') {
      alert('Enter Last Name');
      return false;
    }

    if (validation.find("[name='gender']").val() == '') {
      alert('Enter Gender');
      return false;
    }

    if (validation.find("[name='email']").val() == '') {
      alert('Enter  a Valid email id');
      return false;
    }

    if (validation.find("[name='paddress']").val() == '') {
      alert('Enter  a Valid Permanent Address');
      return false;
    }

    if (validation.find("[name='license_type']").val() == '') {
      alert('Enter  a License Type');
      return false;
    } 

    if (validation.find("[name='phone']").val() == '') {
      alert('Enter a Valid Phone number');
      return false;
    }

    if (validation.find("[name='username']").val() == '') {
      alert('Enter a Username');
      return false;
    }
    if (validation.find("[name='pass']").val() == '') {
      alert('Enter a password');
      return false;
    }
    
    if (validation.find("[name='repass']").val() == '') {
      alert('Enter confirm password');
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
	window.location.href = "userpanel.php";
}
</script>
   
  </head>
  <body background="img/log_bg.jpg">
   
  <div class="container">
    <div class="title"><b>Ownership Transfer Registration<b></div>
    <br />
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" value=""> 
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" value="">  
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input id="age" type="text" name="age"  value="">  
          </div>
          <div class="input-box">
            <span class="details" style='color:#0096FF'>Gender</span>&nbsp;&nbsp;&nbsp; 
            <input type="radio" name="gender" value="Male"  >   Male
            <input type="radio" name="gender" value="Female" > Female
            <input type="radio" name="gender" value="other"> Other
            
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email"  value=""> 
	    
          </div>
          <div class="input-box">
            <span class="details">Permanent Address</span>
            <input type="text" name="paddress" value=""> 
          </div>
        
        
          
          <div class="input-box">
            <span class="details">License Type</span>
            <input type="text" name="license_type" value=""> 
	    
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone_no" value=""> 
	    
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" value=""> 
	    
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="pass" value=""> 
	    
          </div>
          <div class="input-box">
            <span class="details">Retype Password</span>
            <input type="text" name="repass" value=""> 
	    
          </div>
        </div>
        
          <input type="submit" name="register"  value="Register">
        
      </form>
    </div>
  </div>

</body>
</html>
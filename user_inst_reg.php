<?php
session_start();
require("dbconnection.php");
$regid= $_SESSION['user'];
if(isset($_POST['Register']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $house_name=$_POST['house_name'];
  $state=$_POST['state'];
  $district=$_POST['district'];


  $sql=mysqli_query($con,"INSERT INTO `tbl_user_inst_reg` (`regid`,`fname`, `lname`,  `age`, `gender`, `email`, `house_name`,`state`, `district`,`is_approved`,`paystatus`) 
  VALUES ('$regid','$fname', '$lname', '$age', '$gender', '$email', '$house_name', '$state','$district', 'NO','Unpaid')") or die(mysqli_error($con));
  if($sql)
    echo "<script>alert('Registered  Successfully');</script>";
}

  

if(isset($_POST['back']))
{
    
    header('location:userpanel.php');
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Institution Registration</title>
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
   function check()
	{
		if (document.getElementById('age').value < 18 || document.getElementById('age').value > 50)
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Age should be between 18 and 50';
		}
		else
		{
			document.getElementById('message').style.color = '';
			document.getElementById('message').innerHTML = '';

		}
	}
  </script>

  </head>
  <body background=white>


      <div class="userinst">
    <div class="title"><b>Institution Registration<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="user_inst_reg_pay.php" method="post" >
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
            <span class="details" >Age</span>
            <input id="age" type="text" name="age" onkeyup="check();" value="">  
            <span id='message'></span> 
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <input type="radio" name="gender" value="Male"  style="height: 15px;"  >   Male
                      <input type="radio" name="gender" value="Female"  style="height: 15px;" > Female
                      <input type="radio" name="gender" value="other"  style="height: 15px;" > Other
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" value="" name="email"  id="email" required autofocus autocomplete = "off" required onchange ="ValidEmail();"> 
	    <span class="details">Verifed</span>
      <span id="msg6" style="color:red;"></span>
      <script>       
      function ValidEmail() 
                            {
                                var val = document.getElementById('email').value;

                                if (!val.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) 
                                {
                                    document.getElementById('msg6').innerHTML="Enter a Valid Email";
                                    
                                        document.getElementById('email').value = "";
                                    return false;
                                }
                            document.getElementById('msg6').innerHTML=" ";
                                return true;
                            }
                           </script> 
          </div> 
          <div class="input-box">
            <span class="details">House Name</span>
            <input type="text" value="" name="house_name"  id="house_name" required autofocus autocomplete = "off" required onchange ="Validpaddr();">
            <span id="msg4" style="color:red;"></span>
                        <script>        
                            function Validpaddr() 
                            {
                                var val = document.getElementById('paddr').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{1,}$/)) 
                                {
                                    document.getElementById('msg4').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid House Name!!";
                                                document.getElementById('paddr').value = "";
                                    return false;
                                }
                            document.getElementById('msg4').innerHTML=" ";
                                return true;
                            }
                            </script>    
          </div> 
          <div class="input-box">
            <span class="details" >State</span>
        <select name="state" name="state" style="height:45px;width:430px;" required>
       
          <option value="Select">Select</option>
          <option value="Kerala">Kerala</option>
        
        </select>
          
          </div>
         
          <div class="input-box">
            <span class="details" >District</span>
            <select name="district" name="district" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
            <option value="Alappuzha">Alappuzha</option>
            <option value="Ernakulam">Ernakulam</option>
             <option value="Idukki">Idukki</option>
            <option value="Kannur">Kannur</option>
            <option value="Kasaragod">Kasaragod</option>
            <option value="Kollam">Kollam</option>
            <option value="Kottayam">Kottayam</option>
            <option value="Kozhikode">Kozhikode</option>
             <option value="Malappuram">Malappuram</option>
             <option value="Palakkad">Palakkad</option>
             <option value="Pathanamthitta">Pathanamthitta</option>
             <option value="Thiruvananthapuram">Thiruvananthapuram</option>
             <option value="Thrissur">Thrissur</option>
             <option value="Select">Wayanad</option>

          </div><br>
         
        

          </div><br><br/><br/>
          <input type="submit" name="Register"  value="Register" style="width: 190%;
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
   
    <A href="userpanel.php"><input name="back"  value="Back" style="width: 190%;
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

<?php
session_start();
$regid= $_SESSION['user'];
require("dbconnection.php");
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $pname=$_POST['pname'];
  $email=$_POST['email'];
  $house_name=$_POST['house_name'];
  $state=$_POST['state'];
  $district=$_POST['district'];
  $phone_no=$_POST['phone_no'];
  $license_type=$_POST['license_type'];
  $blood=$_POST['blood'];


  $filepath=pathinfo($_FILES['file']['name']) ;
  $extension=$filepath['extension'];
    
  $iname= date('H-i-s').'.'.$extension;
  $path='img/'.$iname;
  move_uploaded_file($_FILES['file']['tmp_name'],$path);
  
  // $sql=mysqli_query($con,"INSERT INTO `tbl_learners_reg` ( `first_name`, `last_name`, `age`, `gender`, `parent_name`, `email`,`paddress`, `caddress`,  `phone_no`, `license_type`, `blood`,`image`,`aadhar`,`sslc`,`is_approved`) VALUES ('$regid', '$fname', '$lname', '$age', '$gender','$pname', '$paddress', '$caddress', '$email', '$phone', '$ltype', '$isdate', '$exdate', '$blood','$iname','$aname','$sname','NO')") or die(mysqli_error($con));


  $filepath1=pathinfo($_FILES['aadhar']['name']) ;
  $extension1=$filepath1['extension'];
  $rd=  rand();
  $aname= $rd.'.'.$extension1;
  $pathinfo='uploads/'.$aname;
  move_uploaded_file($_FILES['aadhar']['tmp_name'],$pathinfo);
  
  $filepath2=pathinfo($_FILES['sslc']['name']) ;
  $extension2=$filepath2['extension'];
  $rd=  rand();
  $sname= $rd.'.'.$extension2;
  $pathinfo2='uploads/'.$sname;
  move_uploaded_file($_FILES['sslc']['tmp_name'],$pathinfo2);
  
 $sql= mysqli_query($con,"insert into tbl_learners_reg(regid,fname,lname,age,gender,pname,email,house_name, state,district,phone_no,license_type,blood,`image`,`aadhar`,`sslc`,`is_approved`,`paystatus`)values($regid,'$fname','$lname','$age','$gender','$pname','$email','$house_name', '$state','$district','$phone_no','$license_type','$blood','$iname','$aname','$sname','NO','Unpaid')");
  if($sql)
    echo "<script>alert('Registered Successfully');</script>";


//   header('location:learnerslicense.php');

// 
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
    <title>RTO  - Learners License</title>
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
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
    function ValidateSingleInput(oInput) {
      if (oInput.type == "file") {
          var sFileName = oInput.value;
          if (sFileName.length > 0) {
              var blnValid = false;
              for (var j = 0; j < _validFileExtensions.length; j++) {
                  var sCurExtension = _validFileExtensions[j];
                  if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                      blnValid = true;
                      break;
                  }
              }
              
              if (!blnValid) {
                  alert("Sorry, file is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                  oInput.value = "";
                  return false;
              }
          }
      }
      return true;
    }

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
  function blood()
	{
		if (document.getElementById('blood').value =="")
		{
			document.getElementById('msg9').style.color = 'red';
			document.getElementById('msg9').innerHTML = 'Enter a valid blood group';
		}
		else
		{
			document.getElementById('msg9').style.color = '';
			document.getElementById('msg9').innerHTML = '';

		}
	}
 
 
 </script>
  </head>
  <body background="img/log_bg.jpg">


      <div class="alum">
    <div class="title"><b>Learners License Registration<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="learners_pay.php" method="post"  enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" value="" name="fname"  id="fname" required autofocus autocomplete = "off" required onchange ="ValidName();"> 
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
            <input type="text"  value="" name="lname"id="lname" required autofocus autocomplete = "off" required onchange ="Validlname();"> 
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
            <span class="details" >Gender</span>
            <input style="height: 15px;"  type="radio" name="gender" value="Male"  >   Male
            <input style="height: 15px;"  type="radio" name="gender" value="Female" > Female
            <input style="height: 15px;" type="radio" name="gender" value="other"> Other 
          </div>
          <div class="input-box">
            <span class="details" >Parent Name</span>
            <input type="text"  value="" name="pname"  id="pname" required autofocus autocomplete = "off" required onchange ="Validpname();"> 
            <span id="msg3" style="color:red;"></span>
                        <script>        
                            function Validpname() 
                            {
                                var val = document.getElementById('pname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg3').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
                                                document.getElementById('pname').value = "";
                                    return false;
                                }
                            document.getElementById('msg3').innerHTML=" ";
                                return true;
                            }
                            </script> 
          </div>
          <div class="input-box">
            <span class="details">House Name</span>
            <input type="text" name="house_name" value="" id="house_name" required autofocus autocomplete = "off" required onchange ="Validhouse_name();">
            <span id="msg4" style="color:red;"></span>
                        <script>        
                            function Validhouse_name() 
                            {
                                var val = document.getElementById('house_name').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{1,}$/)) 
                                {
                                    document.getElementById('msg4').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid  House Name!!";
                                                document.getElementById('house_name').value = "";
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
                          </select>
          </div> 
          <div class="input-box">
            <span class="details" >Email</span>
            <input type="text"  value="" name="email" value=""  id="email" required autofocus autocomplete = "off" required onchange ="ValidEmail();"> 
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
            <span class="details" >Phone Number</span>
            <input type="text"  value="" name="phone_no" id="ph" required autofocus autocomplete = "off" required onchange="ValidPhone();">
                        <span id="msg7" style="color:red;"></span>
			
                            <script>
                            function ValidPhone() 
                            {
                                var val = document.getElementById('ph').value;
                            
                                if (!val.match(/^[0-9]{10}$/))
                                {
                                    document.getElementById('msg7').innerHTML="Only Numbers are allowed and must contain 10 number";
                                
                                    
                                                document.getElementById('ph').value = "";
                                    return false;
                                }
                            document.getElementById('msg7').innerHTML=" ";
                                return true;
                            }
                            </script> 
          </div>
         
            
        <div class="input-box">
        <span class="details" >Class of Vehicle</span>
        <select name="license_type" name="license_type" style="height:45px;width:430px;" required>
        <option value="Select">Select</option>
          <option value="MCW/OG-Motor cycle without gear">MCW/OG-Motor cycle without gear</option>
          <option value="MCW/OG-Motor cycle with gear">MCW/OG-Motor cycle with gear</option>
          <option value="Three wheeler">Three wheeler</option>
          <option value="LMV-Light Motor vehicle">LMV-Light Motor vehicle</option>
          <option value="LMV-Light Motor vehicle">LMV-Light Motor vehicle and MCW/OG-Motor cycle without gear</option>
          <option value="LMV-Light Motor vehicle">LMV-Light Motor vehicle and MCW/OG-Motor cycle with gear</option>
</select>
          
          </div>
          <div class="input-box">
            <span class="details" >Blood</span>
            <input type="text" name="blood"  id="blood" onkeyup="blood();" value="" required>  
            <span id='msg9'></span>   
          </div>
          <div class="input-box">
            <span class="details" >Image</span>
            <input type="file" onchange="ValidateSingleInput(this);"  name="file" value="" required>  
          </div>
          <div class="input-box">
            <span class="details" >Aadhar</span>
            <input type="file"  name="aadhar" value="" required>  
          </div>
          <div class="input-box">
            <span class="details" >SSLC</span>
            <input type="file"  name="sslc" value="" required> 
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
    outline: none;"><br>
    <A href="userpanel.php"><input  name="back"  value="Back" style="width: 82%;
    margin-left: 35px;
    height: 50px;
    text-align:center;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
         
        </div>
      
      
</form>   
   
</body>
</html>

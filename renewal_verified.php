<?php
session_start();
include 'dbconnection.php';
if(!isset($_SESSION['user']))
{
header('location:index.html');
}
$regid=$_SESSION['user'];

if(isset($_POST['register']))
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
  $phone=$_POST['ph'];
  $ltype=$_POST['ltype'];
  $isdate=$_POST['isdate'];
  $exdate=$_POST['exdate'];
  $blood=$_POST['blood'];

  $filepath2=pathinfo($_FILES['sslc']['name']) ;
  $extension2=$filepath2['extension'];
  $rd=  rand();
  $sname= $rd.'.'.$extension2;
  $pathinfo2='uploads/'.$sname;
  move_uploaded_file($_FILES['sslc']['tmp_name'],$pathinfo2);
 
  $filepath3=pathinfo($_FILES['proof']['name']) ;
  $extension3=$filepath3['extension'];
  $rd=  rand();
  $cname= $rd.'.'.$extension3;
  $pathinfo3='uploads/'.$cname;
  move_uploaded_file($_FILES['proof']['tmp_name'],$pathinfo3);

  
  $filepath1=pathinfo($_FILES['dl']['name']) ;
  $extension1=$filepath1['extension'];
  $rd=  rand();
  $dname= $rd.'.'.$extension1;
  $pathinfo1='uploads/'.$dname;
  move_uploaded_file($_FILES['dl']['tmp_name'],$pathinfo1);

  $filepath=pathinfo($_FILES['file']['name']) ;
  $extension=$filepath['extension'];
    
  $iname= date('H-i-s').'.'.$extension;
  $path='img/'.$iname;
  move_uploaded_file($_FILES['file']['tmp_name'],$path);
  
  $sql=mysqli_query($con,"INSERT INTO `tbl_renewal` (`reg_id`, `first_name`, `last_name`, `age`, `gender`, `parent_name`,`house_name`,`state`,`district`, `email`, `phone_no`, `license_type`, `date_of_issue`, `expiriry_date`, `blood`,`image`,`identity_proof`,`dob_proof`,`driving_license`,`is_approved`,`paystatus`) 
  VALUES ('$regid', '$fname', '$lname', '$age', '$gender','$pname', '$house_name', '$state','$district', '$email', '$phone', '$ltype', '$isdate', '$exdate', '$blood','$iname','$cname','$sname','$dname','NO','Unpaid')") or die(mysqli_error($con));
  if($sql)
    echo "<script>alert('Registered Successfully');</script>";
}

if(isset($_POST['emailverify']))
{
  $email=$_POST['email'];
  $_SESSION['verifyemail']= $email;
  header('location:renewal_otp.php');
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
    <title>RTO  - Renewal License</title>
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

 </script>
  </head>
  <body>


      <div class="renew">
    <div class="title"><b>Renewal License Registration<b></div>
    <br/> <br/> <br/>
    <div>
       
    <form action="renewal_pay.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname"   value="" id="fname" required autofocus autocomplete = "off" required onchange ="ValidName();"> 
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
            <span class="details">Last Name</span>
            <input type="text" name="lname" value="" id="lname" required autofocus autocomplete = "off" required onchange ="Validlname();"> 
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
            <span class="details">Age</span>
            <input id="age" type="text" name="age" onkeyup="check();" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age'],ENT_QUOTES): '';?>">  
            <span id='message'></span>
          </div>
          
          <div class="input-box">
            <span class="details">Parent Name</span>
            <input type="text" name="pname"  value="" id="pname" required autofocus autocomplete = "off" required onchange ="Validpname();"> 
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
          </div><br>
         
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email"  value=""  id="email" required autofocus autocomplete = "off" required onchange ="ValidEmail();"> 
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
            <span class="details">Phone Number</span>
            <input type="text" name="ph" value=""id="ph" required autofocus autocomplete = "off" required onchange="ValidPhone();">
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
        <select name="ltype" name="ltype" style="height:45px;width:430px;" required>
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
            <span class="details">Date of Issue</span>
            <input type="date" name="isdate"  id="isdate" value="" required>
            <span id='msg10'></span>
          </div>
          <div class="input-box">
            <span class="details">Validity peroid</span>
            <input type="date"  name="exdate"  id="exdate"  value="" required> 
            <span id='msg11'></span> 
          </div>
          <div class="input-box">
            <span class="details">Blood</span>
            <select id="blood" name="blood" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
                          </select>
          <div class="input-box">
          <span class="details">Gender</span>
          <select style="height:45px;width:430px;" id="gender" name="gender">
                        <option Value="select">Select</option>
                        <option Value="Male">Male</option>
                        <option Value="Female">Female</option>
                        <option Value="Other">Other</option>
                        </select>
                   
          </div>
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" onchange="ValidateSingleInput(this);"  name="file" value=""> 
          </div>
          <div class="input-box">
            <span class="details">Identity Proof</span>
            <input type="file"   name="proof" value=""> 
          </div>
          <div class="input-box">
            <span class="details">DOB Proof</span>
            <input type="file"   name="sslc" value=""> 
          </div>
          <div class="input-box">
            <span class="details">Original DL</span>
            <input type="file"   name="dl" value=""> 
          </div>
          </div>
         
          <br>
          <input type="submit" name="register"  value="Register" style="width: 82%;
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
    </div>
  </div>

</body>
</html>
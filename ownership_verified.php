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
    $house_name=$_POST['house_name'];
    $state=$_POST['state'];
    $district=$_POST['district'];
    $email=$_POST['email'];
    $phone=$_POST['ph'];
    $dname=$_POST['dname'];

    $daddress=$_POST['daddr'];
    $rname=$_POST['rname'];
    $rlname=$_POST['rlname'];
    $recipient_house_name=$_POST['recipient_house_name'];
    $recipient_state=$_POST['recipient_state'];
    $recipient_district=$_POST['recipient_district'];
    $vnumber=$_POST['vnumber'];
    $vname=$_POST['vname'];
    $vtype=$_POST['vtype'];
    $fuel=$_POST['fuel'];
    $weight=$_POST['weight'];
    $scapacity=$_POST['scapacity'];
   

  $filepath2=pathinfo($_FILES['aadhar']['name']) ;
  $extension2=$filepath2['extension'];
  $rd=  rand();
  $aname= $rd.'.'.$extension2;
  $pathinfo2='uploads/'.$aname;
  move_uploaded_file($_FILES['aadhar']['tmp_name'],$pathinfo2);
 
  $filepath3=pathinfo($_FILES['sslc']['name']) ;
  $extension3=$filepath3['extension'];
  $rd=  rand();
  $sname= $rd.'.'.$extension3;
  $pathinfo3='uploads/'.$sname;
  move_uploaded_file($_FILES['sslc']['tmp_name'],$pathinfo3);

  
  $filepath1=pathinfo($_FILES['pollution']['name']) ;
  $extension1=$filepath1['extension'];
  $rd=  rand();
  $pname= $rd.'.'.$extension1;
  $pathinfo1='uploads/'.$pname;
  move_uploaded_file($_FILES['pollution']['tmp_name'],$pathinfo1);




    $sql=mysqli_query($con,"INSERT INTO `tbl_ownership` (`reg_id`, `first_name`, `last_name`, `age`,`house_name`, `state`,`district`, `email`, `phone_no`, `dealer_name`, `dealer_address`, `recipient_fname`,  `recipient_lname`,`recipient_house_name`,`recipient_state`,`recipient_district`,`vehicle_number`,`vehicle_name`,`vehicle_type`,`fuel`,`weight`,`seating_capacity`,`aadhar`,`sslc`,`pollution`,`is_approved`,`paystatus`) VALUES 
    ('$regid', '$fname', '$lname', '$age', '$house_name', '$state','$district','$email', '$phone', '$dname','$daddress','$rname','$rlname','$recipient_house_name','$recipient_state','$recipient_district','$vnumber','$vname','$vtype','$fuel','$weight','$scapacity','$aname','$sname','$pname','NO','Unpaid')") or die(mysqli_error($con));
    if($sql)
      echo "<script>alert('Registered Successfully');</script>";
  }

if(isset($_POST['emailverify']))
{
  $email=$_POST['email'];
  $_SESSION['verifyemail']= $email;
  header('location:ownership_otp.php');
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

    function Weight()
	{
		if (document.getElementById('weight').value =="")
		{
			document.getElementById('message55').style.color = 'red';
			document.getElementById('message55').innerHTML = 'Enter the weight of the vehicle';
		}
		else
		{
			document.getElementById('message55').style.color = '';
			document.getElementById('message55').innerHTML = '';

		}
	}

  function scapacity()
	{
		if (document.getElementById('scapacity').value =="")
		{
			document.getElementById('message66').style.color = 'red';
			document.getElementById('message66').innerHTML = 'Enter the Seating capacity of the vehicle';
		}
		else
		{
			document.getElementById('message66').style.color = '';
			document.getElementById('message66').innerHTML = '';

		}
	}
 
 </script>
  </head>
  <body>


      <div class="owner">
    <div class="title"><b>Ownership Transfer Registration<b></div>
    <br/> <br/> <br/>
    <div>
    <form action="ownership_pay.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" value=""  id="fname" required autofocus autocomplete = "off" required onchange ="ValidName();"> 
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
            <input id="age" type="text" name="age" value="">  
            <span id='message'></span>
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
            <span class="details">Email</span>
            <input  type="text" name="email"  value=""  id="email" required autofocus autocomplete = "off" required onchange ="ValidEmail();"> 
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
            <input  style="height:45px;width:425px;" type="text" name="ph" value=""id="ph" required autofocus autocomplete = "off" required onchange="ValidPhone();">
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
            <span class="details">Dealer Name</span>
            <input  style="height:45px;width:425px;" type="text" name="dname" value="" id="dname" required autofocus autocomplete = "off" required onchange="Validdname();"> 
            <span id="msg8" style="color:red;"></span>
                        <script>        
                            function Validdname() 
                            {
                                var val = document.getElementById('dname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{1,}$/)) 
                                {
                                    document.getElementById('msg8').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid Dealer First Name!!";
                                                document.getElementById('dname').value = "";
                                    return false;
                                }
                            document.getElementById('msg8').innerHTML=" ";
                                return true;
                            }
                            </script>  
          </div>
      
          <div class="input-box">
            <span class="details">Dealer Address</span>
            <input  style="height:45px;width:425px;" type="text" name="daddr" value="" id="daddr" required autofocus autocomplete = "off" required onchange="Validdaddr();"> 
            <span id="msg9" style="color:red;"></span>
                        <script>        
                            function Validdaddr() 
                            {
                                var val = document.getElementById('daddr').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg9').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid Dealer Address!!";
                                                document.getElementById('daddr').value = "";
                                    return false;
                                }
                            document.getElementById('msg9').innerHTML=" ";
                                return true;
                            }
                            </script>  
          </div>
          <div class="input-box">
            <span class="details">Recipient First Name</span>
            <input  style="height:45px;width:425px;" type="text"  name="rname" value="" id="rname" required autofocus autocomplete = "off" required onchange="Validrname();"> 
            <span id="msg10" style="color:red;"></span>
                        <script>        
                            function Validrname() 
                            {
                                var val = document.getElementById('rname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg10').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid Recipient First Name!!";
                                                document.getElementById('rname').value = "";
                                    return false;
                                }
                            document.getElementById('msg10').innerHTML=" ";
                                return true;
                            }
                            </script>   
          </div>
          <div class="input-box">
            <span class="details">Recipient Last Name</span>
            <input  style="height:45px;width:425px;" type="text"  name="rlname" value="" id="rlname" required autofocus autocomplete = "off" required onchange="Validrlname();"> 
            <span id="msg100" style="color:red;"></span>
                        <script>        
                            function Validrname() 
                            {
                                var val = document.getElementById('rlname').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
                                {
                                    document.getElementById('msg100').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid Recipient Last Name!!";
                                                document.getElementById('rlname').value = "";
                                    return false;
                                }
                            document.getElementById('msg100').innerHTML=" ";
                                return true;
                            }
                            </script>   
          </div>
          <div class="input-box">
            <span class="details">Recipient Address</span>
            <input  style="height:45px;width:425px;" type="text" name="recipient_house_name" value="" id="recipient_house_name" required autofocus autocomplete = "off" required onchange="Validraddr();"> 
            <span id="msg11" style="color:red;"></span>
                        <script>        
                            function Validraddr() 
                            {
                                var val = document.getElementById('recipient_house_name').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{1,}$/)) 
                                {
                                    document.getElementById('msg11').innerHTML="Start with a Capital letter , Only alphabets without space are allowed & Enter a Valid Recipient Address!!";
                                                document.getElementById('recipient_house_name').value = "";
                                    return false;
                                }
                            document.getElementById('msg11').innerHTML=" ";
                                return true;
                            }
                            </script>   
          </div>
          <div class="input-box">
            <span class="details" >Recipient State</span>
        <select name="recipient_state" style="height:45px;width:430px;" required>
   
          <option value="Select">Select</option>
          <option value="Kerala">Kerala</option>
        
        </select>
          
          </div>
         
          <div class="input-box">
            <span class="details" >Recipient District</span>
            <select name="recipient_district"  style="height:45px;width:430px;" required>
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
            <span class="details">Vehicle Number</span>
            <input  style="height:45px;width:425px;" type="text" name="vnumber" value=""id="vnumber" required > 
             
          </div>
          <div class="input-box">
            <span class="details">Vehicle Name</span>
            <input  style="height:45px;width:425px;" type="text" name="vname" value="" id="vname" required > 
              
          </div>
          <div class="input-box">
            <span class="details">Vehicle Type</span>
            <input  style="height:45px;width:425px;" type="text" name="vtype" value="" id="vtype" required > 
            <span id="msg14" style="color:red;"></span>
                        <script>        
                            function Validvtype() 
                            {
                                var val = document.getElementById('vtype').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{3,}$/)) 
                                {
                                    document.getElementById('msg14').innerHTML="Start with a Capital letter  Only alphabets without space are allowed & Enter a Vehicle Type!!";
                                                document.getElementById('vtype').value = "";
                                    return false;
                                }
                            document.getElementById('msg14').innerHTML=" ";
                                return true;
                            }
                            </script>    
          </div>
          <div class="input-box">
            <span class="details">Fuel</span>
            <!-- <input  style="height:45px;width:425px;" type="text" name="fuel" value=""  id="fuel" required autofocus autocomplete = "off" required onchange="Validfuel();">  -->
            <!-- <span id="msg15" style="color:red;"></span>
                        <script>        
                            function Validfuel() 
                            {
                                var val = document.getElementById('fuel').value;

                                if (!val.match(/^[A-Z][A-Za-z\ ]{3,}$/)) 
                                {
                                    document.getElementById('msg15').innerHTML="Start with a Capital letter  Only alphabets without space are allowed & Enter Fuel!!";
                                                document.getElementById('fuel').value = "";
                                    return false;
                                }
                            document.getElementById('msg15').innerHTML=" ";
                                return true;
                            }
                            </script>   -->

                            <select style="height:45px;width:430px;" name="fuel">
                              <option value="Select">Select</option>
                              <option value="Petrol">Petrol</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Other">Other</option>
                          </select>
          </div>
          <div class="input-box">
            <span class="details">Weight</span>
            <input style="height:45px;width:425px;" type="text" name="weight" value=""  onkeyup="Weight();" id="weight"> 
            <span id="message55" style="color:red;"></span>
            
          </div>
          <div class="input-box">
            <span class="details">Seating Capacity</span>
            <input  style="height:45px;width:425px;" type="text" name="scapacity" value="" id="scapacity"> 
            <span id="message66" style="color:red;"></span>
          </div>
          
          <div class="input-box">
            <span class="details">Aadhar</span>
            <input  style="height:45px;width:425px;" type="file"  name="aadhar" value="" required> 
          </div>
          <div class="input-box">
            <span class="details">SSLC</span>
            <input  style="height:45px;width:425px;" type="file"  name="sslc" value="" required> 
          </div>
          <div class="input-box">
            <span class="details">PUC Certificate</span>
            <input  style="height:60px;width:425px;" type="file"  name="pollution" value="" required> 
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
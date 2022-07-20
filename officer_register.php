<?php
	include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RTO - Officer Registeration</title>
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
   
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>



    
</script>
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
</head>

<body>
  
   

<div class="off_reg">
    <div class="title"><b>Officer Registration<b></div>
    <br/> <br/> <br/>
    <div>
       
    <form  method="post" enctype="multipart/form-data"  action="#" onsubmit="return validation(this);">
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
            <input type="text" name="lname" value=""  id="lname" required autofocus autocomplete = "off" required onchange ="Validlname();"> 
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
          <span class="details">Gender</span>
          <select style="height:45px;width:430px;" name="gender" id="gender">
                        <option Value="select">Select</option>
                        <option Value="Male">Male</option>
                        <option Value="Female">Female</option>
                        <option Value="Other">Other</option>
                        </select>
                   
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email"  value=""  id="email" required autofocus autocomplete = "off" required onchange ="ValidEmail();"> 

      <span id="msg3" style="color:red;"></span>
      <script>       
      function ValidEmail() 
                            {
                                var val = document.getElementById('email').value;

                                if (!val.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) 
                                {
                                    document.getElementById('msg3').innerHTML="Enter a Valid Email";
                                    
                                        document.getElementById('email').value = "";
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

                                if (!val.match(/^[A-Z][A-Za-z\ ]{0,}$/)) 
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
            <span class="details" >Designation</span>
        <select name="designation" name="designation" style="height:45px;width:430px;" required>
        <option value="Select">Select</option>
          
          <option value="Sub Officer">Sub Officer</option>
        
        </select>
                        </div>
          <div class="input-box">
            <span class="details" Style="width:200%">Phone Number</span>
            <input type="text" name="phone" id="phone" required autofocus autocomplete = "off" required onchange="ValidPhone();">
                        <span id="msg4" style="color:red;"></span>
			
                            <script>
                            function ValidPhone() 
                            {
                                var val = document.getElementById('phone').value;
                            
                                if (!val.match(/^[0-9]{10}$/))
                                {
                                    document.getElementById('msg4').innerHTML="Only Numbers are allowed and must contain 10 number";
                                
                                    
                                                document.getElementById('phone').value = "";
                                    return false;
                                }
                            document.getElementById('msg4').innerHTML=" ";
                                return true;
                            }
                            </script>
	    
          </div>


            <div class="input-box">
            <span class="details">UserName</span>
            <input type="text"  name="username" id="username"  onkeyup="username();" >
                      
             </div>
             <div>
             <span class="details">Password</span>
             <input type="password" name="pass" id="pass" style="height:45px;width:430px;" required autofocus autocomplete = "off" required onchange="ValidPassword();">
                        <span id="msg6" style="color:red;"></span>
                            <script>		
                            function ValidPassword() 
                            {
                                var val = document.getElementById('pass').value;

                                if (!val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/)) 
                                {
                                    document.getElementById('msg6').innerHTML="Upper case, Lower case, Special character and Numeric number are required in Password filed";
                                    
                                        document.getElementById('pass').value = "";
                                    return false;
                                }
                            document.getElementById('msg6').innerHTML=" ";
                                return true;
                            }
                            </script>     
              <div>
                <div>
                <span class="details">Retype Password</span>
                <input type="password"  name="repass" id="repass" style="height:45px;width:430px;" required autofocus autocomplete = "off" required onchange="ValidCPassword();">
                        <span id="msg8" style="color:red;"></span>
<script>
function ValidCPassword()
{
var pas1=document.getElementById("pass");
var pas2=document.getElementById("repass");
							
							  if(pas1.value=="")
	{
		document.getElementById('msg8').innerHTML="Password can't be null!!";
		pas1.focus();
		return false;
	}
	if(pas2.value=="")
	{
		document.getElementById('msg8').innerHTML="Please confirm password!!";
		pass2.focus();
		return false;
	}
	if(pas1.value!=pas2.value)
	{
		document.getElementById('msg8').innerHTML="Passwords does not match!!";
		pas1.focus();
		return false;
	}
     document.getElementById('msg8').innerHTML=" "; 
	return true;
	
}
	</script>   
                </div><br>
                <input type="submit" name="submit"  value="Register" style="width: 82%;
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

         
                        
                        
                 
                     <A href="index.html"><input  name="back"  value="Back" style="width: 82%;
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
    outline: none;">    <br>

     <div style="width:200%;margin-left:80px;">   Already have a account?<a href="login.php" style=" color: blue;align:center;">Login</a></div>
 
                    </form>
            </div>
        

            

</body>

</html>
<!-- end document-->
<?php
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $house_name=$_POST['house_name'];
  $state=$_POST['state'];
  $district=$_POST['district'];
  $designation=$_POST['designation'];
  $phone=$_POST['phone'];
  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $repass=$_POST['repass'];
$sql2="select * from tbl_login where username='$username' ";
$result=mysqli_query($con,$sql2);
$count=mysqli_num_rows($result);

if($count>0)
{
  
    ?>
    <script>
    alert("Sorry! Username Already in use");
    </script>
    <?php
  }
  else
  {

mysqli_query($con,"insert into tbl_register(fname,lname,gender,email,house_name,state,district,designation,phone_no,username,password,repassword)values
('$fname','$lname','$gender','$email','$house_name', '$state','$district','$designation','$phone','$username',md5('$pass'),md5('$pass'))");
$last_id=mysqli_insert_id($con);
mysqli_query($con,"insert into tbl_login values($last_id, '$username',md5('$pass'),'subofficer',2)") or die(mysqli_error($con));

  header('location:login.php');
   
}

}		
?>
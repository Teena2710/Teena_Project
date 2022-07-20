<?php
session_start();
include 'dbconnection.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $ins_name=$_POST['ins_name'];
  $phone=$_POST['phone'];
  $vname1=$_POST['vname1'];
  $mileage1=$_POST['mileage1'];
  $vname2=$_POST['vname2'];
  $mileage2=$_POST['mileage2'];
  $vname3=$_POST['vname3'];
  $mileage3=$_POST['mileage3'];

  
 $sql= mysqli_query($con,"insert into tbl_inst_vreg(fname,lname,ins_name,phone,vname1,mileage1,vname2,mileage2,vname3,mileage3)values('$fname','$lname','$ins_name','$phone','$vname1','$mileage1','$vname2','$mileage2','$vname3','$mileage3')");
 if($sql)
    echo "<script>alert('Registered Successfully');</script>";
} 
if(isset($_POST['back']))
{
    
    header('location:inspanel.php');
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Institution Vehicle Register</title>
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



</head>

  <body>


      <div class="ins_reg">
    <div class="title"><b> Institution Vehicle  Registration<b></div>
    <br/> <br/> <br/>
    <div>
    <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" value="" name="fname"   name="fname"  id="fname" required autofocus autocomplete = "off" required onchange ="ValidName();"> 
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
            <span id='message2'></span> 
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" value="" name="lname"  id="lname" required autofocus autocomplete = "off" required onchange ="Validlname();"> 
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
            <span class="details" >Institution Name</span>
         
        <select name="ins_name" name="ins_name" style="height:45px;width:430px;" required>
        <option value="Select">Select</option>
          <option value="Amala Driving School - Kottayam">Amala Driving School - Kottayam</option>
          <option value="General Motors-kottayam">General Motors - Kottayam</option>
          <option value="Two Lions - Alappuzha">Two Lions - Alappuzha</option>
         
        </select>
          </div>
         
         
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" value="" name="phone"  id="phone" required autofocus autocomplete = "off" required onchange="ValidPhone();">
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
            <span class="details">LMV Name</span>
            <select name="vname1" name="vname1" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
          <option value="Maruti Suzuki SwiftVDi">Maruti Suzuki SwiftVDi</option>
          <option value="Maruti Suzuki EstiloLXi">Maruti Suzuki EstiloLXi</option>
          <option value="Hyundai i10Magna 1.2 Kappa2">Hyundai i10 Magna 1.2 Kappa2</option>
          <option value="Maruti Zen">Maruti Zen</option>
        </select>
          </div>
          <div class="input-box">
            <span class="details">Mileage in kmpl - Vehicle 1</span>
            <input type="text" value="" name="mileage1"  id="mileage1" required autofocus autocomplete = "off" required onchange="Validmileage();">
                        <span id="msg63" style="color:red;"></span>
			
                            <script>
                            function Validmileage() 
                            {
                                var val = document.getElementById('mileage1').value;
                            
                                if (!val.match(/^[0-9]{2}$/))
                                {
                                    document.getElementById('msg63').innerHTML="Only Numbers are allowed ";
                                
                                    
                                                document.getElementById('mileage1').value = "";
                                    return false;
                                }
                            document.getElementById('msg63').innerHTML=" ";
                                return true;
                            }
                            </script> 
          </div> 
          <div class="input-box">
            <span class="details"> MCW/OG Name </span>
            <select name="vname2" name="vname2" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
            <option value="Honda Activa">Honda Activa</option>
          <option value="Honda Aviator">Honda Aviator</option>
          <option value="Hero Pleasure +">Hero Pleasure +</option>
        </select>
          </div> 
          <div class="input-box">
            <span class="details">Mileage in kmpl - Vehicle 2</span>
            <input type="text" value="" name="mileage2"  id="mileage2" required >
                       
          </div> 
          <div class="input-box">
            <span class="details"> MCW/G Name </span>
            <select name="vname3" name="vname3" style="height:45px;width:430px;" required>
            <option value="Select">Select</option>
          <option value="Honda SP 125">Honda SP 125</option>
          <option value="Honda Shine">Honda Shine</option>
          <option value="Honda Unicorn">Honda Unicorn</option>
          <option value="Bajaj Chetak">Bajaj Chetak</option>
        </select>
          </div> 
          <div class="input-box">
            <span class="details">Mileage in kmpl - Vehicle 3</span>
            <input type="text" value="" name="mileage3"  id="mileage3" required >
          </div> 
          
</div>

<input type="submit" name="submit"  value="Submit" style="width: 90%;
    margin-left: 35px;
    height:50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;"><br>
    <A href="inspanel.php"><input  name="back"  value="Back" style="width: 90%;
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
      
      
</form>   
   
</body>
</html>
       
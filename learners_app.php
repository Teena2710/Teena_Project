<?php 
session_start();
include 'dbconnection.php';
if ((!isset($_SESSION['user'])))
{
		header('location:index.html');
        
}
$lid=$_SESSION['user'];

if(isset($_POST['back'])){
    echo"<script type='text/javascript'>
    location='userpanel.php';
    </script>";
  }

if(isset($_POST['update']))
{  
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$pname=$_POST['pname'];
$house_name=$_POST['house_name'];
$state=$_POST['state'];
$district=$_POST['district'];
$email=$_POST['email'];
$phone=$_POST['phone_no'];
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
$sql= mysqli_query($con,"UPDATE tbl_learners_reg SET `fname`='$fname',`lname`='$lname',`age`='$age',
`gender`='$gender',`pname`='$pname',`email`='$email',`house_name`='$house_name',`state`='$state',
`district`='$district',`phone_no`='$phone',`license_type`='$license_type',`blood`='$blood'  where `regid`='$lid'")
 or die(mysqli_error($con));
 if($sql)
 {
    
?>
  <script>
  alert('Updated successfully');</script>
  <?php
 }

 header('location:learners_app.php');


}

$sql2=mysqli_query($con,"SELECT * FROM  tbl_learners_reg   where tbl_learners_reg.regid=$lid");

                $count=0;
                while($row=mysqli_fetch_array($sql2))
                { $count++

                    

            ?>
            <?php
            if(isset($_POST['viewdocs']))
            {
                $learners_id=$_POST['learners_id'];
                $_SESSION['learners_id']=$learners_id;
                header('location:viewdocs_learners_app.php');
            }
            ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - User Learners Details</title>
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
  <body background="img/log_bg.jpg">

 
   
       <div class="l_app">
    <div class="title"><b>Learners License Application<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text"  name="fname" value="<?php echo $row['2'] ; ?>" maxlength="50" required=""> 
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" value="<?php echo $row['3']; ?>" maxlength="50" required="">
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" name="age" value="<?php echo $row['4']; ?>" maxlength="50" required="">
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <input type="text" name="gender" value="<?php echo $row['5']; ?>" maxlength="50" required="">
          </div>
          <div class="input-box">
            <span class="details">Parent Name</span>
            <input type="text" name="pname" value="<?php echo $row['6']; ?>" maxlength="50" required="">
          </div>
    
          <div class="input-box">
            <span class="details">House Name</span>
            <input type="text" name="house_name" value="<?php echo$row['8']; ?>" maxlength="30" required="" >
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="state" value="<?php echo$row['9']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">District</span>
            <input type="text" name="district" value="<?php echo$row['10']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" value="<?php echo$row['7']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">Phone Number </span>
            <input type="text" name="phone_no" value="<?php echo $row['11']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details">Class of Vehicle</span>
            <input type="text" name="license_type" value="<?php echo $row['12']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details" >Blood</span>
            <input type="text" name="blood"  id="blood" value="<?php echo $row['13']; ?>" required>  
            <span id='msg9'></span>   
          </div>
          <!-- <div class="input-box">
            <span class="details" >Image</span>
            <input type="file"   name="file"  required>  
          </div>
          <div class="input-box">
            <span class="details" >Aadhar</span>
            <input type="file"  name="aadhar" required>  
          </div>
          <div class="input-box">
            <span class="details" >SSLC</span>
            <input type="file"  name="sslc"required> 
          </div> -->

          </div>
          <input type="submit" name="update" value="Update" style="width: 82%;
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
    <input type="hidden" name="learners_id" value="<?php echo $row['learners_id'];?>">
     <input type="submit" name="viewdocs" value="View Documents" style="width: 82%;
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
   <a href="userpanel.php"> <input  name="back"  value="Back" style="width: 82%;
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
    outline: none;"></a>
         
        </div>
      
</body>
</html>

<?php
                }
?>

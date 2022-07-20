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
    $email=$_POST['email'];
    $house_name=$_POST['house_name'];
    $state=$_POST['state'];
    $district=$_POST['district'];
    $phone=$_POST['phone_no'];
    $license_type=$_POST['license_type'];
    $isdate=$_POST['is_date'];
    $exdate=$_POST['ex_date'];
    $blood=$_POST['blood'];
$sql= mysqli_query($con,"UPDATE tbl_drivinglicense SET `first_name`='$fname',`last_name`='$lname',`age`='$age',
`gender`='$gender',`parent_name`='$pname',`house_name`='$house_name',`state`='$state',
`district`='$district',`email`='$email',`phone_no`='$phone',`license_type`='$license_type',`date_of_issue`='$isdate',
 `expiriry_date`='$exdate',`blood`='$blood'  where `reg_id`='$lid'")
 or die(mysqli_error($con));
 if($sql)
 {
    
?>
  <script>
  alert('Updated successfully');</script>
  <?php
 }

 header('location:driving_app.php');


}

$q=mysqli_query($con,"SELECT * FROM  tbl_drivinglicense   where tbl_drivinglicense.reg_id=$lid");

                $count=0;
                while($row=mysqli_fetch_array($q))
                { $count++

                    

            ?>
             <?php
            if(isset($_POST['viewdocs']))
            {
                $driving_id=$_POST['driving_id'];
                $_SESSION['driving_id']=$driving_id;
                header('location:viewdocs_app.php');
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

 
   
       <div class="d_app">
    <div class="title"><b>Driving License Application<b></div>
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
            <input type="text" name="age" value="<?php echo $row['age']; ?>" maxlength="50" required="">
          </div>
    
          <div class="input-box">
            <span class="details">Parent Name</span>
            <input type="text" name="pname" value="<?php echo $row['parent_name']; ?>" maxlength="50" required="">
          </div>
    
          <div class="input-box">
            <span class="details">House Name</span>
            <input type="text" name="house_name" value="<?php echo$row['house_name']; ?>" maxlength="30" required="" >
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="state" value="<?php echo$row['state']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">District</span>
            <input type="text" name="district" value="<?php echo$row['district']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" value="<?php echo$row['email']; ?>" maxlength="12" required="">
          </div>
          <div class="input-box">
            <span class="details">Phone Number </span>
            <input type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details">License Type</span>
            <input type="text" name="license_type" value="<?php echo $row['12']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details">Date of Issue</span>
            <input type="text" name="is_date" value="<?php echo $row['13']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details">Expiriy Date</span>
            <input type="text" name="ex_date" value="<?php echo $row['14']; ?>" maxlength="15" required=""> 
          </div>
          <div class="input-box">
            <span class="details" >Blood</span>
            <input type="text" name="blood"   value="<?php echo $row['15']; ?>" required>    
          </div>
           <div class="input-box">
            <span class="details" >Gender</span>
            <input type="text"   name="gender" value="<?php echo $row['5']; ?>" required>  
          </div>
         <!-- <div class="input-box">
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
    <input type="hidden" name="driving_id" value="<?php echo $row['driving_id'];?>">
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

<?php
session_start();
include 'dbconnection.php';
$sql=mysqli_query($con,"SELECT * FROM `tbl_duplicatelicense` where is_approved='APPROVED' order by dup_id ASC") or die(mysqli_error($con));
if(isset($_POST['generate']))
{
    $dup_id=$_POST['dup_id'];
    mysqli_query($con,"UPDATE `tbl_duplicatelicense` SET `is_approved` = 'GENERATED' WHERE `tbl_duplicatelicense`.`dup_id` = $dup_id;") or die(mysqli_error($con));
    $_SESSION['dup_id']=$dup_id;
    header('location:duplicatelic_certi.php');
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Generate Duplicate License</title>
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

  </head>
  <body background="img/log_bg.jpg">
 
    
  <center>
        
       <div class="coz">
        
    <div class="title"><b>&emsp;&emsp;&emsp;&emsp;&emsp;Generate Duplicate License<b></div>
    <br/><br/>
    <div>
    <?php 
                while($res=mysqli_fetch_array($sql))
                {
                ?>
  <form action="" method="post" >
      <div >
        <div class="user-details">
          <br>
        <div class="input-box">
            <span class="details" id="message1">Enter Driving ID</span>
            <input type="number"  value="<?php echo $res['driving_id']; ?>">
            <!-- <input type="number" name="driving" id="driving" onkeyup="driving();">   -->
          </div>
          
          <div class="input-box">
            <span class="details" id="message">Enter Applicant Name</span>
            <input type="text" value="<?php echo $res['first_name'].$res['last_name']; ?>">
            <!-- <input type="text" name="appname" id="appname" onkeyup="name();">   -->
          </div>
          
         
          
          </div>&emsp;&emsp;
          <form method="post">
         <input type="hidden" name="dup_id" value="<?php echo $res['dup_id'];?>">
          <input type="submit" name="generate" text-align:center value="Generate" style="width: 30%;
    margin-left: 150px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;">
    </form><br><br>
         
        </div>
      <?php
      }
      ?>
         
    <a href="rtopanel.php"><input type="submit" name="back" text-align:center value="Back" style="width: 82%;
    margin-left: 150px;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;"></a>
</body>
</html>

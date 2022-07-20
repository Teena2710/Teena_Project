<?php
session_start();
include 'dbconnection.php';
if(!isset($_SESSION['user']))
{
header('location:index.html');
}
$regid= $_SESSION['user'];
$sql=mysqli_query($con,"select * from tbl_learners_reg where regid=$regid and is_approved='APPROVED'") or die(mysqli_error($con));
$check=mysqli_num_rows($sql);
if($check==0)
  echo "<script>alert('you dont have an exam');window.location.href='userpanel.php';</script>"; 
if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
    echo "<script>alert('Enter name');</script>";
  } else{
   

    $tag=$_POST['tag'];
  $_SESSION['tag']=$tag;
//   $result = mysqli_query($con,"SELECT * FROM quiz where tag='$tag' ORDER BY date DESC") or die('Error');
// if(mysqli_num_rows($result)==0){
//   echo"<script type='text/javascript'>
//   alert('No exams added yet');
//   location='userzone.php';
//   </script>";
// }
  header('location:userdash.php?q=0');
  }
  
}
if(isset($_POST['back'])){
  echo"<script type='text/javascript'>
  location='userpanel.php';
  </script>";
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - User Zone</title>
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
		if (document.getElementById('name').value =="")
		{
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Enter a valid Name';
		}
		else
		{
			document.getElementById('message').style.color = '';
			document.getElementById('message').innerHTML = '';

		}
	}
  </script>

  </head>
  <body background="img/log_bg.jpg">

 
   
       <div class="co">
    <div class="title"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Learners Exam<b></div>
    <br/> <br/> <br/>
    <div>
       
      <form action="" method="post" >
        <div class="user-details">
          <div class="input-box">
            <label></label>
            <span id='message' class="details">Enter Name </span>
            <input type="text" name="name"  required  id="name" onkeyup="check();">
           
          </div>  
          <div class="input-box">
            <span class="details" id="message">Enter Zone</span>
            <select  id="tag" style="width:425px" name="tag"  placeholder="Enter Zone" class="form-control input-md" required="" >
  <option value="select">Select </option>
 <option value="Kuttanad">Kuttanad</option>
 <option value="Alappuzha">Alappuzha</option>
 <option value="Kottayam">Kottayam</option>
 <option value="Idukki">Idukki</option> </select>
          </div><br/>
         
         
          
          
          </div>
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
    <A href="userpanel.php"><input name="back"  value="Back" style="width: 82%;
    margin-left: 35px;
    text-align:center;
    height: 50px;
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
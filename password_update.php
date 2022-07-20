<?php
include 'dbconnection.php';
session_start();
$sendotp= $_SESSION['check'];
$user=$_SESSION['regid'];
$enteredotp=$_POST['enteredotp'];
$pass=$_POST['pass'];
//echo $sendotp." ".$user." ".$pass." ".$enteredotp;
if($enteredotp == $_SESSION['check'])
{

$q=mysqli_query($con, "update tbl_login set `password`='$pass' where login_id='$user'") or die(mysqli_error($conn));
			if($q)
			{
				echo "<script>alert('Password updated successfully');window.location.href='login.php';</script>";
			}
}   
else
{
	echo "<script>alert('Invalid OTP');</script>";
}
?>
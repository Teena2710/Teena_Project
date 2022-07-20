<?php
session_start();
include("dbconnection.php");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RTO  - Login</title>
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
    <link href="css/style1.css" rel="stylesheet">
 <!--    <script type="text/javascript">
  window.history.forward();
  function noBack() {
      window.history.forward();
  }
</script> -->
  
  </head>
  <body background=white>
    
    <div class="centerr">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" id="username" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a href="forgot_password.php">Forgot Password</a></div>
        <input type="submit" id="submit"  name=submit value="Login">
        <div class="signup_link">
          Not a member? <a href="user_register.php">Signup</a>
        </div>
     
      </form>
    </div>

  </body>
</html>
<?php
if(isset($_POST["submit"]))
{
  
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $sql2="select * from tbl_login where username='$username' AND (password=md5('$password') OR password='$password')";
  
  
    $result=mysqli_query($con,$sql2);

    if($result){
        if($row=mysqli_fetch_array($result)){
      if($row[3]=="rto"){
        ?>
      <script type="text/Javascript">  
        window.location.href="rtopanel.php";
       </script>
       <?php     
      }else if($row[3]=="user"){
        $_SESSION['user']=$row['login_id'];
        
        
        ?>
      <script type="text/Javascript">  
        window.location.href="userpanel.php";
       </script> 
       
      <?php    
      } else if($row[3]=="subofficer"){
        ?>
        <script type="text/Javascript">  
          window.location.href="subpanel.php";
         </script> 
        <?php    
      } else if($row[3]=="institution"){
        ?>
        <script type="text/Javascript">  
          window.location.href="inspanel.php";
         </script> 
        <?php
      }
      else if($row[3]=="instructor"){
        $_SESSION['user']=$row['login_id'];
        ?>
        <script type="text/Javascript">  
          window.location.href="instructorpanel.php";
         </script> 
        <?php
      }
      else
    {
      echo"Invalid Username and Password";
      
    }
  }
        
}
}
?>

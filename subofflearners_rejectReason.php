<?php
error_reporting(0);
session_start();
include 'dbconnection.php';
//if(isset($_SESSION['learners_id']))
    $feg=$_SESSION['learners_id'];
  

 $sql=mysqli_query($con,"SELECT * FROM `tbl_learners_reg` where learners_id=$feg");
 
 $res=mysqli_fetch_array($sql);
  $user=$res['email'];

if(isset($_POST['submit']))
{
    

    $reason=$_POST['reason'];
    $to      = $user;
    $subject = 'Application Status';
    $message = $reason;
    $headers = 'From: RTO <teenarose2403@gmail.com>'       . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    $result=mail($to, $subject, $message, $headers);
        if($result)
		{

			$q="UPDATE `tbl_learners_reg` SET `is_approved` = 'REJECTED' WHERE `tbl_learners_reg`.`learners_id` = $feg";
        
            mysqli_query($con,$q) ;
            echo "<script>alert('Response send Successfully');window.location.href='subofflearners.php';</script>";
            
			
		}
        else
		{
			echo "<script>alert('Something went wrong...');window.location.href='subofflearners.php';</script>";
		}
    
}



?> 
<!Doctype html>
<html>
<title>
  Reject Reason
</title>

<head>
<style>
    .cen{
  position: absolute;
  margin: 35px;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  height: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 20px rgba(0,0,0,0.05);
  
}
    </style>


</head>


<body background="img/log_bg.jpg">
<a href="subpanel.php"><button type="submit"   style="align:right;">Go back!</button></a>
        <div class="cen">
     
            
                <div class="txt_field">
                 
                   

                    <center>
                        <table>
               <br>
               <form id="myform" method="post">
        
                   <label><u><b>REJECTION-DETAILS</b></u></label><br><br>
                            <tr>
    
                            
                                <td> Reason for Rejection:</td>
                            </tr>

                            <tr>
                                <td> <textarea name="reason" rows="4" cols="20"></textarea></td>
                            </tr>
                            
                            <tr>
                        
                                <td colspan="2">
                                    <center>
                   <br><br>
                   <input type="submit" name="submit" value="Submit"/>
                    
                     </form></center>
                                </td>
                            </tr>
                           
                  
                    

                    </table>
            </form>
            </div>
        </div>
    </body>

</html>
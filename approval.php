<?php
session_start();
include 'dbconnection.php';


$sql=mysqli_query($con,"SELECT * FROM `tbl_register` where is_approved='NO' order by reg_id ASC") or die(mysqli_error($con));
if(isset($_POST['approve']))
{
    $reg_id=$_POST['regg_id'];
    mysqli_query($con,"UPDATE `tbl_register` SET `is_approved` = 'YES' WHERE `tbl_register`.`reg_id` = $reg_id;") or die(mysqli_error($con));
    echo "<script>alert('Approved successfully');window.location.href='approval.php';</script>";
}
if(isset($_POST['reject']))
{
    $driving_id=$_POST['reg_id'];
    $_SESSION['reg_id']=$reg_id;
    header('location:instructor_rejectReason.php');
}
if(isset($_POST['viewdetails']))
{
    $driving_id=$_POST['reg_id'];
    $_SESSION['reg_id']=$reg_id;
    header('location:instructor_pdfviewdetails.php');
}
?>

<html>
    <body background="img/images.jpg">
    <h1 align="center">Driving School Instructors List</h1>
        <table border="1">
            <tr>
                <th></th>
                <th> Name</th>               
                <th>Gender</th>
                <th>Email</th>
                
                
               
                <th>Action</th>
            </tr>
            <?php 
                while($res=mysqli_fetch_array($sql))
                {
                ?>
                    <tr>
                                       <!--write all columns res-->
                        <td><?php echo $res['first_name']." ".$res['last_name'];?></td>
                       
                        <td><?php echo $res['gender'];?></td>
                       
                        <td><?php echo $res['email'];?></td>
                      
                       
                        
                        
                        <td><form method="post">
                            <input type="hidden" name="reg_id" value="<?php echo $res['reg_id'];?>">
                            <button type=submit name="approve">Approve</button>&nbsp;
                            <button type="submit" name="reject">Reject</button>&nbsp;
                            <button type="submit" name="viewdetails">View Details</button></form></td>

                    </tr>
                
                <?php
                }
                ?>
        </table>
    </body>
</html>

            
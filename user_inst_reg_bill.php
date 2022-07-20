<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['user']))

    $regid=$_SESSION['user'];

$result=mysqli_query($con,"SELECT * FROM `tbl_user_inst_reg` where regid=$regid") or die(mysqli_error($con));


include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',19);	
$pdf->Cell(176, 5, 'GENERAL MOTORS DRIVING SCHOOL', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->SetFont('Arial','B',17);
$pdf->Cell(176, 5, 'E-RECEIPT FOR REGISTRATION OF DRIVING SCHOOL', 0, 0, 'C');
$pdf->Ln();
  $pdf->Image("driving_logo.jpg", 90, 30, 30);
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Name : '. $row['fname']." ".$row['lname'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);
$pdf->Cell(0,12,'Email : '. $row['email'],0,1);
$pdf->Cell(0,12,'House Name : '. $row['house_name'],0,1);
$pdf->Cell(0,12,'State : '. $row['state'],0,1);
$pdf->Cell(0,12,'District : '. $row['district'],0,1);
$pdf->Cell(0,12,'Pay Status : '. $row['paystatus'],0,1);
$pdf->Cell(0,12,'Paid Amount : 9000',0,1);
$pdf->Cell(0,12,'Payment Date : '. $row['pay_date'],0,1);
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	

$pdf->Output();
?>
<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['user']))

    $regid=$_SESSION['user'];

$result=mysqli_query($con,"SELECT * FROM `tbl_learners_reg` where regid=$regid") or die(mysqli_error($con));


include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',19);	

$pdf->Cell(176, 5, 'TRANSPORT DEPARTMENT', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->SetFont('Arial','B',17);
  $pdf->Cell(176, 5, 'GOVERNMENT OF INDIA', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
$pdf->Cell(176, 5, 'E-RECEIPT FOR ONLINE LEARNERS LICENSE', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Image("govt.png", 90, 40, 20);
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
 
$pdf -> Line(10, 60, 190,60);
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Name : '. $row['fname']." ".$row['lname'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);
$pdf->Cell(0,12,'Parent Name : '. $row['pname'],0,1);
$pdf->Cell(0,12,'House Name : '. $row['house_name'],0,1);
$pdf->Cell(0,12,'State : '. $row['state'],0,1);
$pdf->Cell(0,12,'District : '. $row['district'],0,1);
$pdf->Cell(0,12,'Email : '. $row['email'],0,1);
$pdf->Cell(0,12,'Phone Number : '. $row['phone_no'],0,1);
$pdf->Cell(0,12,'License Type : '. $row['license_type'],0,1);
$pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);
$pdf->Cell(0,12,'Pay Staus : '. $row['paystatus'],0,1);
$pdf->Cell(0,12,'Paid Amount : 50',0,1);
$pdf->Cell(0,12,'Payment Date : '. $row['pay_date'],0,1);
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	
$pdf -> Line(10, 239, 190,239);
$pdf->Image("digital.jpg", 90, 241, 100);
$pdf->Image("qr_code.png", 30, 241, 40);


$pdf->Output();
?>
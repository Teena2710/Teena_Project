<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['driving_id']))
    $driving_id=$_SESSION['driving_id'];

$result=mysqli_query($con,"SELECT driving_id,first_name,last_name,age,gender,image,parent_name,house_name,state,district,email,phone_no,license_type,date_of_issue,expiriry_date,blood FROM `tbl_drivinglicense` where driving_id=$driving_id") or die(mysqli_error($con));


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
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'UNION OF INDIA DRIVING LICENSE ', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Image("govt.png", 90, 40, 20);
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	
$pdf -> Line(12, 60, 180,60);	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	

$pdf->Cell(0,12,'License No : KL05 202200000'. $row['driving_id'],0,1);
// $pdf->Ln();	

$pdf->Cell(0,12,'Valid upto : '. $row['expiriry_date'],0,1);



$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);

$pdf->Cell(0,12,'Authorization to Drive : '. $row['license_type'],0,1);
$pdf->Cell(0,12,'Date of Issue : '. $row['date_of_issue'],0,1);
$pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);
$pdf->Cell(0,12,'S/W/D : '. $row['parent_name'],0,1);
$pdf->Cell(0,12,'Permanent Adddress : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
$pdf->Cell(0,12,'Present Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);


$pdf->Ln();
$pdf->Ln(); 
$pdf -> Line(10, 200, 190,200);
$pdf->Image("digital.jpg", 90, 205, 80);
$pdf->Image("qr_code.png", 30, 205, 30);
$pdf->Ln(); 
 


$pdf->Cell(0,12,'Note : 1. This Driving License is generated by RTO as per the data provided by the issuing',0,1);
$pdf->Cell(0,12,'           authority in the National Registry of Ministry of Road Transport and Highways.',0,1);
$pdf->Cell(0,12,'        2. This digitally signed document is valid as per the IT Act 2000 when used electronically.',0,1);



$pdf->Output();
?>
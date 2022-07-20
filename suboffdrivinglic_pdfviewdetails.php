<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['driving_id']))
    $driving_id=$_SESSION['driving_id'];

$result=mysqli_query($con,"SELECT first_name,last_name,age,gender,parent_name,house_name,state,district,email,phone_no,license_type,date_of_issue,expiriry_date,blood,paystatus,date FROM `tbl_drivinglicense` where driving_id=$driving_id") or die(mysqli_error($con));


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
$pdf->Cell(176, 5, 'Application Details', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
 $pdf->Image("govt.png", 90, 40, 20);
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
  $pdf->Ln();
  $pdf->Ln();	
  $pdf -> Line(12, 70, 180,71);

$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);
$pdf->Cell(0,12,'Parent Name : '. $row['parent_name'],0,1);
$pdf->Cell(0,12,'House Name : '. $row['house_name'],0,1);
$pdf->Cell(0,12,'State : '. $row['state'],0,1);
$pdf->Cell(0,12,'District : '. $row['district'],0,1);
$pdf->Cell(0,12,'Email : '. $row['email'],0,1);
$pdf->Cell(0,12,'Phone Number : '. $row['phone_no'],0,1);
$pdf->Cell(0,12,'License Type : '. $row['license_type'],0,1);
$pdf->Cell(0,12,'Date of Issue : '. $row['date_of_issue'],0,1);
$pdf->Cell(0,12,'Expiriry Date : '. $row['expiriry_date'],0,1);
$pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);
$pdf->Cell(0,12,'Pay Staus : '. $row['paystatus'],0,1);
$pdf->Cell(0,12,'Payment Date : '. $row['date'],0,1);
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	


$pdf->Output();
?>
<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['vehicle_id']))
    $vehicle_id=$_SESSION['vehicle_id'];

$result=mysqli_query($con,"SELECT * FROM `tbl_vehicle_details` where vehicle_id=$vehicle_id") or die(mysqli_error($con));


include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'Vehicle Details', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Vehicle Number : '. $row['vehicle_no'],0,1);
$pdf->Cell(0,12,'Vehicle Name : '. $row['vehicle_name'],0,1);
$pdf->Cell(0,12,'First Owner : '. $row['first_owner'],0,1);
$pdf->Cell(0,12,'Issurance Policy No : '. $row['issurance_policy_no'],0,1);
$pdf->Cell(0,12,'Issurance Company : '. $row['issurance_company'],0,1);
$pdf->Cell(0,12,'Issurance Validity : '. $row['issurance_validity'],0,1);
$pdf->Cell(0,12,'Owner Name : '. $row['owner_name'],0,1);
$pdf->Cell(0,12,'Registering Authority : '. $row['registering_authority'],0,1);
$pdf->Cell(0,12,'Registration Date : '. $row['registration_date'],0,1);
$pdf->Cell(0,12,'Vehicle Age : '. $row['vehicle_age'],0,1);
$pdf->Cell(0,12,'PUCC No : '. $row['pucc _No'],0,1);
$pdf->Cell(0,12,'PUCC Validity : '. $row['pucc_validity'],0,1);
$pdf->Cell(0,12,'Tax Validity : '. $row['tax_validity'],0,1);


$pdf->Output();
?>
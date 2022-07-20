<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['vreg_id']))
    $vreg_id=$_SESSION['vreg_id'];

$result=mysqli_query($con,"SELECT first_name,last_name,age,house_name,'state',district,email,phone_no,dealer_name,dealer_address,vehicle_name,vehicle_type,fuel,'weight',seating_capacity,image,paystatus,pay_date  FROM `tbl_vreg` where vreg_id=$vreg_id") or die(mysqli_error($con));


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
$pdf->Image("govt.png", 90, 40, 20);
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	
$pdf -> Line(12, 60, 180,60);
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'House Name : '. $row['house_name'],0,1);
$pdf->Cell(0,12,'State : '. $row['state'],0,1);
$pdf->Cell(0,12,'District : '. $row['district'],0,1);
$pdf->Cell(0,12,'Email : '. $row['email'],0,1);
$pdf->Cell(0,12,'Phone Number : '. $row['phone_no'],0,1);
$pdf->Cell(0,12,'Dealer Name : '. $row['dealer_name'],0,1);
$pdf->Cell(0,12,'Dealer Address : '. $row['dealer_address'],0,1);
$pdf->Cell(0,12,'Vehicle Name : '. $row['vehicle_name'],0,1);
$pdf->Cell(0,12,'Vehicle Type : '. $row['vehicle_type'],0,1);
$pdf->Cell(0,12,'Fuel : '. $row['fuel'],0,1);
$pdf->Cell(0,12,'Weight : '. $row['weight'],0,1);
$pdf->Cell(0,12,'Seating Capacity : '. $row['seating_capacity'],0,1);
// $pdf->Cell(0,12,'Image : '. $row['image'],0,1);
$pdf->Cell(0,12,'Pay Staus : '. $row['paystatus'],0,1);
$pdf->Cell(0,12,'Payment Date : '. $row['pay_date'],0,1);
$pdf->Output();
?>
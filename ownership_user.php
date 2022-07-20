<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['user']))
    $feg=$_SESSION['user'];


$result=mysqli_query($con,"SELECT * FROM `tbl_ownership` where   reg_id=$feg ") or die(mysqli_error($con));
if(mysqli_num_rows($result)==0){
    echo"<script type='text/javascript'>
    alert('Not generated yet');
    location='userpanel.php';
    </script>";
  }
  

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
$pdf->Cell(176, 5, 'UNION OF INDIA OWNERSHIP TRANSFER ', 0, 0, 'C');
  $pdf->Ln();

  $pdf->Image("govt.png", 90, 40, 20);
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();

$pdf -> Line(12, 60, 190,60);

$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);
$pdf->Ln();	$pdf->Ln();		
$pdf->Cell(0,12,'Ownership No : KL05 202200000'. $row['owner_id'],0,1);
$pdf->Cell(0,12,'Vehicle No : '. $row['vehicle_number'],0,1);
$pdf->Cell(0,12,'Vehicle Name : '. $row['vehicle_name'],0,1);
$pdf->Cell(0,12,'Dealer Name: '. $row['dealer_name'],0,1);
$pdf->Cell(0,12,'Recipient Name: '. $row['recipient_fname']." ".$row['recipient_lname'],0,1);

// $pdf->Ln();	



$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Permanent Adddress : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
$pdf->Cell(0,12,'Dealer Address: '.$row['dealer_address'],0,1);
$pdf->Cell(0,12,'Recipient Address: '. $row['recipient_house_name']." ".$row['recipient_state']." ".$row['recipient_district'],0,1);
$pdf->Cell(0,12,'Vehicle Type : '. $row['vehicle_type'],0,1);
$pdf->Cell(0,12,'Fuel : '. $row['fuel'],0,1);
$pdf->Cell(0,12,'Weight : '. $row['weight'],0,1);
$pdf->Cell(0,12,'Seating Capacity : '. $row['seating_capacity'],0,1);
$pdf->Ln();
$pdf->Ln(); 
$pdf->Ln(); 
$pdf -> Line(10, 228, 190,225);
$pdf->Image("digital.jpg", 90, 231, 80);
$pdf->Image("qr_code.png", 30, 231, 30);
$pdf->Ln(); 
$pdf->Ln(); 
// $pdf->Cell(0,12,'Note : 1. This Driving License is generated by RTO as per the data provided by the issuing',0,1);
// $pdf->Cell(0,12,'           authority in the National Registry of Ministry of Road Transport and Highways.',0,1);
// $pdf->Cell(0,12,'        2. This digitally signed document is valid as per the IT Act 2000 when used electronically.',0,1);
$pdf->Output();
?>
<?php
session_start();
include 'dbconnection.php';
if(isset($_SESSION['owner_id']))
    $owner_id=$_SESSION['owner_id'];

$result=mysqli_query($con,"SELECT * FROM `tbl_ownership` where owner_id=$owner_id") or die(mysqli_error($con));


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
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Image("govt.png", 90, 40, 20);
$pdf->Ln();
$pdf->Ln();	
$pdf->Ln();
$pdf->Ln();	

$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Ownership No : KL05 202200000'. $row['owner_id'],0,1);


$pdf -> Line(20, 60, 190,60);
// $pdf -> Line(20, 140, 190,140);
// $pdf->Ln();	
$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Permanent Adddress : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
$pdf->Cell(0,12,'Present Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
$pdf->Cell(0,12,'Vehicle No : '. $row['vehicle_number'],0,1);
$pdf->Cell(0,12,'Vehicle Name : '. $row['vehicle_name'],0,1);
$pdf->Cell(0,12,'Dealer Name: '. $row['dealer_name'],0,1);
$pdf->Cell(0,12,'Recipient Name: '. $row['recipient_fname']." ".$row['recipient_lname'],0,1);
$pdf->Cell(0,12,'Dealer Address: '. $row['dealer_address'],0,1);
$pdf->Cell(0,12,'Recipient Address: '. $row['recipient_house_name']." ".$row['recipient_state']." ".$row['recipient_district'],0,1);
$pdf->Cell(0,12,'Vehicle Type : '. $row['vehicle_type'],0,1);
$pdf->Cell(0,12,'Fuel : '. $row['fuel'],0,1);
$pdf->Cell(0,12,'Weight : '. $row['weight'],0,1);
$pdf->Cell(0,12,'Seating Capacity : '. $row['seating_capacity'],0,1);$pdf->Ln();
$pdf->Ln(); 
$pdf -> Line(10, 243, 190,243);
$pdf->Image("digital.jpg", 90, 245, 80);
$pdf->Image("qr_code.png", 30, 245, 30);
$pdf->Ln(); 
$pdf->Ln(); 

$pdf->Output();
?>
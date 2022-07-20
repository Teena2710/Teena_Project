<?php
session_start();
include 'dbconnection.php';


if(isset($_SESSION['accident_id']))
    $accident_id=$_SESSION['accident_id'];

$result=mysqli_query($con,"SELECT * FROM `tbl_accident_details`") or die(mysqli_error($con));


include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'Accident Details', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Cell(0,12,'Vehicle Number : '. $row['vehicle_no'],0,1);
$pdf->Cell(0,12,'FIR No: '. $row['fir_no'],0,1);
$pdf->Cell(0,12,'Time of Accident : '. $row['time_of_accident'],0,1);
$pdf->Cell(0,12,'Date of Accident : '. $row['date_of_accident'],0,1);
$pdf->Cell(0,12,'Name of Place : '. $row['name_of_place'],0,1);
$pdf->Cell(0,12,'Police Station : '. $row['police_station'],0,1);
$pdf->Cell(0,12,'District: '. $row['district'],0,1);
$pdf->Cell(0,12,'State : '. $row['state'],0,1);
$pdf->Cell(0,12,'Accident Type : '. $row['accident_type'],0,1);
$pdf->Cell(0,12,'No of Persons Killed: '. $row['no_of_persons_killed'],0,1);
$pdf->Cell(0,12,'No of Persons Injured: '. $row['no_of_persons_injured'],0,1);
$pdf->Cell(0,12,'Type of Collision : '. $row['type_of_collision'],0,1);
$pdf->Cell(0,12,'Speed Limit : '. $row['speed_limit'],0,1);


$pdf->Output();
?>
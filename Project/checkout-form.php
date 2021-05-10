<?php
include_once("msql-connection.php");



$cust_id = $_POST["hid"];
$screen_id = $_POST["hid2"];
$seats = $_POST["tickets"];
$date = $_POST["date"];
$time = $_POST["time"];
$amount = $_POST["amount"];
$Name = $_POST["Name"];
$movie = $_POST["movie"];
$theatre =  $_POST["theatre"];
$location = $_POST["location"];
$screen_no = $_POST["hid3"];

$query1 = "insert into booked(seats,cust_id,screen_id,date,time) values('$seats','$cust_id','$screen_id','$date','$time')";


mysqli_query($dbcon,$query1);

$msg = mysqli_error($dbcon);


$booked_id =  mysqli_insert_id($dbcon);

$query2 = "insert into transactions(booked_id,amount) values('$booked_id','$amount')";

mysqli_query($dbcon,$query2);

$myImage = "uploads/Logo1.jpg";

require("fpdf183/fpdf.php");
$pdf = new FPDF();
$pdf-> AddPage();

$pdf-> SetFont ("Arial","B",16);  
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(255,200,82);
$pdf->SetDrawColor(255,255,255);
$pdf->Cell(190,10,"Ticket Details",1,1,'C',1);

$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);


$pdf->Image($myImage, 5, $pdf->GetY(), 70.78);
$pdf->ln(40);
  
$pdf-> Cell(0,10,$movie,1,1,'C');

$pdf->Cell (45,10,"Theatre",1,0);
$pdf->Cell(0,10,$theatre.", ".$location,1,1);

$pdf->Cell (45,10,"Seats",1,0);
$pdf->Cell(75,10,$seats,1,0);
$pdf->Cell(45,10,"Screen No.",1,0);
$pdf->Cell(0,10,$screen_no,1,1);

$pdf->Cell (45,10,"Date",1,0);
$pdf->Cell(75,10,$date,1,0);
$pdf->Cell(45,10,"Time",1,0);
$pdf->Cell(0,10,$time,1,1);



//$pdf->Cell (45,10,"date",1,0);
//$pdf->Cell(0,10,$date,1,1);
//$pdf->Cell (45,10,"time",1,0);
//$pdf->Cell(0,10,$time,1,1);
$pdf->Cell (45,10,"Amount",1,0);
$pdf->Cell(0,10,$amount,1,1);

$pdf->ln(20);

$pdf-> SetFont ("Arial","",12);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0,0,0);
$pdf->SetDrawColor(255,255,255);
//$pdf->Cell(190,9,"©2021 BookMyMovie",1,1,'C',1);
$pdf->Cell(190, 8, chr(169)."2021 BookMyMovie" , 1, 1, 'C', 1);

$pdf->Output("ticket.pdf","D");


?>
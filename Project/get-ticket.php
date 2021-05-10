<?php

include_once("msql-connection.php");
session_start();

$email = $_SESSION["email"];

$booked_id = $_POST["hid"];

$query = "SELECT b.booked_id,b.date,b.time,b.seats,t.amount,t.time_stamp,s.screen_no,s.theatre_name,s.location,s.movie,m.picpath FROM booked as b INNER join transactions as t on b.booked_id = t.booked_id
INNER JOIN screens as s on b.screen_id = s.screen_Id inner join movies as m on s.movie = m.name INNER JOIN customers as c on b.cust_id = c.cus_ID and c.cus_ID = (SELECT cus_ID from customers where email = '$email') where b.booked_id = '$booked_id'";

$myImage = "uploads/Logo1.jpg";
require("fpdf183/fpdf.php");


foreach($dbcon->query($query) as $row)
{
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
    
    $pdf-> Cell(0,10,$row['movie'],1,1,'C');

$pdf->Cell (45,10,"Theatre",1,0);
$pdf->Cell(0,10,$row['theatre_name'].", ".$row['location'],1,1);

$pdf->Cell (45,10,"Seats",1,0);
$pdf->Cell(75,10,$row['seats'],1,0);
$pdf->Cell(45,10,"Screen No.",1,0);
$pdf->Cell(0,10,$row['screen_no'],1,1);

$pdf->Cell (45,10,"Date",1,0);
$pdf->Cell(75,10,$row['date'],1,0);
$pdf->Cell(45,10,"Time",1,0);
$pdf->Cell(0,10,$row['time'],1,1);


$pdf->Cell (45,10,"Amount",1,0);
$pdf->Cell(0,10,$row['amount'],1,1);

$pdf->ln(20);
    
$pdf-> SetFont ("Arial","",12);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0,0,0);
$pdf->SetDrawColor(255,255,255);
//$pdf->Cell(190,9,"©2021 BookMyMovie",1,1,'C',1);
$pdf->Cell(190, 9, chr(169)."2021 BookMyMovie" , 1, 1, 'C', 1);   
}

$pdf->Output("ticket.pdf","I");


?>

<!--foreach($dbcon->query($query) as $row)
{
    
}



$myImage = "uploads/Logo1.jpg";

require("fpdf183/fpdf.php");
/*$pdf = new FPDF();
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
*/
//$pdf-> SetFont ("Arial","",12);
//$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(0,0,0);
//$pdf->SetDrawColor(255,255,255);
////$pdf->Cell(190,9,"©2021 BookMyMovie",1,1,'C',1);
//$pdf->Cell(190, 9, chr(169)."2021 BookMyMovie" , 1, 1, 'C', 1);
//
//$pdf->Output("ticket.pdf","I");
-->

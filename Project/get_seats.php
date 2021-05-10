<?php
include_once("msql-connection.php");

$screen = $_GET["screen"];
$date = $_GET["date"];
$time = $_GET["time"];

$query="select * from booked where screen_id='$screen' and date='$date' and time='$time'";

$table=mysqli_query($dbcon,$query); //firing a query
$ary=array();

while($row=mysqli_fetch_array($table))
{   
    $ary[]=$row;
}

echo json_encode($ary);
?>
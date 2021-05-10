<?php
include_once("msql-connection.php");

$movie=$_GET["movie"];
$date =  $_GET["date"];


$query = "select * from screens where movie='$movie' and last_date>='$date'";

$table=mysqli_query($dbcon,$query); //firing a query

$ary=array();

while($row=mysqli_fetch_array($table))
{   
    $ary[]=$row;
}

echo json_encode($ary);
?>
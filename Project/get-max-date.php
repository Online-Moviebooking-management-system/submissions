<?php
include_once("msql-connection.php");

$movie=$_GET["movie"];


$query = "select max(last_date) as date from screens where movie='$movie'";

$table=mysqli_query($dbcon,$query); //firing a query

$ary=array();

while($row=mysqli_fetch_array($table))
{   
    $ary[]=$row;
}

echo json_encode($ary);
?>
<?php
include_once("msql-connection.php");

$location = $_GET["location"];
$date = $_GET["date"];
$movie = $_GET["movie"];

$ary=array();
$query="select * from screens where movie='$movie' and location = '$location' and last_date >= '$date'";

$table=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
<?php
include_once("msql-connection.php");

$theatre = $_GET["theatre"];
$location = $_GET["location"];
$screen = $_GET["screen"];

$ary=array();
$query="SELECT movie,last_date,time FROM screens WHERE theatre_name='$theatre' AND location = '$location' AND screen_no='$screen'";

$table=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
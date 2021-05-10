<?php
include_once("msql-connection.php");
$movie = $_GET["movie"];

$ary=array();
$query="select * from movies where name = '$movie'";

$table=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
<?php
include_once("msql-connection.php");

$screen_no = $_POST["screen_no"];
$theatre_name = $_POST["theatre_name"];
$location = $_POST["location"];
$movie = $_POST["movie"];
$time = $_POST["time"];
$btn = $_POST["btn"];
$date = $_POST["date"];

$query;

if($btn == "Save")
{
    $query = "insert into screens(screen_no,theatre_name,location,time,movie,last_date) values($screen_no,'$theatre_name','$location','$time','$movie','$date');";  
}
else
{
    $query = "update screens set movie='$movie',time='$time',last_date='$date' where theatre_name='$theatre_name' and location = '$location' and screen_no = '$screen_no'";
}

mysqli_query($dbcon,$query);

if($btn == "Save")
    echo "Screen added Successfully!";
else
    echo "Screen Updated Successfully!";
?>

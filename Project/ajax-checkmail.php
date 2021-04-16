<?php
include_once("msql-connection.php");

$email=$_GET["email"];

$query="select * from customers where email='$email'";
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);

if($count==1)
    echo "Unavailable";
else
    echo "Available";
?>



<?php
include_once("msql-connection.php");

$screen_Id = $_GET["screen"];

$query = "delete from screens where screen_Id='$screen_Id'";

mysqli_query($dbcon,$query);

$msg = mysqli_error($dbcon);

if($msg=="")
    echo "Screen Deleted";
else
    echo $msg;

?>
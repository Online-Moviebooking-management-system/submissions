<?php
include_once("msql-connection.php");

$name = $_GET["name"];

$query = "delete from movies where name='$name'";

mysqli_query($dbcon,$query);

$msg = mysqli_error($dbcon);

if($msg=="")
    echo "Movie Deleted";
else
    echo $msg;

?>
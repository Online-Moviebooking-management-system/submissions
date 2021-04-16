<?php
include_once("msql-connection.php");

$name=$_GET["name"];
$mob=$_GET["mob"];
$pwd=$_GET["pwd"];
$email=$_GET["email"];

$query="insert into customers (name,mob,pwd,email) values('$name','$mob','$pwd','$email')";
$table=mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
        if($msg=="")
            echo "Record Saved";
        else
            echo $msg;
?>
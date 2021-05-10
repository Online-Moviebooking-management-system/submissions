<?php
session_start();
include_once("msql-connection.php");

$email=$_GET["email"];
$pwd = $_GET["pwd"];
$pwd =  md5($pwd); //to be checked

$query="select * from customers where email='$email'";

$table = mysqli_query($dbcon,$query);
$row = mysqli_fetch_row($table);
    
$_SESSION["email"] = $email;

if($row[3] == $pwd)
    echo "Success";
else
    echo "Failure";

?>
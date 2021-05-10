<?php
include_once("msql-connection.php");
session_start();

$email = $_SESSION["email"];
$screen_Id = $_GET["screen_Id"];

$query = "SELECT customers.cus_ID,customers.name,screens.movie,screens.screen_no,screens.theatre_name,screens.location FROM customers,screens WHERE customers.email='$email' AND screens.screen_Id='$screen_Id'";

$table = mysqli_query($dbcon,$query);

$ary=array();

while($row=mysqli_fetch_array($table))
{   
    $ary[]=$row;
}

echo json_encode($ary);
?>
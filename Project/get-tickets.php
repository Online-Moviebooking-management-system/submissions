<?php

include_once("msql-connection.php");
session_start();

$email = $_SESSION["email"];

$query = "SELECT b.booked_id,b.date,b.time,b.seats,t.amount,t.time_stamp,s.screen_no,s.theatre_name,s.location,s.movie,m.picpath FROM booked as b INNER join transactions as t on b.booked_id = t.booked_id
INNER JOIN screens as s on b.screen_id = s.screen_Id inner join movies as m on s.movie = m.name INNER JOIN customers as c on b.cust_id = c.cus_ID and c.cus_ID = (SELECT cus_ID from customers where email = '$email') order by t.time_stamp desc";

$ary=array();
$table = mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);

?>
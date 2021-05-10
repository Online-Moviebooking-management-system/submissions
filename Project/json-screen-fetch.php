<?php
include_once("msql-connection.php");
$ary=array();
$query="select * from screens order by theatre_name";
$table=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
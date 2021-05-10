<?php
include_once("msql-connection.php");

if(isset($_POST["btn"]))
{
    $name = $_POST["name"];
$runtime = $_POST["runtime"];
$date = $_POST["date"];
$cast = $_POST["cast"];
$synopsis = $_POST["synopsis"];
$rating = $_POST["rating"];
$trailer = $_POST["trailer"];

//pic
$picpath=$_FILES["picpath"]["name"];
$temp = $_FILES["picpath"]["tmp_name"];
move_uploaded_file($temp,"uploads/".$picpath);

//genre
$genre="";
if(isset($_POST["chkac"]))
{
    $can=$_POST["chkac"];
    $genre=$can;
}
if(isset($_POST["chkthr"]))
{
    $ger=$_POST["chkthr"];
    if($genre=="")
        $genre=$ger;
    else
        $genre = $genre.",".$ger;
}
if(isset($_POST["chkhor"]))
{
    $ger=$_POST["chkhor"];
    if($genre=="")
        $genre=$ger;
    else
        $genre = $genre.",".$ger;
}
if(isset($_POST["chkrom"]))
{
    $ger=$_POST["chkrom"];
    if($genre=="")
        $genre=$ger;
    else
        $genre = $genre.",".$ger;
}
if(isset($_POST["chkcom"]))
{
    $ger=$_POST["chkcom"];
    if($genre=="")
        $genre=$ger;
    else
        $genre = $genre.",".$ger;
}
if(isset($_POST["chksci"]))
{
    $ger=$_POST["chksci"];
    if($genre=="")
        $genre=$ger;
    else
        $genre = $genre.",".$ger;
}

$query = "insert into movies values('$name','$rating','$date','$genre','$picpath','$synopsis','$cast','$runtime','$trailer')";

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
    echo "Movie Added Successfully!";
else
    echo $msg;
}
?>

<?php
session_start();
if(!isset($_SESSION["email"]))
    header("location:index.html");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/seat_selection.css">
    <script src="js/seat_selection.js"></script>
    
    
    
</head>

<body>
   <input type="hidden" value='<?php echo $_GET["screen"]; ?>' id="screen_Id">
<!--    <input type="hidden" value='/php/' id="screen_no">-->
    <input type="hidden" value='<?php echo $_GET["time"]; ?>' id="time">
    <input type="hidden" value='<?php echo $_GET["date"]; ?>' id="date">
    <input type="hidden" value='<?php echo $_GET["seats"]; ?>' id="seats">
    <input type="hidden" value='<?php echo $_GET["movie"]; ?>' id="movie">
    
    <div id="postHolder">   
    </div>
    <center>
    <div class="btn-outline-warning btn mt-4" style="width:100px;margin-bottom:50px;" id="book">Book</div>
    <div class="btn-outline-danger btn mt-4 ml-5" style="width:100px;margin-bottom:50px;" id="cancel">Cancel</div>
    </center>
</body>

</html>

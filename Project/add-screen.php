<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Book My Movie</title>



    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">




    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        body {
            padding-top: 1rem;
            padding-bottom: 1rem;
            color: #5a5a5a;

        }

        .navbar-color {
            background-color: maroon;
        }

        .navbar-text {
            color: white;

        }
        .date-carousel {
            background-color: white;
            box-sizing: border-box;
            display: flex;
            height: 0.5in;
            margin: auto;
            position: relative;
            width: 3in;
        }

        .date-carousel-input {
            color: black;
            background-color: transparent;
            text-align: center;
            width: 3in;
            font-size: 1.5rem;
        }

    </style>
    
    <script>
        $(document).ready(function(){
            
            $("#btnfetch").click(function(){
                
                var theatre = $("#theatre_name").val();
                var location = $("#location").val();
                var screen = $("#screen_no").val();
                
                
               $.getJSON("screen-fetch.php?theatre="+theatre+"&location="+location+"&screen="+screen,function(arry){
                   $("#date").val(arry[0].last_date);
                   $("#time").val(arry[0].time);
                   $("#movie").val(arry[0].movie);
               });
            });
        });
    </script>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-color ">
            <div class="container-fluid">
                <p class="navbar-brand navbar-text" style="font-weight:bolder;font-size:30px;">BOOK MY MOVIE</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
    </header>
    <!--Navbar ends-->

    <div class="container border" bg-color="red" style="margin-top:85px;">
        <div class="col-md-10 offset-md-1 text-center title" style="margin-bottom:5px;">
            <h2>Add Screen</h2>
        </div>
        <form action="screen-add-process.php" method="post" enctype="multipart/form-data">
            <div class="form-row mt-3">
                <div class="col-md-4 form-group">
                    <label for="">
                        <h3>Name</h3>
                    </label>
                    <!--                    <input type="text" name="name" id="name" class="form-control" placeholder="Movie name">-->
                    <?php
                        include_once("msql-connection.php");
                        $query = "select distinct(name) from movies;";
                        $table = $dbcon->query($query);
                        
                        echo "<select name='movie' id='movie' class='form-control'>";
                        echo "<option value='select'>Select Movie</option>";
                        while($row = $table->fetch_assoc())
                        {
                            $name = $row['name'];
                            //echo "<option value=".'$name'."'$row['name']'</option>"
                            echo "<option value='$name'>".$name."</option>";
                        }
                        echo "</select>"
                    ?>
                </div>
                
                <div class="col-md-3 form-group offset-md-2">
                    <label for="">
                        <h3>Termination Date</h3>
                    </label>
                    <article class="date-carousel" style="float:left;">
                        <input type="date" class="date-carousel-input form-control" id="date" name="date" style="margin-bottom:5px;">
                    </article>
                </div>
                
                <div class="col-md-2 offset-md-1 ">
                   <label for="">
                        <br>
                        <br>
                    </label>
                    <input type="button" class="btn btn-danger form-control" name="btnfetch" id="btnfetch" value="Fetch">
                </div>

            </div>
            <br>
            <br>
            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="institute">
                        <h4>Screen No.</h4>
                    </label><br>
                    <select name="screen_no" id="screen_no" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-3 offset-md-1 form-group">
                    <label for="">
                        <h4>Theatre Name</h4>
                    </label>
                    <input type="text" name="theatre_name" id="theatre_name" class="form-control" placeholder="Theatre">
                </div>
                <div class="col-md-3 offset-md-1 form-group">
                    <label for="">
                        <h4>Location</h4>
                    </label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="location">
                </div>
                
            </div>
                   <br><br>
                <div class="form-row">
                    <div class="col-md-8 form-group">
                        <label for="details">
                            <h4>Time Slots</h4>
                        </label>
                        <input type="text" id="time" name="time" class="form-control" placeholder="24H format time string">
                    </div>
                </div>
                <div class="form-row">
                        <div class="col-md-4 form-group" style="margin-left:40%">
                        <input type="submit" class="btn btn-outline-warning" style="width:120px;" value="Save" name="btn" id="save">
                        <input type="submit" class="btn btn-outline-primary" style="width:120px;" value="Update" name="btn" id="update">
                    </div>
                </div>
        </form>
    </div>
<script src="js/show_time.js"></script>
</body>

</html>

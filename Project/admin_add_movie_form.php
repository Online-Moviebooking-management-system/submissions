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
            background-color: #f8f9fa;

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
        .logo
        {
            width:70px;
            height: 60px;
        }

    </style>
    <script>
          function showpreview(file,ref) 
	{
			
        if (file.files && file.files[0]) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $(ref).prop('src', e.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
    </script>



</head>

<body>
   <header>
  <nav class="navbar navbar-expand-md fixed-top navbar-color ">
    <div class="container-fluid">
       <img src="uploads/Pop No Cap.png" alt="" class="logo" style="float:left;">
      <h2 class="navbar-brand navbar-text" style="left:-500px;float:left;" >BOOK MY MOVIE</h2>
      
    </div>
  </nav>
</header>



    <!-- navbar ends-->

    <div class="container border" bg-color="red" style="margin-top:85px;">
        <div class="col-md-10 offset-md-1 text-center title" style="margin-bottom:5px;">
            <h2><u>Movie Details</u></h2>
        </div>
        <br>
        <form action="admin-add-process.php" method="post" enctype="multipart/form-data">
            <div class="form-row mt-3">
                <div class="col-md-4 form-group">
                    <label for="">
                        <h3>Name</h3>
                    </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Movie name">
                </div>
                <div class="col-md-2 offset-md-1 form-group">
                    <label for="">
                        <h3>Rating</h3>
                    </label>
                    <input type="text" name="rating" id="rating" class="form-control" placeholder="Rating">
                </div>
                <div class="col-md-4 form-group offset-md-1">
                    <label for="">
                        <h3>Release Date</h3>
                    </label>
                    <article class="date-carousel" style="float:left;">
                        <input type="date" class="date-carousel-input" id="date" name="date">
                    </article>
                </div>
            </div>
            <br>
            <br>
            <div class="form-row" style="height:380px;">
                <div class="col-md-4 form-group">
                    <label for="institute">
                        <h4>Genre</h4>
                    </label><br>
                    <input type="checkbox" name="chkac" id="chkac" value="Action">
                    <font size="5" style="margin-left:8px">Action</font><br>
                    <input type="checkbox" name="chkthr" id="chkthr" value="Thriller">
                    <font size="5" style="margin-left:8px">Thriller</font><br>
                    <input type="checkbox" name="chkhor" id="chkhor" value="Horror">
                    <font size="5" style="margin-left:8px">Horror</font><br>
                    <input type="checkbox" name="chkrom" id="chkrom" value="Romantic">
                    <font size="5" style="margin-left:8px">Romantic</font><br>
                    <input type="checkbox" name="chkcom" id="chkcom" value="Comedy">
                    <font size="5" style="margin-left:8px">Comedy</font><br>
                    <input type="checkbox" name="chksci" id="chksci" value="Sci-Fy">
                    <font size="5" style="margin-left:8px">Sci-Fy</font><br>
                </div>
                <div class="col-md-4 offset-md-1 form-group">
                    <label for="picpath">
                        <h4>Poster:</h4>
                    </label>
                    <center>
                        <img src="uploads/Pop%20No%20Cap.jpg" id="prev2" height="280" width="300" class="child2">
                        <input type="file" name="picpath" id="picpath" style="margin-left:70px;margin-bottom:20px" onchange="showpreview(this,prev2);">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 form-group">
                    <label for="details"><h4>Plot/Synopsis</h4></label>
                    <textarea rows="2" cols="5" id="synopsis" name="synopsis" class="form-control"></textarea>
                </div>
                
                <div class="col-md-3 ml-5 form-group">
                    <label for="details"><h4>Casting</h4></label>
                    <textarea rows="2" cols="5" id="cast" name="cast" class="form-control"></textarea>
                </div>
                
                <div class="col-md-2 mt-3 ml-5">
                    <label for="runtime"><h4>Runtime</h4></label>
                    <input type="text" name="runtime" id="runtime" class="form-control" placeholder="(in mins)">
                </div>
                <div class="col-md-2 mt-3 ml-5">
                    <a href="https://www.youtube.com/" target="_blank">
                       <h4>Add Trailer</h4>
                    </a>
                    <input type="text" name="trailer" id="trailer" class="form-control" placeholder="Embed Code">
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-md-2 form-group offset-md-6">
                    <input type="submit" class="btn btn-outline-primary" style="width:120px;" value="Add" name="btn" id="save">
                </div>
            </div>
        </form>
    </div>


    <script src="js/show_time.js"></script>
</body>

</html>

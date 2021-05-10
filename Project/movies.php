<?php
session_start();
if(!isset($_SESSION["email"]))
    header("location:index.html");
?>


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
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    <!--
     Bootstrap core CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
-->

   
   <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="Montserrat/Montserrat-Black.ttf">
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
 
   
   
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;

            }
        }
        
        .repeat:hover {
            transform: scale(1.1);
            transition: ease all .5s;

        }
        .logo{
      width: 70px;
      height: 60px;
        }
        body {
    font-family: "Montserrat";
            background-color: #f8f9fa;
        }
        td
        {
            margin-left: 100px;
        }
        tr.bordered {
    border-bottom: 1px solid #000;
}

    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">

    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonarryALL;
            $scope.fetchall = function() {

                $http.get("json-movie-fetch.php").then(ok, notok);

                function ok(response) {
                    $scope.jsonarryALL = response.data;
                    //
                }

                function notok(response) {
                    alert(response);
                }
            }

            //------------------
            $scope.oneobj;
            $scope.doshowdetails = function(index) {
                $scope.oneobj = $scope.jsonarryALL[index];
                $("#details").modal("show");
            }
        });

    </script>
    <script>
        $(document).ready(function() {

            $("#book").click(function() {
                var val = $("#hid").val();
                //alert(val);           
                window.location = "show_time.php?movie=" + val;
            });
        });

    </script>
    
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchall();">

    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-color ">
            <div class="container-fluid">
               <img src="uploads/Pop No Cap.png" alt="" class="logo">
                <p class="navbar-brand navbar-text"><b>BOOK MY MOVIE</b></p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav w-85">
                        <li class="nav-item active">
                            <form class="d-flex">
                                <input class="form-control me-2 " type="text" ng-model="googler" placeholder="Search" aria-label="Search">
<!--                                <button class="btn btn-outline-light " type="submit" style="margin-left:10px;">Search</button>-->
                            </form>
                        </li>

                    </ul>
                    <ul class="navbar-nav w-15" style="margin-left:560px;">
                        <li class="nav-item">
                            <a href="view-tickets.php"><button class="btn btn-warning " style="">View Tickets</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php"><button class="btn btn-light" style="margin-left:80px;">Logout</button></a>
                        </li>

                    </ul>



                </div>
            </div>
        </nav>
    </header>

    <!--Crousal-->
    <div class="bd-example" style="margin-top:36px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="uploads/tanhaji.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="uploads/andha.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="uploads/durga.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>




    <div class="container-fluid">
        <div class="form-row">
            <div class="col-md-3 form-group mt-3 mr-3 ml-5 repeat" ng-repeat="obj in jsonarryALL|filter:googler" ng-click="doshowdetails($index);" style="cursor:pointer;transition:ease all .5s">
                <div class="card bg-dark text-white offset-md-3" style="background-image: url('uploads/{{obj.picpath}}');height:400px;width:310px;background-size:100% 100%;margin-right:25px;">
                    <div class="card-img-overlay">
                        <h5 class="card-title" style="font-weight:bolder;">{{obj.name}}</h5>
                        <h6 class="card-text">
                        </h6>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <!--Details Modal-->

    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-left:auto;text-align:center;">Movie Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                    <b>{{oneobj.name}}</b>
                    <br>
                    <br>
                    <table width="50%">
                            <tr>
                                <td>Release Date: <br><br></td>
                                <td>{{oneobj.date}} <br><br></td>
                            </tr>
                            <tr>
                                <td>Rating: <br><br></td>
                                <td>{{oneobj.rating}} <br><br></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Genre: <br><br></td>
                                <td rowspan="2">{{oneobj.genre}} <br><br></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>Runtime: <br><br></td>
                                <td>{{oneobj.runtime}} mins <br><br></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Cast: <br>
                                <br>
                                <br></td>
                                <td rowspan="2">{{oneobj.cast}} <br>
                            <br>
                            <br></td>
                               
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr class="bordered"></tr>
                            
                            <tr>
                                <td>Plot: </td>
                                <td rowspan="4">{{oneobj.synopsis}}</td>
                            </tr>
                         
                            
                        </table>
                    </center>
                    <input type="hidden" id="hid" name="hid" value={{oneobj.name}}>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary" id="book" name="book">Book</button>
                </div>
            </div>
        </div>

    </div>





</body>

</html>

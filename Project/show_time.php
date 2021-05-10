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

    <link rel="stylesheet" href="css/show_time.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/angular.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">

    <script>
        var module = angular.module("mymodule", []);

        module.controller("mycontroller", function($scope, $http) {
            
            $scope.Date = "";
            $scope.jsonarryALL;
            $scope.fetch = function() 
            {
                
                $scope.Date  = angular.element(document.getElementById("date")).val();
                var movie = '<?php echo $_GET["movie"]?>';
                
                $http.get("json-screen_time-fetch.php?movie="+movie+"&date="+$scope.Date).then(ok, notok);

                function ok(response) {
                   $scope.jsonarryALL =  response.data;
                }

                function notok(response) {
                    alert(response);
                }

                //$scope.fetch_movie(string);
            }

            //----------------------

            $scope.jsonarryCities;
            $scope.fetchCities = function() {
                $http.get("json-get-locations.php").then(ok, notok);

                function ok(response) {
                    $scope.jsonarryCities = response.data;
                    $scope.selectedCity = $scope.jsonarryCities[0];

                }

                function notok(response) {
                    alert(response);
                }
            }

            //--------------------------------------
            $scope.selectedCity = "";
            $scope.fetchCitiesJson = function() {
                //alert($scope.selectedCity.location);
                var movie = '<?php echo $_GET["movie"]?>';
                 $scope.Date  = angular.element(document.getElementById("date")).val();
                $http.get("json-fetch-location.php?location=" + $scope.selectedCity.location+"&date="+$scope.Date+"&movie="+movie).then(ok, notok);

                function ok(response) {
                    $scope.jsonarryALL = response.data;
                }

                function notok(response) {
                    alert(response);
                }
            }

            $scope.obj;
            $scope.time;
            $scope.dosomething = function(parent, child) {
                $scope.obj = $scope.jsonarryALL[parent];
                $scope.time = $scope.obj.time.split(',')[child];
                $("#details").modal("show");

            }
            
            //---------------------------
//            $scope.change = function()
//            {
//                $scope.Date =  angular.element(document.getElementById("date")).val();
//                var movie = '';
//                
//                $http.get("json-screen_time-fetch.php?movie="+movie+"&date="+$scope.Date).then(ok, notok);
//
//                function ok(response) {
//                   $scope.jsonarryALL =  response.data;
//                }
//
//                function notok(response) {
//                    alert(response);
//                } 
//                
//            }
            


        });

    </script>

    <script>
        $(document).ready(function() {


            var movie = '<?php echo $_GET["movie"]?>'
            $.getJSON("json-movie.php?movie=" + movie, function(arry) {
                //alert(arry[0].picpath);
                $("#prev").prop("src", "uploads/" + arry[0].picpath);
                $("#trailer").prop("src", "https://www.youtube.com/embed/" + arry[0].trailer+"?rel=0");
                
                var val = arry[0].date > $("#date").val() ? arry[0].date:$("#date").val();
                $("#date").prop("min", val);
                $("#date").val(val);


            });
            
            //--------------------------------
            $.getJSON("get-max-date.php?movie="+movie,function(arry){
                
                var val =  arry[0].date;
                $("#date").prop("max", val);
            });

            //----------------
            $("#book").click(function() {
                var screen_Id = $("#screen_Id").val();
                var screen_no = $("#screen_no").val();
                var time = $("#time").val();
                var date_ = $("#date").val();
                var seats = $("#seats").val();
                var movie = $("#movie").val();

                //alert(screen_Id+screen_no+time+date_+seats+movie);
                window.location = "seat_selection.php?screen=" + screen_Id + "&screen_no=" + screen_no + "&date=" + date_ + "&time=" + time + "&seats=" + seats + "&movie=" + movie;
            });


        });

    </script>

    <style>
        .thumbnail {
            float: left;
            width: 100px;
            margin-left: 20px;
            margin-top: 8px;

        }
        .pic
        {
            padding: 10%;
            background-image: url(uploads/Logo1.jpg);
            background-size: 100% 100%;
            height: inherit;
            width: 300px;
            
            
            
        }

    </style>


</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetch();">
    <section id="title">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-md fixed-top navbar-dark navbar-pad ">
            <div class="container-fluid pad">
               <img src="uploads/Pop%20No%20Cap.png" style="width:65px;height:45px;" alt="">
                <p class="navbar-heading">BOOK MY MOVIE</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav w-100">
                        <li class="nav-item active">
                            <form class="d-flex">
                              <input class="form-control me-2" type="Search" placeholder="Search" aria-label="Search">
<!--                                <input type="text" ng-model="googler" style="margin-left:10px">-->
                            </form>
                        </li>
                         <li>
                                <a href="logout.php"><button class="btn btn-light border-light " style="margin-left:850px;">Logout</button></a>
                            </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Title -->
        <div class="row" style="height:450px;">
            <div class="col-sm-3">
                <img class="movie-image" id="prev">
            </div>
            <div class="col ml-5 mt-2" width=inherit>
                <iframe class="mt-4" width="1035px" height="435px" id="trailer" title="YouTube video player" frameborder="0" allow="autoplay" allowfullscreen></iframe>

            </div>

        </div>

    </section>
    <input type="hidden" id="movie" value='<?php echo $_GET["movie"]?>'>
    <div class="form-row">
        <div class="col-md-2">
            <article class="date-carousel mr-3 ml-5">
                <input type="button" class="date-carousel-prev" value="&lt;" ng-model="Date" ng-click="fetch();">
                <input type="date" class="date-carousel-input" id="date" ng-model="Date" ng-change="fetch();">
                <input type="button" class="date-carousel-next" value="&gt;" ng-model="Date" ng-click="fetch();">
            </article>
             
        </div>
       

        <div class="col-md-4 offset-md-6 form-group" style="float:right;">
            <select style="width:200px;float:left;" class="mt-2 form-control" ng-options="obj.location for obj in jsonarryCities" ng-model="selectedCity" ng-init="fetchCities();">
            </select>
             <a class="btn btn-outline-warning mt-2 ml-3" ng-click="fetchCitiesJson();" style="float:left;">Select City</a>
            <a class="btn btn-outline-danger mt-2 ml-5" ng-click="fetch();" style="margin-left:10px;float:left;">All Shows</a>
           
        </div>

        <hr style="width:100%;color:grey;margin:10px;">

    </div>

    <!--
<div class="col-md-3 form-group offset-md-1">
            <select ng-options="obj.city for obj in jsonarryCities" ng-model="selectedCity" ng-init="fetchCities();">
            </select>
            <a class="btn btn-outline-success" href="#" ng-click="fetchCitiesJson();" style="margin-left:10px;">Find in the City</a>
        </div>
-->


    <div class="form-row" style="height:inherit;">
        <div class="col-md-6">
            <div class="row" style="">
                <div class="col-md-7 form-group mt-3 mr-3 ml-5 repeat" ng-repeat="obj in jsonarryALL;">
                    <div class="card border-info" style="width:600px;">
                        <div class="card-header">
                            {{obj.theatre_name}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{obj.location}}</h5>

                            <div ng-repeat="time in obj.time.split(',');">
                                <div href="" class="btn btn-outline-primary thumbnail" id="t1" ng-click="dosomething($parent.$index,$index)">{{time}}</div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class=" col-md-6 pic"></div>
    </div>


    <!--Details Modal-->

    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-left:auto;text-align:center;"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value={{obj.screen_Id}} id="screen_Id">
                    <input type="hidden" value={{obj.screen_no}} id="screen_no">
                    <input type="hidden" value={{time}} id="time">

                    <center>
                        How many Seats you want to book?
                    </center>
                    <br>
                    <br>
                    <input type="number" min="1" max="10" value="1" class="form-control" id="seats">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary" id="book" name="book">Book</button>
                </div>
            </div>
        </div>

    </div>




    <script src="js/show_time.js"></script>

</body>

</html>

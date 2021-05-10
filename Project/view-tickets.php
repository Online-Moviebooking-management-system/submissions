<?php
session_start();
if(!isset($_SESSION["email"]))
    header("location:index.html");
?>
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
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    
      <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="Montserrat/Montserrat-Black.ttf">
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
 

    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {

            $scope.jsonarryALL;
            $scope.fetchAll = function() {
                $http.get("get-tickets.php").then(ok, notok);

                function ok(response) {
                    $scope.jsonarryALL = response.data;

                }

                function notok(response) {
                    alert(response)
                }
            }
            
            
            
        });

    </script>
    

    <!--
     Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        body {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            font-family: "Montserrat"

        }

        .navbar-color {
            background-color: maroon;
        }

        .navbar-text {
            color: white; 
        }
        .header
        {
            background-image: url(uploads/Pop%20No%20Cap.png);
            background-size: contain;
            background-repeat: no-repeat;
            height: 65px;
        }

    </style>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchAll();">
    <!--Navabr-->
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-color ">
            <div class="container-fluid">
                <img src="uploads/Pop%20No%20Cap.png" style="width:70px;height:65px;" alt="">
                <p class="navbar-brand navbar-text" style="font-weight:bolder;font-size:30px;">BOOK MY MOVIE</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
    </header>

    <!-- -->
    <div class="container border" bg-color="red" style="margin-top:85px;">
        <div class="col-md-10 offset-md-1 text-center title" style="margin-bottom:5px;color:red;">
            <h2>Tickets</h2>
        </div>
        <br><br>
        
        
        <div class="row">

            <div class="child mt-5 col-md-10 border form-group" style="margin-left:70px;" ng-repeat="obj in jsonarryALL">
                <div class="row">
                    <div class="col-md-7 mt-2 form-group">
                        <div class="card border-info mb-3" style="width: 40rem;">
                            <div class="card-header header"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{obj.movie}}</h5>
                                <p class="card-text mt-4">
                                <table class=" table table-striped table-borderless">
                                   <tr>
                                       <th>Screen {{obj.screen_no}}</th>
                                   </tr>
                                    <tr>
                                        <th>{{obj.theatre_name}}</th>
                                        <th>{{obj.location}}</th>
                                        
                                    </tr>
                                    <tr>
                                        <th>{{obj.date}}</th>
                                        <th>{{obj.time}}</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Seat No. -  {{obj.seats}}
                                        </th>
                                        <th></th>
                                        <th>
                                            Amount - {{obj.amount}}
                                        </th>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 offset-md-2">
                      <form  action="get-ticket.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" value={{obj.booked_id}} id="hid" name="hid">
                        <input class="btn btn-outline-info mt-5" type="submit" value="Download Ticket">
                      </form>
                       
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</body>

</html>

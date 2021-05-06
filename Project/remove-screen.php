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


    <!--     Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {

                    $scope.jsonArryAll;
                    $scope.fetchall = function() {
                        $http.get("json-screen-fetch.php").then(ok, notok);

                        function ok(response) {
                            $scope.jsonArryAll = response.data;
                        }

                        function notok(response) {
                            alert(response);
                        }
                    }

                    //-----------------------------
                    $scope.dodelete = function(index) {
                        $scope.id = $scope.jsonArryAll[index].screen_Id;
                        //alert($scope.id);

                        if (confirm("Are you sure you want to delete this Screen?") == true) 
                        {
                            //alert("OK"+index);
                            $http.get("remove-screen-form.php?screen=" + $scope.id).then(ok, notok);

                            function ok(response) {
                                alert(response.data);
                                $scope.fetchall();
                            }

                            function notok(response) {
                                alert(response);
                            }
                            
                        } 

                            
                        }

                    });

    </script>
    <style>
        td {
            text-align: center;
            font-weight: bolder;
            font-family: monospace;
        }

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

    </style>

</head>

<body style="background-color:lightcyan;" ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchall();">

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

    <div class="col-md-10 offset-md-1 text-center" style="margin-top:80px;margin-bottom:30px;">
        <h2>
            <font color="black"><b><u>Remove Screen</u></b></font>
        </h2>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th class="text-center">Theatre Name</th>
                <th class="text-center">Location</th>
                <th class="text-center">Screen No.</th>
                <th class="text-center">Currently Showing</th>
                <th class="text-center"></th>
            </tr>
            <tr ng-repeat="recordobj in jsonArryAll">
                
                <td>{{recordobj.theatre_name}}</td>
                <td>{{recordobj.location}}</td>
                <td>{{recordobj.screen_no}}</td>
                <td>{{recordobj.movie}}</td>
                <td>
                    <div class="btn btn-outline-danger" ng-click="dodelete($index)">Delete</div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

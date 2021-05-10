<?php
session_start();
if(!isset($_SESSION["email"]))
    header("location:index.html");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>BookMyMovie</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    
    
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
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

        .container {
            max-width: 960px;
        }

        .Confirm {
            width: 200px;
            padding: 10px;
            margin-left: 10px;
        }

        .logo {
            width: 300px;
            height: 150px;
        }

    </style>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

    </script>
    <script>
        $(document).ready(function(){
            
            var screen = parseInt(<?php echo $_GET["screen_Id"] ?>);
            
            $.getJSON("json-checkout.php?screen_Id="+screen,function(array){
                
               $("#Name").val(array[0].name);
                $("#movie").val(array[0].movie);
                $("#theatre").val(array[0].theatre_name);
                $("#location").val(array[0].location);
                $("#hid").val(array[0].cus_ID);
                $("#hid2").val(screen);
                $("#hid3").val(array[0].screen_no);
                $("#amount").val(50*$("#tickets").val().split(',').length);
                
            });
            
            $("#home").hide();
            
            
            //--------------------
            $("#cancel").click(function(){
                if(confirm("Are you Sure you want to Cancel the Transaction?"))
                    window.location="movies.php";
            });
            
             window.history.pushState(null, "", window.location.href);        
           
            $("#form").submit(function(){
                alert("Tickets booked successfully!");
                 window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            };
                $("#cancel").hide();
                $("#home").show();
                $("#book").hide();
                
            });
            
            $("#home").click(function(){
                window.location="movies.php";
            });
            
            
            
            
            
        });
    </script>


</head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img src="uploads/Logo1.png" class="logo" alt="">
                <h2>Checkout form</h2>

            </div>

            <div class="row g-5">

                <div class="col-md-7 col-lg-8">
                    <form  id="form" class="needs-validation" action="checkout-form.php" method="post" enctype="multipart/form-data">
                       <input type="hidden" id="hid" name="hid">
                       <input type="hidden" id="hid2" name="hid2">
                       <input type="hidden" id="hid3" name="hid3">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" name="Name" placeholder="" readonly>
                                <div class="invalid-feedback">
                                    Valid Name is required.
                                </div>
                            </div>



                            <div class="col-12">
                                <label for="username" class="form-label">Movie Name</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="movie" name="movie" placeholder="Name of the movie" readonly>
                                </div>
                            </div>


                            <div class="col-6">
                                <label for="address" class="form-label">Theatre</label>
                                <input type="text" class="form-control" id="theatre" name="theatre" placeholder="Theatre Name" readonly>

                            </div>
                            <div class="col-6">
                                <label for="address" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location" readonly>

                            </div>
                            
                           

                            <div class="col-md-3">
                                <label for="country" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date" value='<?php echo $_GET["date"] ?>' readonly>
                            </div>


                            <div class="col-md-3">
                                <label for="zip" class="form-label">Time</label>
                                <input type="text" class="form-control" id="time" name="time" value='<?php echo $_GET["time"] ?>' readonly>

                            </div>
                            
                            <div class="col-md-5">
                                <label for="zip" class="form-label">Tickets</label>
                                <input type="text" class="form-control" id="tickets" name="tickets" value='<?php echo $_GET["tickets"] ?>' readonly>

                            </div>



                            <hr class="my-4">

                            <h4 class="mb-3">Payment</h4>
                        </div>



                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Total Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount"  readonly>
                                    <small class="text-muted">Price of one ticket is 50Rs.</small>

                                </div>
                            </div>

                            <hr class="my-4">

                            <input type="submit" class="Confirm btn btn-success" style="float:left;" id="book" value="Confirm booking">
                    </form>
                    <button class="Confirm btn btn-danger" id="cancel" style="float:left;">Cancel</button>
                    <button class="Confirm btn btn-primary" id="home">Home</button>
                </div>
                </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">©2021 BookMyMovie</p>

        </footer>
    </div>
</body>

</html>

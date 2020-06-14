<?php
session_start();
if(isset($_SESSION['email'])){
    echo '<script>window.open("index.php","_self")</script>';

}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="assets/css/styles.css" rel="stylesheet" />

        <style type="text/css">
        	body{
        		background-color: rgba(149, 153, 156, 0.4);
        	}
        </style>
    </head>
    <body>

                    <div class="container">
                        <div class="row justify-content-center" style="margin-top: 7%;">

                            <div class="col-lg-5">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="loginalert">

                                    </div>
                                    <div class="alertx alert alert-success collapse" >
                                        <strong>Success !</strong> Log in Sucessfully.
                                    </div>
                                    <div class="card-header"><h3 style="font-family: times new roman" class="text-center my-4">ADMIN LOGIN</h3></div>
                                    <div class="card-body">

                                        <form id="logsubmit" action="" method="POST">
                                            <div class="form-group"><label class="small mb-1" for="Email">Email</label><input class="form-control py-4" id="Email" name="email" type="email" placeholder="Enter email address" required /></div>
                                            <div class="form-group"><label class="small mb-1" for="Password">Password</label><input class="form-control py-4" id="Password" name="password" type="password" placeholder="Enter password" required /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPass" type="checkbox" /><label class="custom-control-label" for="rememberPass">Remember password</label></div>
                                            </div>
                                            <div class="float-left d-block"><img id="loginloadbar" src="assets/img/login.gif" alt="" width="50" height="50" style="margin-top: -16px;display: none"></div>

                                            <div class="form-group d-flex align-items-center justify-content-end mt-3 mb-0" ><input type="submit" name="Submit" value="login" class="btn btn-primary"></div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>


    </body>
</html>

<script>
    $(document).ready(function () {
        $("#logsubmit").on("submit",function (event) {
            event.preventDefault();
             var email = $("#Email").val();
             var pass = $("#Password").val();

             $.ajax({
                 url:'loginbackground.php',
                 type:'post',
                 data:{
                     email : email,
                     password: pass


                 },
                 beforeSend:function(){
                    $("#loginloadbar").show();
                 },
                 success: function (res) {
                     console.log(res);

                     if (res == 1) {
                         $("#loginloadbar").hide();
                         $(".alertx").show();
                         setTimeout(function () {
                             $(".alertx").hide();
                         }, 1700);

                         setTimeout(function () {
                             window.open("index.php", "_self");
                         }, 1800)
                         $(".loginalert").html("");

                     } else {
                         $("#loginloadbar").hide();
                         $(".loginalert").html(res);


                     }


                 }
             })

        })
    })
</script>

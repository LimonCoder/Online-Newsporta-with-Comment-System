<?php
require_once ('admin/include/config.php');
include('data-format.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        a{
            text-decoration: white;
        }
    </style>
</head>
<body style="font-family: 'Times New Roman'">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #005cbf">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" height="50"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            	<li class="nav-item">
                    <a class="nav-link text-white" style="font-size: 20px" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="font-size: 20px" href="about-us.php">ABOUT</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row" style="margin-top: 9%">
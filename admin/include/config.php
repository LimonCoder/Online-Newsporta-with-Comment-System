<?php
    session_start();
    define("DB_SERVER","localhost");
    define("DB_ADMIN","root");
    define("DB_PASSWORD","");
    define("DB_NAME","onlinenewsportal");

    $con = mysqli_connect(DB_SERVER,DB_ADMIN,DB_PASSWORD,DB_NAME);

    if (mysqli_connect_errno()){
        die("database connection failed");
    }
?>
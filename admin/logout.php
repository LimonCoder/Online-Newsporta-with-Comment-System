<?php
require_once 'include/config.php';

if (isset($_SESSION['email'])) {
    session_destroy();

}

if ($_COOKIE['email'] && $_COOKIE['password']) {
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
}




mysqli_close($con);
header("location:login.php");

?>
<?php

require_once 'include/config.php';

$success = 0;




if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $query = "SELECT tableadmin.adminusername, tableadmin.adminPassword, tableadmin.adminEmail FROM tableadmin WHERE tableadmin.adminusername = '$email' || tableadmin.adminEmail = '$email'";
    $sql = mysqli_query($con, $query);
    $rows = mysqli_fetch_array($sql);

    if ($rows > 0) {

        if ($rows['adminPassword'] == $password) {
            $_SESSION['email'] =  $email;
            $success = 1;
            sleep(2);
            echo $success;
        } else {
            sleep(2);
            echo ' <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Invaild !! </strong> Your password is wrong
                                        </div>';
        }


    } else {
        sleep(2);
        echo ' <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Invaild !! </strong> Your Email is Invaild
                                        </div>';
    }

}


?>
<?php
    require_once ('include/config.php');

    $id = $_POST['id'];
    $query = "UPDATE tblesubcatagory SET Active = 0 WHERE id = $id";
    $succes = mysqli_query($con, $query);

    if ($succes)
    {
        $query1 = "SELECT tblesubcatagory.*, tblecatagory.catagoryname catagory
                        FROM tblesubcatagory
                        JOIN tblecatagory
                        on tblesubcatagory.catagoryid = tblecatagory.id WHERE Active = 0";
        $results = mysqli_query($con, $query1);

       echo json_encode(mysqli_fetch_all($results));

    }

?>
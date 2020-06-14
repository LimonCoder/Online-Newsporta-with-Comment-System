<?php
    include('include/config.php');
    $succesdelete = 0;

    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM tblecatagory WHERE id =  $id";

        $success = mysqli_query($con,$query);

        if ($success){
            $succesdelete = 1;
            echo $succesdelete;
        }else{
            $succesdelete;
        }

    }



?>
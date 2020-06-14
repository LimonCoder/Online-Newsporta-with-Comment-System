<?php
    include('include/config.php');
    $succesdelete = 0;

    if (isset($_POST['catagorydeleteid'])){
        $id = $_POST['catagorydeleteid'];
        $query = "UPDATE tblecatagory SET isActive = 0 WHERE id = $id";

        $success = mysqli_query($con,$query);

        if ($success){
            $succesdelete = 1;
            echo $succesdelete;
        }else{
            $succesdelete;
        }

    }



?>
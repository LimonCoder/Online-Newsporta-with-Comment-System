<?php
    require_once('include/config.php');
    $errors = [];
    if ($_POST['catagory'] && $_POST['subcatagory'] && $_POST['subcatagorydescription'] ){

        if ($_POST['catagory'] != "select"){
            $catagory = $_POST['catagory'];
        }else{
            $errors['emptycatagory'] = "select";
        }

        $subcatagory =  $_POST['subcatagory'];

        // Sub catagory description validation
        if (strlen($_POST['subcatagorydescription']) >= 6){
            $subcatagorydescription = $_POST['subcatagorydescription'];
        }else{
            $errors['invalidsubcatagorydis'] = "invalid";
        }

        if (count($errors) == 0){
            $query = "INSERT INTO tblesubcatagory VALUES (NULL ,$catagory,'$subcatagory','$subcatagorydescription', NULL, NULL,1)";
            $success = mysqli_query($con,$query);
            if ($success){
                sleep(2);
                echo json_encode("success");
            }else{
                sleep(2);
                echo json_encode("faild");
            }
        }else{
            sleep(1);
            echo json_encode($errors);
        }
    }
?>
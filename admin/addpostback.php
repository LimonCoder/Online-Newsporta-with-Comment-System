<?php
require_once ('include/config.php');

$errors = array();
$save = 0;

if (!empty($_POST['posttittle'])) {
    $post_tittle = $_POST['posttittle'];
} else {
    $errors['post'] = '*';
}

if ($_POST['catagory'] != "select") {
    $catagory = $_POST['catagory'];
} else {
    $errors['catagory'] = "*";
}

if ($_POST['subcatagory'] != "select") {
    $subcatagory = $_POST['subcatagory'];
} else {
    $errors['subcatagory'] = "*";
}
if ($_POST['postdetails'] != "") {
    $post_detetails = strip_tags($_POST['postdetails']);
}else {
    $errors['postdetails'] = '*';
}

$imagename = explode(".",$_FILES['postimage']['name']);
$imgextension = ["jpg","jpeg"];
if (in_array(end($imagename),$imgextension)){
    $postimagename = rand(11111,99999).".".end($imagename);
    $postimagetmp = $_FILES['postimage']['tmp_name'];


}else{
    $errors['imageinvaliedex'] = "invalid Extension";
}
if (count($errors) == 0){

    $query = "INSERT INTO tblepost VALUES (NULL, '$post_tittle', $catagory, $subcatagory,'$post_detetails','$postimagename',NULL ,NULL, 1)";

    $success = mysqli_query($con, $query);

    if ($success){
        move_uploaded_file( $postimagetmp, "assets/img/".$postimagename);
        $save = 1;
        echo json_encode($save);
    }else{
        echo json_encode($save);
    }

}else{
    echo json_encode($errors);
}




?>
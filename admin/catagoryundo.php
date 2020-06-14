<?php 
	 include('include/config.php');
	 $undo = 0;
	if (isset($_POST['delid'])) {
		
		$sid = $_POST['delid'];
		$query = "UPDATE tblecatagory SET isActive = 1 WHERE id = $sid";

        $success = mysqli_query($con,$query);

        if ($success) {
        	$undo = 1;
        	echo $undo;
        }else{
        	echo $undo;
        }
	}

?>
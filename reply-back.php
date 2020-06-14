<?php
include ('includes/News.php');

$reply = new News();

$res = $reply->repyComment($_POST);

echo json_encode($res);

?>
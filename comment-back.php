<?php
include ('includes/News.php');


$comment = new News();

$value = $comment->newsComment($_POST);

echo json_encode($value);


?>
<?php
    
//session_start();
require $_SERVER['DOCUMENT_ROOT']."/account/db.php";
require $_SERVER['DOCUMENT_ROOT']."/load/load.php";

//grab the latest 4 events from database
$query = mysqli_query($mysqli,"SELECT * FROM event order by event.postdate");
$Story_query = mysqli_query($mysqli,"SELECT * FROM stories order by stories.date");

$eventlist = resultToArray($query);
$storylist = resultToArray($Story_query);
?>





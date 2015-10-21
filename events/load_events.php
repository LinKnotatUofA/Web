<?php
    
<<<<<<< HEAD
//session_start();
require "/account/db.php";

=======
session_start();
require $_SERVER['DOCUMENT_ROOT']."/account/db.php";
require $_SERVER['DOCUMENT_ROOT']."/load/load.php";
>>>>>>> 8e5f0dc7b537bc290b85f4cd9876b89778c4c9bd
//grab the latest 4 events from database
$query = mysqli_query($mysqli,"SELECT * FROM event order by event.postdate");
$Story_query = mysqli_query($mysqli,"SELECT * FROM stories order by stories.date");

$eventlist = resultToArray($query);
$storylist = resultToArray($Story_query);
?>





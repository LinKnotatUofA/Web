<?php

require $_SERVER['DOCUMENT_ROOT']."/account/db.php";

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function resultToAssoc($result)
{

    return mysqli_fetch_assoc($result);
}

function getinfo($iID,$mysqli,$command)
{
    //"SELECT * FROM user_preferences WHERE user_id ='$id'"
    //"SELECT DAYOFWEEK(TIME) AS DAY FROM event WHERE EVENTID = '$ID'"
    //"SELECT * FROM event WHERE EVENTID = '$ID'"
    //"SELECT * FROM stories WHERE story_id = '$ID'"
    //"SELECT * FROM comment WHERE c_story_id = '$ID'"
    //"SELECT * FROM comment WHERE c_event_id = '$ID'"
    //"SELECT username FROM user WHERE id='$ID'"
    $ID = $iID;
    $string = $command."'$ID'";
    //echo "$string<br>";
    $query = mysqli_query($mysqli,$string);
    if ( false===$query ) {
        printf("error: %s\n", mysqli_error($mysqli));
        //die();
    }
    $qresult = resultToArray($query);
    return $qresult;

}
$query = mysqli_query($mysqli,"SELECT * FROM event order by event.postdate");
$Story_query = mysqli_query($mysqli,"SELECT * FROM stories order by stories.date");

$eventlist = resultToArray($query);
$storylist = resultToArray($Story_query);

?>
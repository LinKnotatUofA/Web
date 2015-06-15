<?php
    

$mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");

//grab the latest 4 events from database
$query = mysqli_query($mysqli,"SELECT * FROM event");

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
$eventlist = resultToArray($query);

function geteventinfo($eID)
{
    $mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");
    $singleventquery = mysqli_query($mysqli,"SELECT * FROM event WHERE EVENTID = '$eID'");
    $singleventproperty = resultToArray($singleventquery);
    return $singleventproperty;
}

//print_r($eventlist[0]['EVENTID']);

function printusername($ID)
{
    $mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");
    $query = mysqli_query($mysqli,"SELECT username FROM user WHERE id='$ID'");
    
    $authorname ="";
    while($row = mysqli_fetch_assoc($query))
    {
        $authorname = $row['username'];
    }
   
    echo "$authorname";
    
}

?>





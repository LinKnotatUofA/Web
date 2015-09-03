<?php
    
session_start();
require "/account/db.php";

//grab the latest 4 events from database
$query = mysqli_query($mysqli,"SELECT * FROM event order by event.postdate");
$Story_query = mysqli_query($mysqli,"SELECT * FROM stories order by stories.date");
function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
$eventlist = resultToArray($query);
$storylist = resultToarray($Story_query);

function geteventinfo($eID)
{
    $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
    $singleventquery = mysqli_query($mysqli,"SELECT * FROM event WHERE EVENTID = '$eID'");
    $singleventproperty = resultToArray($singleventquery);
    return $singleventproperty;
}
function geteventday($eID)
{
    $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
    $singleventquery = mysqli_query($mysqli,"SELECT DAYOFWEEK(TIME) AS DAY FROM event WHERE EVENTID = '$eID'");
    $singleventproperty = resultToArray($singleventquery);
    return $singleventproperty[0]['DAY'];
}
//these two gotta be merged during code cleanup
function getstoryinfo($sID)
{
    $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
    $singlestoryquery = mysqli_query($mysqli,"SELECT * FROM stories WHERE story_id = '$sID'");
    $singlestoryproperty = resultToArray($singlestoryquery);
    return $singlestoryproperty;
}
function getcommentinfo($cID)
{
    $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
    $commentquery = mysqli_query($mysqli,"SELECT * FROM comment WHERE c_story_id = '$cID'");
    $commentproperty = resultToArray($commentquery);
    return $commentproperty;

}

//print_r($eventlist[0]['EVENTID']);

function printusername($ID)
{
    $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
    $query = mysqli_query($mysqli,"SELECT username FROM user WHERE id='$ID'");
    
    $authorname ="";
    while($row = mysqli_fetch_assoc($query))
    {
        $authorname = $row['username'];
    }
   
    echo "$authorname";
    
}
?>





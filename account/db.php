<?php

$mysql_hostname = "us-cdbr-azure-west-c.cloudapp.net";
$mysql_username = "bea1032a957a19";
$mysql_password = "c03cc102";
$mysql_database = "bsquared";
$mysqli = mysql_connect ($mysql_hostname,$mysql_username,$mysql_password,$mysql_database) or die("something is broken");

mysql_select_db($mysql_database,$db) or die("couldn't find database");

?>
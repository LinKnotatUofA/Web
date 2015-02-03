<?php

$mysql_hostname = "127.0.0.1";
$mysql_username = "root";
$mysql_password = "goodtogo";
$mysql_database = "bsquared_user";
$db = mysql_connect ($mysql_hostname,$mysql_username,$mysql_password,$mysql_database) or die("something is broken");

mysql_select_db($mysql_database,$db) or die("couldn't find database");

?>
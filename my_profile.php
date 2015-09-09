<?php 
    session_start();
	$id = $_SESSION['id'];
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - Home</title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="building bridges,b squared,b^2,uofa,u of a,university,of,alberta" />
<meta name="description" content="B squared is a service provided by the University of Alberta Bridge Builder team to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #3CB6CE;
    color: #FFFFFF;
}
</style>

<?php
	echo "$id";
	$user_info = mysqli_query($mysqli,"SELECT firstn, lastn, birthdays FROM user_preferences WHERE id ='$id'");
	$result =mysqli_fetch_assoc($user_info);
	printf("Name: %s %s", $result["firstn"], $result["lastn"]);
	printf("Born on: %s", $result[birthdays]);
	
	



?>
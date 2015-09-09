<?php 
    session_start();
	require "/account/db.php"
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
	$user_info = mysqli_query($mysqli,"SELECT firstn FROM user_preferences WHERE id ='$id'");
	$info = resultToArray($user_info);
    print_r($info[0]['firstn']);
	//print_r($info[0]['lastn']);
	//print_r($info[0]['birthdays']);
	
	



?>
<?php 
	require "/account/db.php";
    require "/events/load_events.php";
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$date_array = resultToArray($dates);
	$length =  mysqli_num_rows($dates);
	$today = date("y-m-d");
	echo "<br>";
	for ($i=0; $i < $length; $i++){
		if ($date_array[$i]['TIME'] < $today)
			print_r($date_array[$i]['TIME']);
			echo "it is less";
			echo "<br>";
		else
			print_r($date_array[$i]['TIME']);
			echo"it is after";
			echo "<br>";
	}
	
	
	mysqli_close($mysqli);

	














?>
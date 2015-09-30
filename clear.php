<?php 
	require "/account/db.php";
    require "/events/load_events.php";
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$date_array = resultToArray($dates);
	$length =  mysqli_num_rows($dates);
	
	echo "<br>";
	for ($i=0; $i < $length; $i++){
		print_r($date_array[$i]['TIME']);
		echo "<br>";
		echo "yes";
	}
	
	
	mysqli_close($mysqli);

	














?>
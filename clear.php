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
		$checkdate = $date_array[$i]['TIME'];
		if ($checkdate > $today){
			
			echo "$checkdate is newer than $today";
			echo "<br>";
		}
		else
			echo"$checkdate it is older than $today";
			echo "<br>";
	}
	
	
	mysqli_close($mysqli);

	














?>
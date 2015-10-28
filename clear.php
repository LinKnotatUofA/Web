<?php 
	require "/account/db.php";
    require "/events/load_events.php";
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$date_array = resultToArray($dates);
	$length =  mysqli_num_rows($dates);
	$today = date("y-m-d");
	echo "Today is: $today";
	$todayDateStr = strtotime($today);
	echo "<br>";
	for ($i=0; $i < $length; $i++){
		$checkdate = $date_array[$i]['TIME'];
		$checkDateStr = strtotime($checkdate);
		if ($checkDateStr > $todayDateStr){
			print_r("$checkdate");
			echo "<br>";
		}
		else{
            
			$delDate =  mysqli_query($mysqli, "DELETE FROM event WHERE TIME < $today");
			if (false === $delDate){
				//printf("Error: %s\n", mysqli_error($delDate));
			}
		}
	}
	
	
	mysqli_close($mysqli);

	














?>
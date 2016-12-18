<?php 
	require "/account/db.php";
    require "/events/load_events.php";
	$mysqli = new mysqli("ca-cdbr-azure-central-a.cloudapp.net", "b9ae261f027fe3", "cbb2cfa0", "linknotdata");
	
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
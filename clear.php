<?php 
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$date_array = resultToArray($dates);
	$length =  mysqli_fetch_lengths($dates);
	printf("Len = $length ");
	echo "yes";

	for ($i=0; $i < $length; $i++){
		printf("$date_array[$i]['TIME']);
		printf("<br>");
	}
	
	mysqli_close($mysqli);

	














?>
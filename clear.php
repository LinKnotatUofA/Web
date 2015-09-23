<?php 
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");

	$date_array = mysqli_fetch_assoc($dates);
	$length =  mysqli_num_rows($dates);
	printf("Len = $length ");

	for ($i=0; $i < $length; $i++){
		print_r("$date_array[$i]['TIME']");
		echo "<br>";
	}
	
	mysqli_close($mysqli);

	














?>
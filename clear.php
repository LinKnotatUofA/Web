<?php 
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$date_array = resultToArray($dates);
	$length =  mysqli_num_rows($dates);
	printf("Len = $length ");
	echo "len is =$len";
	echo "<br>";
	for ($i=0; $i < $length; $i++){
		echo "$i";
		print_r($date_array[$i]['TIME']);
		echo "<br>";
	}
	
	mysqli_close($mysqli);

	














?>
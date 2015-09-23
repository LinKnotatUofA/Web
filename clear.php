<?php 
	$link = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
	
	$dates =  mysqli_query($mysqli, "SELECT TIME FROM event");
	$result = mysqli_query($link, $dates);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	print_r($row[1]);
	/*$date_array = mysqli_fetch_array($dates);
	$length =  mysqli_num_rows($dates);
	printf("Len = $length ");
	echo "len is =$len";
	echo "<br>";
	for ($i=0; $i < $length; $i++){
		echo "$i";
		print_r($date_array[$i]['TIME']);
		echo "<br>";
	}*/
	
	mysqli_close($mysqli);

	














?>
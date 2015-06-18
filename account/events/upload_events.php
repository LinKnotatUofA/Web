<html>

<head>

<?php

session_start();

$description = @$_POST['description'];
$date = @$_POST['date'];
$postdate = date('Y-m-d') ;
$lat = @$_POST['lat'];
$long = @$_POST['long'];
$type = @$_POST['type'];
$submit = @$_POST['submit'];
$userID= $_SESSION('ID');
$ID = 100;

$mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//attempt to include a new ID 
$query = mysqli_query($mysqli,"SELECT EVENTID FROM event WHERE EVENTID=$ID");

$numrows = mysqli_num_rows($query);

while($numrows > 0)
{
    $ID = rand(1,10000);
    $query = mysqli_query($mysqli,"SELECT EVENTID FROM event WHERE EVENTID=$ID");
    $numrows = mysqli_num_rows($query);
}

/* check connection */


if($submit){
    
    if($description == null)
    {
        echo"no description";
        exit();
    }
    if($date == null)
    {
        echo"no date";
        exit();
    }
    if($lat==null || $long==null)
    {
        echo"not a legit location";
        exit();
    }
    if($type==null)
    {
        echo"what kind of event is it?";
        exit();
    }
    $insert=mysqli_query($mysqli,"INSERT INTO event VALUES ('$ID','$date','$postdate','$lat','$long','$description','$type','$userID')");
    
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    else    
        echo "registration successful";
    
}

?>

</head>


<body>
    <form id="form1" method ="post">  
        <p>Is it for fun or academic? <input name ="type" type="text" /></p> 
       	<p>Describe what you're gonna do: <input name ="description" type="text" /></p> 
        <p>At what time: <input name ="date" type="datetime-local" /></p>
        <p>lat: <input name ="lat" type="number" step="any"/> long:<input name ="long" type="number" step="any"/></p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>		
    </form>
</body>
</html>
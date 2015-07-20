<?php 

session_start();


$mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* check connection */


if(isset($_POST['submit'])){
	
    $group_name = $_POST['type'];
	$description  = $_POST['description'];
	$tags = $_POST['tags'];
	$ID = 100;
	$query = mysqli_query($mysqli,"SELECT ID FROM user WHERE ID=$ID");
	if($query == true){
		$numrows = 0;
	}
	else{
		    $numrows = mysqli_num_rows($query);
            while($numrows >= 0)
	        {
	            $ID = rand(1,10000);
	            $query = mysqli_query($mysqli,"SELECT GID FROM groups WHERE ID=$ID");
	            $numrows = mysqli_num_rows($query);
	        }
        }
    print "<p> Name: $group_name</br>Describe: $description<br>Tags: $tags<br> ID: $ID</p>";
    
	
	$query = mysqli_query($mysqli, "INSERT INTO groups VALUES ('$ID','$group_name','$tags','$description','NULL')");
    if ( false===$query ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    
}

	?>	

<html>
<body>
    <h3>Group Form</h3>
    <form id="form1" method ="post" enctype="multipart/form-data" action = "form.php">  
        <p>Group Name <input name ="type" type="text" /></p> 
       	<p>Describe what you're gonna do: <input name ="description" type="text" /></p> 
        <p>Tags: <input name="tags" type="text" /></p>
        
        <p>
            <label>Upload your image</label>
                     <input type="file" name="image"/>       
        </p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>
    </form>
</body>
</html>
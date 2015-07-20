<?php 

session_start();


$mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* check connection */


if(isset($_POST['submit'])){
}


?>
<html>
<body>
    <h3>Group Form</h3>
    <form id="form1" method ="post" enctype="multipart/form-data" action = "form.php">  
        <p>Group Name <input name ="type" type="text" /></p> 
       	<p>Describe what you're gonna do: <input name ="description" type="text" /></p> 
        <p>Tags: <input name="tags" type="date" /></p>
        
        <p>
            <label>Upload your image</label>
                     <input type="file" name="image"/>       
        </p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>
    </form>
</body>
</html>
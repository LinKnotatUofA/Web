<html>

<head>

<?php

session_start();


$mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* check connection */


if(isset($_POST['submit'])){

    $description = @$_POST['description'];
    $date = @$_POST['date'];
    $postdate = date('Y-m-d') ;
    $lat = @$_POST['lat'];
    $long = @$_POST['long'];
    $type = @$_POST['type'];
    $img = $_FILES['image']['tmp_name'];
    $userID= $_SESSION['id'];
    $ID = 100;
    //attempt to include a new ID 
    $query = mysqli_query($mysqli,"SELECT EVENTID FROM event WHERE EVENTID=$ID");
    
    $numrows = mysqli_num_rows($query);
    
    while($numrows > 0)
    {
        $ID = rand(1,10000);
        $query = mysqli_query($mysqli,"SELECT EVENTID FROM event WHERE EVENTID=$ID");
        $numrows = mysqli_num_rows($query);
    }
    
    
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
    
    
    
    
    if (!file_exists($img))
    {
        echo "we don have an image";
        $insert=mysqli_query($mysqli,"INSERT INTO event VALUES ('$ID','$date','$postdate','$lat','$long','$description','$type','$userID',NULL,NULL,NULL)");
    }
    else if (file_exists($img))
    {
        echo "we have an image";
        $image = addslashes(file_get_contents($img));
        $source = imagecreatefromjpeg($img);
        
        $size = 150; // new image width for thumbnail
        $size2 = 600; // new image width for regular size
            
        $width = imagesx($source);
        $height = imagesy($source);
        $ratio = $height/$width;
        
        if ($width <= $size) {
            $new_w = $width;
            $new_h = $height;
        } else {
            $new_w = $size;
            $new_h = abs($new_w * $ratio);
        }
        
        if ($width <= $size2) {
            $new_w2 = $width;
            $new_h2 = $height;
        } else {
            $new_w2 = $size2;
            $new_h2 = abs($new_w2 * $ratio);
        }
        
        $new_img = imagecreatetruecolor($new_w,$new_h); //For the thumbnail
        $new_img2 = imagecreatetruecolor($new_w2,$new_h2);; //For the normal size
        imagecopyresized($new_img,$source,0,0,0,0,$new_w,$new_h,$width,$height); //new_img is the thumbnail as an image
        imagecopyresized($new_img2,$source,0,0,0,0,$new_w2,$new_h2,$width,$height); //new_img2 is the normal size as an ima
        //Convert back to binary to put into blob
        ob_start();
        imagejpeg($new_img);
        $new_image_string = ob_get_contents();
        ob_end_clean();
        $thumbnail = addslashes($new_image_string);
        
        ob_start();
        imagejpeg($new_img2);
        $new_image_string2 = ob_get_contents();
        ob_end_clean();
        $normalSize = addslashes($new_image_string2);
        
        $insert=mysqli_query($mysqli,"INSERT INTO event VALUES ('$ID','$date','$postdate','$lat','$long','$description','$type','$userID','$thumbnail','$normalSize','$image')");
    }
    
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    else    
        echo "registration successful,sending you back to home page";
    //header( "refresh:3; url=/index.php" ); 
    
}

?>

</head>


<body>
    <form id="form1" method ="post" enctype="multipart/form-data">  
        <p>Is it for fun or academic? <input name ="type" type="text" /></p> 
       	<p>Describe what you're gonna do: <input name ="description" type="text" /></p> 
        <p>At what time: <input name ="date" type="date" /></p>
        <p>lat: <input name ="lat" type="number" step="any"/> long:<input name ="long" type="number" step="any"/></p>
        <p>
            <label>Upload your image</label>
                     <input type="file" name="image"/>       
        </p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>
    </form>
</body>
</html>
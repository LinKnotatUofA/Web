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

// checklist of crap we need to upload 

if(isset($_POST['submit'])){

    $title= @$_POST['story_title'];
    $date = @$_POST['story_content'];
    $postdate = date('Y-m-d') ;
    $userID= $_SESSION['id'];
    $ID = 100;
    //attempt to include a new ID 
    $query = mysqli_query($mysqli,"SELECT story_id FROM stories WHERE story_id=$ID");
    
    $numrows = mysqli_num_rows($query);
    
    while($numrows > 0)
    {
        $ID = rand(1,10000);
        $query = mysqli_query($mysqli,"SELECT story_id FROM stories WHERE story_id=$ID");
        $numrows = mysqli_num_rows($query);
    }
    

        
     //all stories have a default rating of 3 ramen-sauce ridden keyboards out of 5   
    $insert=mysqli_query($mysqli,"INSERT INTO event VALUES ('$ID','$story_title','$userID','$story_content','3','$postdate')");

    }
    
    
    

   
    

?>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <link rel="stylesheet" type="text/css"
    href="https://js.api.here.com/v3/3.0/mapsjs-ui.css" />
  <script type="text/javascript" charset="UTF-8"
    src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
  <script type="text/javascript" charset="UTF-8"
    src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
  <script type="text/javascript" charset="UTF-8"
    src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
  <script type="text/javascript" charset="UTF-8"
    src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
</head>





</html>
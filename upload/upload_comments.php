<html>

<head>

<?php

session_start();


$mysqli = new mysqli("us-cdbr-azure-northcentral-a.cleardb.com", "ba30dbdb2d10ef", "272e799b", "bsquared_user");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* check connection */

// checklist of crap we need to upload 

// if comment came from a story - use post[comment_story]
// if comment came from an event - use post[comment_event]

if(isset($_POST['comments'])){

    $story_comment= @$_POST['comment'];
    $story_id = @$_POST['content_id'];
    //set timezone to edmonton
    date_default_timezone_set('Canada/Edmonton');
    $postdate = date('Y-m-d H:i:s') ;
    $userID= $_SESSION['id'];
    $count = mysqli_query($mysqli,"SELECT COUNT(c_id) as total FROM comment");
    $data=mysqli_fetch_assoc($count); 
    $ID = $data['total']+1; 
    

        
    $insert=mysqli_query($mysqli,"INSERT INTO comment VALUES ('$ID','$userID','$postdate','$story_comment','$story_id')");
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    else
    {
        header( "refresh:1; url=/single_stories.php?id=$story_id" ); 
    }
    


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
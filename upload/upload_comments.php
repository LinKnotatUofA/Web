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

if(isset($_POST['comment_story'])){

    $story_comment= @$_POST['comment'];
    //set timezone to edmonton
    date_default_timezone_set('Canada/Edmonton');
    $postdate = date('Y-m-d H:i:s') ;
    $userID= $_SESSION['id'];
    $count = mysqli_query($mysqli,"SELECT COUNT(GID) as total FROM GROUPS");
    $data=mysqli_fetch_assoc($count); 
    $ID = $data['total']+1; 
    

        
     //all stories have a default rating of 3 ramen-sauce ridden keyboards out of 5   
    $insert=mysqli_query($mysqli,"INSERT INTO stories VALUES ('$ID','$story_title','$userID','$story_content','3','$postdate')");
    echo "post was successful";
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    header( "refresh:1; url=/post.php" ); 


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
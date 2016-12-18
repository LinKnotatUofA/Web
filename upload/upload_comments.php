<html>

<head>

<?php

session_start();


require $_SERVER['DOCUMENT_ROOT']."/account/db.php";


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
    $content = @$_POST['content_id'];
    //set timezone to edmonton
    date_default_timezone_set('Canada/Edmonton');
    $postdate = date('Y-m-d') ;
    $userID= $_SESSION['id'];
    $count = mysqli_query($mysqli,"SELECT COUNT(c_id) as total FROM comment");
    $data=mysqli_fetch_assoc($count); 
    $ID = $data['total']+1; 
    $type = @$_POST['istype'];
    $event_id = '`c_event_id`';
    $story_id = '`c_story_id`';
    $url = '';
    $text = '`c_id`, `c_author`, `c_date`, `c_content`,';
    if($type == 'stories')
    {
        $text = $text.$story_id;
       
        $url = "single_stories.php?id=";
    }
    else if($type == 'events')
    {
        $text = $text.$event_id;
        $url = "event.php?id=";
    }
    $command = "INSERT INTO comment ($text) VALUES ('$ID','$userID','$postdate','$story_comment','$content')";
    //echo $command;
    //"INSERT INTO ``.`comment` (`c_id`, `c_author`, `c_date`, `c_content`, `c_story_id`, `c_event_id`) VALUES (\'342324\', \'5640\', \'2015-08-24\', \'this sucks balls\', NULL, \'100\');";

    $insert=mysqli_query($mysqli,$command);
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    else
    {
        header( "refresh:1; url=/$url$content" ); 
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
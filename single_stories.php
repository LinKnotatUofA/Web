<?php 
    session_start();
    require "/events/load_events.php";
    require "/account/db.php";
    //grab session id from url
    global $storyid;
    if (isset($_GET["id"]))
    {
        $storyid = $_GET["id"];
    }
    //grab content from database using id
    $storystuff = getstoryinfo($storyid);
    $commentstuff = getcommentinfo($storyid)
    //WIN
    
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - Home</title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="building bridges,b squared,b^2,uofa,u of a,university,of,alberta" name
<meta />="description" content="B squared is a service provided by the University of Alberta Bridge Builder team to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">

	<link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/page_scripts/HERE_utilities.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/herescript.js"></script>
    <link rel="stylesheet" type="text/css" href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" charset="UTF-8"src="http://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" charset="UTF-8"src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <script type="text/javascript"  charset="UTF-8"src="http://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>

    <!-- Load script specific for index page-->
    <script src="js/page_scripts/index/index_script.js"></script>
    <script>
        function dialogcontent(story_id) {
                var strVar="";
                     strVar += "<form id=\"comment_stories\" method =\"post\" action=\"upload\/upload_comments.php\">  ";
                     strVar += "    <p>What do you think?<\/p> <p><input name =\"comment\" type=\"text\" \/><\/p> ";
                     strVar += "    <input type=\"hidden\" name=\"content_id\" value=";
                     strVar += "\""+story_id+"\"";
                     strVar += ">";
                     //hardcoded shit, this needs to be converted to php
                     strVar += "    <input type=\"hidden\" name=\"istype\" value=\"stories\"> ";
                     strVar += "    <p><input name =\"comments\" type=\"submit\"\/> <\/p>";
                     strVar += "    <p><button class=\"button\" type=\"button\" onclick=\"$.Dialog.close()\">Cancel<\/button><\/p>";
                     strVar += "<\/form>";
                     strVar += "";
                return strVar;
            }
       
        
    </script>
    <script src="js/comment.js"></script>
    <style type="text/css">
body {
	background-color: #3CB6CE;
    color: #000000;
}
</style>
</head>
	<body class="metro">
        <div class="grid fluid show-grid" align="center">
            <div id="row0">
                <div class="span4">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" >
                <div class="span12 row">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>

                <div class="span12 row" align="left" id="content" style="width: 100%; height: auto; background: #C7D28A" />
                    <div class="grid fluid show-grid">
                    <!--redo story page pinterest/deviant art style-->
                    <div class="panel" style="width:80% align:middle">
                    <div class="panel-header bg-white fg-dark">
                        <span class="text"> <?php    print_r($storystuff[0]['story_title']); ?> </span>
                    </div>
                    <div class="panel-content bg-white fg-dark">
                        <span class="text"> 
                            <!--start putting shit u just grabbed here-->
                            <?php
                            echo"Written by:";
                            echo"<br>";
                            $nameID = $storystuff[0]['story_author'];
                            $userpic_query = mysqli_query($mysqli,"SELECT user_profile_pic FROM user WHERE id ='$nameID'");
                            $userpic=mysqli_fetch_assoc($userpic_query);
                            if($userpic['user_profile_pic'] == null)
                            {
                                echo '<span class=\"icon-user\"></span>';
                            }
                            else
                            {
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($userpic['user_profile_pic'] ).'"/>'; 
                            }

                            $namedata = mysqli_query($mysqli,"SELECT username FROM user WHERE id = '$nameID'");
                            $name = resultToArray($namedata);
                            print_r($name[0]['username']);
                            echo"<br>";
                            echo"On:";
                            echo"<br>";
                            print_r($storystuff[0]['DATE']);
                            echo"<br>";
                            print_r($storystuff[0]['story_content']);    
                            ?>
                        </span>
                        <div id="rating" class="rating large"></div>

                        <script>
                        $(function(){
                              $("#rating").rating({
                               static: false,
                               score: 2,
                               stars: 5,
                               showHint: false,
                               hints: ['bad', 'poor', 'regular', 'good', 'gorgeous'],
                               showScore: true,
                               scoreHint: "Current score: ",
                            });
                        });
                        </script>
                        
                    </div>
                    </div>
                    
                    <div style="padding:20px; margin: 10px 70px 10px 70px"> 
                        


                        <?php 
                        $num = sizeof($commentstuff);
                        
                        if($num<1)
                        {
                            echo"<h2 id='ballon'>No Comment so far, be the first to post!</h2>";
                           
                        }
                        else
                        {
                            echo"<h2 id='balloon'>Leave a Comment Bellow!</h2>";
                            $x = 0;
                            while($x<$num)
                            {
                                echo"<div>";
                                $authr = $commentstuff[$x];
                                print_r(printusername($authr['c_author']));
                                    $userpic_query = mysqli_query($mysqli,"SELECT user_profile_pic FROM user WHERE id ='authr['userID']'");
                                    $userpic=mysqli_fetch_assoc($userpic_query);
                                    if($userpic['user_profile_pic'] == null)
                                    {
                                        echo '<span class=\"icon-user\"></span>';
                                    }
                                    else
                                    {
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($userpic['user_profile_pic'] ).'"/>'; 
                                    }
                                    echo"<br><br>";
                                        echo"
                                        <div class=\"balloon bottom\">
                                            <div style=\"padding: 20px\">";
                                            print_r($commentstuff[$x]['c_content']);
                                            echo"</div>
                                        </div>";
                                echo"</div>";
                                $x++;
                            }
                        }



                        ?>
                        
                        
                        <button class="large" onclick ="opencommentdialog(<?php echo "$storyid";?>)">Comment </button>
                    </div>
                    

                    
                    

                    </div>
                    <!--new code below -->      
                    <?php 
                        date_default_timezone_set('UTC');
                    //echo date(DATE_RFC2822);
                    ?>
                    </div>
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>
    </div>
</div>
                

     

        
    </body>
</html>

 
<?php 
    session_start();
    
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LinKnot @ UofA - Home</title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="LinKnot,uofa,u of a,university,of,alberta" />
<meta name="description" content="LinKnot is a service provided by Team LinKnot to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #ffa500;
    color: #FFFFFF;
}
</style>

	<link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery-ui.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/page_scripts/HERE_utilities.js"></script>
	<script src="js/page_scripts/create_event_js.js"></script>

    <!-- Load Calendar -->
    <script src="js/metro/metro-calendar.js"></script>
    <script src="js/metro/metro-datepicker.js"></script>
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

    <script type="text/javascript" charset="UTF-8" >
           

               
        
  </script>
    
</head>
	<body class="metro">
        <div class="grid fluid show-grid" align="center">
            <div id="row0" >
                <div class="span4 ">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" >
                <div class="row span12">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>

                 <div class="row span12" id="content" style="width: 100%; height: auto; background: #C7D28A" />
                     <div class="grid fluid show-grid">
                         <div id="featured_row1" class="row">
                             
                             <div id ="post_story_column" class="tile-group two">
                                 
                                 <div class="tile triple ">
                                     <div class="tile-content icon button bg-violet" id="story">
                                        <i class="icon-pencil"></i>
                
                                         
                                        <div class="tile-status">
                                            <span class="name" >Write a Story</span>
                
                                        </div>
                                     
                                     </div>
                                 </div>
                                 
                                 
                                 <div class="tile triple">
                                     
                                     <div class="tile-content icon button bg-yellow" id="event" onclick="displayCreateEvent()">
                                         <i class="icon-location"></i>
                                                 
                                 
                                         <div class="tile-status">
                                             <span class="name" >Post an Activity</span>
                                 
                                         </div>
                                 
                                     </div>
                                 
                                  </div>
                
                             </div>

                       
                             </div>
                             
                         </div>
                         
                     </div>
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>


       
        
        <script  type="text/javascript" charset="UTF-8" >
           $(function () {
               
               $("#story").on('click', function () {
                   $.Dialog({
                       shadow: true,
                       overlay: false,
                       draggable: true,
                       icon: '<img src="Assets/default_user.png">',
                       title: 'Draggable window',
                       width: 'auto',
                       content: 'This Window is draggable by caption.',
                       onShow: function () {
                           
                           var strVar="";
                           strVar += "<div style=\"padding:20px; margin: 10px 10px 10px 10px\"> ";
                                strVar += "<form id=\"form_stories\" method =\"post\" action=\"events\/upload_stories.php\">  ";
                                strVar += "    <p>Please enter a title<\/p> <p><input name =\"story_title\" type=\"text\" \/><\/p> ";
                                strVar += "    <div class=\"input-control textarea\"\/><textarea name=\"story_content\" cols=\"40\" rows=\"5\" placeholder =\"What do you want to write about?\"\/>&nbsp;&nbsp;&nbsp;<\/textarea><\/div> ";
                                strVar += "    <br><\/br><p><input name =\"submit\" type=\"submit\"\/> <\/p>";
                                strVar += "    <p><button class=\"button\" type=\"button\" onclick=\"$.Dialog.close()\">Cancel<\/button><\/p>";
                                strVar += "<\/form>";
                                strVar += "<\/div>"
                                strVar += "";
                           

                           $.Dialog.title("Write A Story");
                           $.Dialog.content(strVar);
                           $.Metro.initInputs();
                       }

                   });
               });

               
           });
        </script>
        
    </body>
</html>

 
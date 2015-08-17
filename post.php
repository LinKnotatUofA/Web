<?php 
    session_start();
    
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - Home</title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="building bridges,b squared,b^2,uofa,u of a,university,of,alberta" />
<meta name="description" content="B squared is a service provided by the University of Alberta Bridge Builder team to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #3CB6CE;
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
           
           
           function displayreg() {         
              
                  
                  var dialog1 = $.Dialog({
                       shadow: true,
                       overlay: false,
                       draggable: true,
                       icon: '<img src="Assets/default_user.png">',
                       title: 'Create Event',
                       width: 700,
                       height: 700,
                      

                       padding: 10,
                       resizable: true,
                        onShow: function () {
                            var content = '<iframe style="border: 10px;" src="' + 'events/upload_events.php' + '" width="100%" height="700"></iframe>';

                            $.Dialog.title("create event");
                            $.Dialog.content(content);
                        }
                      
                    });
                
                 //dialog1.html('<iframe style="border: 10px; float:bottom; " src="' + 'events/upload_events.php' + '" width="100%" height="100%"></iframe>');
                 //dialog1.dialog( "option", "title", "Dialog Title" ) 
                 dialog1.dialog('open');
                

            }

               
        
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
                                     
                                     <div class="tile-content icon button bg-yellow" id="event" > <?php //onclick="displayreg()"?> 
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
                $("#login").on('click', function () {
                    $.Dialog({
                        shadow: true,
                        overlay: false,
                        draggable: true,
                        icon: '<img src="Assets/default_user.png">',
                        title: 'Draggable window',
                        width: 'auto',
                        padding: 10,
                        content: 'This Window is draggable by caption.',
                        onShow: function () {
                            var content = '<form id="login-form-1" action="account/login.php/" method ="POST">' +
                                    '<p>Login</p>' +
                                    '<div class="input-control text"><input type="text" name="login"><button class="btn-clear"></button></div>' +
                                    '<p>Password</p>' +
                                    '<div class="input-control password"><input type="password" name="password"><button class="btn-reveal"></button></div>' +
                                    '<div class="input-control checkbox"><p>Remember Me <input type="checkbox" name="c1" checked/><span class="check"></span></p></div>' +
                                    '<div class="form-actions">' +
                                    '<button class="button primary">Login to...</button>&nbsp;' +
                                    '<button class="button warning" type="button"><a href="account/registration.php">Register</a></button>&nbsp;' +
                                    '<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> ' +
                                    '</div>' +
                                    '</form>';

                            $.Dialog.title("User login");
                            $.Dialog.content(content);
                        }

                    });
                });

                
            });
            
      
        </script>
        
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
                       padding: 10,
                       content: 'This Window is draggable by caption.',
                       onShow: function () {
                           $("#datepicker").datepicker();
                           var strVar="";
                                strVar += "<form id=\"form_stories\" method =\"post\" action=\"events\/upload_stories.php\">  ";
                                strVar += "    <p>Please enter a title<\/p> <p><input name =\"story_title\" type=\"text\" \/><\/p> ";
                                strVar += "    <div class=\"input-control textarea\"\/><textarea name=\"story_content\" cols=\"40\" rows=\"5\" \/>What you wanna write about?<\/textarea><\/div> ";
                                strVar += "    <p><input name =\"submit\" type=\"submit\"\/> <\/p>";
                                strVar += "    <p><button class=\"button\" type=\"button\" onclick=\"$.Dialog.close()\">Cancel<\/button><\/p>";
                                strVar += "<\/form>";
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

 
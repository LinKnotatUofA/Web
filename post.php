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
    
</head>
	<body class="metro">
        <div class="grid">
            <div id="row0" class="row" >
                <div class="span4 offset_special">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" class="row" >
                <div class="span_navbar_special">
                </div>
                <div class="span11 offset_special">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>

                 <div class="span11 offset_special" id="content" style="width: 100%; height: auto; background: #C7D28A" />
                     <div class="grid fluid show-grid">
                         <div id="featured_row1" class="row" >
                             <div class="spanspecial"> 
                                 </div>
                             <div id ="post_story_column" class="span4 offset_events">
                                 
                                 <div class="tile triple ">
                                     <div class="tile-content icon button bg-violet" id="story">
                                        <i class="icon-pencil"></i>
                
                                         
                                        <div class="tile-status">
                                            <span class="name" >Write a Story</span>
                
                                        </div>
                                     
                                     </div>
                                 </div>
                                 
                                 
                                 <div class="tile triple">
                                     
                                     <div class="tile-content icon button bg-yellow" id="event">
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
            <div class="span11 offset_special tertiary-text bg-dark fg-white" style="padding: 20px">
                Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.<p>
                <P><a href="mailto:bsquared@gmail.com" class="fg-white">Email Us</a> </P>
                <p><a href="https://github.com/orgs/BsquaredatUofA/" class="fg-white">Visit Us On GitHub</a></p>
            </div>
        </div>
        </div>
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
               $("#event").on('click', function () {
                  
                  var dialog1 = $.Dialog({
                       shadow: true,
                       overlay: false,
                       draggable: true,
                       icon: '<img src="Assets/default_user.png">',
                       title: 'Create Event',
                       show: 'fold',
                       width: 500,
                       height: 600,
                       maxidth: 500,
                       maxHeight: 600,
                       padding: 10,
                       content: 'This Window is draggable by caption.'
                      
                    });
                
                 dialog1.load('events/upload_events.php').dialog('open').title('Create an Event');
                

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
                                strVar += "    <div class=\"input-control textarea\"\/><textarea name=\"story_content\" cols=\"40\" rows=\"5\" \/>What you wanna write about?</textarea></div> ";
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

 
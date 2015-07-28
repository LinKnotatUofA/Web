
<?php 
    session_start();
    //we need to:
    //retrieve *all events* from database
    //grab geo coordinates
    //write javascript to display events through HERE maps
    require("events/load_events.php");
    
    
    

   
    
    
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - Parties</title>
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

    <!-- Load script specific for parties page-->
	<?php
		$typeArray = array();								#Getting all the TYPEs from the database 
		for($x = 0;$x<count($eventlist);$x++)
		{
			array_push($typeArray, $eventlist[$x]['TYPE']);
		}
		?>
    <?php 
	
    echo"<script  type='text/javascript' charset='UTF-8'>

    function display_fun() {
        if (edit == true) {
            removeClickListener();
            edit = false;
        }
    
        //we need to somehow delete the existing group in the map object and load the right group
        map.removeObject(currentgroup);
        currentgroup = groupfun;
        currenticon = funmark;
        map.addObject(currentgroup);";?>
	
		
		<?php
        for($x = 0;$x<count($eventlist);$x++)
        { 
            if($eventlist[$x]['TYPE']=='0')        #if($eventlist[$x]['TYPE']=='0') originally array_search($eventlist[$x]['TYPE'],$typeArray)
            {
                echo "addMarkerToGroup(groupfun, { lat: ";
                print_r($eventlist[$x]['LAT']);
                echo", lng:";
                print_r($eventlist[$x]['LONGt']);
                echo"},'<div><a href=event.php?id=";
                print_r($eventlist[$x]['EVENTID']);
                echo ">";
                print_r($eventlist[$x]['DESCRIPTION']);
                echo"</a></div><div >";
                print_r($eventlist[$x]['TIME']);
			    #making changes here
                echo"</div>');";
                echo"\r\n";
                }
        }
        echo
        "
        
        return false;
    }
    
     function main() {
        // by defualt page will load all fun parties
        map.addObject(currentgroup);
        display_fun();
        //setupown();
    }
    
    function display_study() {
            if (edit == true) {
                removeClickListener();
                edit = false;
            }
    
            map.removeObject(currentgroup);
            currentgroup = groupstudy;
            currenticon = studymark;
            map.addObject(currentgroup);
            addMarkerToGroup(currentgroup, { lat: 53.528200, lng: -113.525439 },
          '<div ><a>Stats 151 Study Group</a>' +
          '</div><div >@ CCIS L2-220<br>Tommrow @ 12:00 AM</div>');
            return false;
        }
    function display_custom() {
            if (edit == true) {
                removeClickListener();
                edit = false;
            }
            map.removeObject(currentgroup);
            currentgroup = groupcustom;
            currenticon = custommark;
            map.addObject(currentgroup);
            addMarkerToGroup(currentgroup, { lat: 53.523171, lng: -113.526031 },
          '<div ><a>Workout Session</a>' +
          '</div><div >@ PAW<br>Today @ 4:00 PM</div>');
            return false;
        }
     function display_own() {
            if (edit == false) {
    
                setUpClickListener();
                edit = true;
            }
            return false;
        }
        
   </script>";
   
   ?>
    
</head>
	<body class="metro">
        <div class="grid">
            <div id="row0" class="row" >
                <div class="span4 offset_special">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" class="row" >
                <div class="span12 offset_special">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
            </div>


                <div id="row2" class="row">
                    <div class="span3">
                        <nav class="vertical-menu">
                            <ul>
                                <li><a href="index.php"><i class="icon-arrow-left-3 fg-white"></i></a></li>
                                <li class="title" style="color: white;">Party</li>
                                <li><a style="color: white;" onclick="display_study()" id="study" href="#study">Study
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                        <rect stroke="white" fill="#1b468d" x="1" y="1" width="22" height="22" />
                                    </svg></a></li>
                                <li><a style="color: white;" onclick="display_fun()" id="fun" href="#fun">Fun
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">       
                                        <rect stroke="white" fill="#7fff00" x="1" y="1" width="22" height="22" />
                                    </svg></a></li>
                                <li><a style="color: white;" onclick="display_custom()" id="custom" href="#custom">Custom
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                        <rect stroke="white" fill="#ba00ff" x="1" y="1" width="22" height="22" />
                                    </svg></a></li>
                                <li><a style="color: white;" onclick="display_own()" id="own" href="#add">+Your Own</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="span9" id="map" style="width: 100%; height: 400px; background: grey" />   
                               
                </div>  
                <div class="span12 offset_special tertiary-text bg-dark fg-white" style="padding: 20px">
                    Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                    <br><br> <a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                    <br><br> Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>             
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>



         <script type="text/javascript" charset="UTF-8">
             //intialize all script operation,defined in parties_script.js
             //mappackage = map+ui
             var mappackage = setupbasicmap();

             var map = mappackage.map;
             var ui = mappackage.ui;

             var groupfun = groupfactory(ui);
             var groupstudy = groupfactory(ui);
             var groupcustom = groupfactory(ui);
             var currentgroup = groupfun;
             var edit = false;
             //a blue square for study
             var studymark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#1b468d" x="1" y="1" width="22" height="22" /></svg>';
             //a green square for fun
             var funmark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#7fff00" x="1" y="1" width="22" height="22" /></svg>';
             //a cyan square for custom
             var custommark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#ba00ff" x="1" y="1" width="22" height="22" /></svg>';

             var currenticon = funmark;

             main();


         </script>

        <script  type="text/javascript" charset="UTF-8" >
          var markerz = new H.map.Marker({lat:42.35805, lng:-71.0636});
        navigator.geolocation.getCurrentPosition(function(pos){
            var crd = pos.coords;
           markerz = new H.map.Marker({lat:crd.latitude, lng:crd.longitude}); 
        });
          // Ensure that the marker can receive drag events
          markerz.draggable = true;
          map.addObject(markerz);
        var id, target, options;
        
        function success(pos) {
          var crd = pos.coords;
          markerz.setPosition({lat:crd.latitude, lng:crd.longitude});
          

          
        }
        
        function error(err) {
          console.warn('ERROR(' + err.code + '): ' + err.message);
        }
        
        target = {
          latitude : 0,
          longitude: 0
        };
        
        options = {
          enableHighAccuracy: true,
          timeout: 5000,
          maximumAge: 0
        };
        
        id = navigator.geolocation.watchPosition(success, error, options);
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

        
    </body>
</html>

 
<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/account/db.php";
    require $_SERVER['DOCUMENT_ROOT']."/load/load.php";
    //1.we will need to grab the event ID
    global $eventID;
    if (isset($_GET["id"]))
    {
        $eventID = $_GET["id"];
    }
    //2.query our database for that event -
    $singleventproperty = getinfo($eventID,$mysqli,"SELECT * FROM event WHERE EVENTID =");
    //echo count($singleventproperty).'<br>';
    $dayofweek = getinfo($eventID,$mysqli,"SELECT DAYOFWEEK(TIME) AS DAY FROM event WHERE EVENTID = ")['DAY'];

    $dayarray = array("Sunday","Monday","Tuesday","Wednesday","Thusday","Friday","Saturday");
    $commentstuff = getinfo($eventID,$mysqli,"SELECT * FROM comment WHERE c_event_id = ");

    ?>
 <?php 
if(isset($_POST['join']))
{   
    $join = $_POST['join'];
}
else
{
    $join = null;
}
$user = $_SESSION['username'];
$query = mysqli_query($mysqli,"SELECT id FROM user WHERE username='$user'");
$row = mysqli_fetch_assoc($query);
$id = $row['id'];
if($join)
{
        $count = mysqli_query($mysqli,"SELECT COUNT(attendes_id) as total FROM attendees"); 
        $data=mysqli_fetch_assoc($count); 
        $AID = $data['total']+1;     
    	$query = mysqli_query($mysqli, "INSERT INTO attendees VALUES ('$AID','$eventID','$id')");
    
}
else
{
        $query = mysqli_query($mysqli, "DELETE FROM attendees WHERE EVENTID = '$eventID' AND userID ='$id'");
}
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LinKnot @ UofA - <?php print_r($singleventproperty[0]['DESCRIPTION']); ?></title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="LinKnot,uofa,u of a,university,of,alberta" />
<meta name="description" content="LinKnot is a service provided by Team LinKnot to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #ffa500;
    color: #000000;
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
    <!-- time to ditch the old here maps scripts -->
    <script src="js/page_scripts/HERE_utilities_new.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <link rel="stylesheet" type="text/css" href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <script type="text/javascript"  charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript"  charset="UTF-8">
    function submit()
    {
        document.getElementById("joinswitch").submit();
    }
   



    </script>

    <!-- Load script specific for index page-->

    <script>
        function dialogcontent(event_id) {
            var strVar="";
            strVar += "<form id=\"comment_stories\" method =\"post\" action=\"upload\/upload_comments.php\">  ";
            strVar += "    <p>What do you think?<\/p> <p><input name =\"comment\" type=\"text\" \/><\/p> ";
            strVar += "    <input type=\"hidden\" name=\"content_id\" value=";
            strVar += "\""+event_id+"\"";
            strVar += ">";
            //hardcoded shit, this needs to be converted to php
            strVar += "    <input type=\"hidden\" name=\"istype\" value=\"events\"> ";
            strVar += "    <p><input name =\"comments\" type=\"submit\"\/> <\/p>";
            strVar += "    <p><button class=\"button\" type=\"button\" onclick=\"$.Dialog.close()\">Cancel<\/button><\/p>";
            strVar += "<\/form>";
            strVar += "";
            return strVar;
        }
        </script>
    <script src="js/comment.js"></script>
    <?php
     echo "<script  type=\"text/javascript\" charset=\"UTF-8\" >
 
               
               function update_event() {
                   $.Dialog({
                       shadow: true,
                       overlay: false,
                       draggable: true,
                       icon: '<img src=\"Assets/default_user.png\">',
                       title: 'Draggable window',
                       width: 'auto',
                       content: 'This Window is draggable by caption.',
                       onShow: function (_dialog) {
                           
                            var strVar='';";

                              echo"  
                                strVar += \"<form id='form_update_event' method ='post' action='events\/upload_events.php'  enctype='multipart\/form-data'>  \";
                                strVar += \"<p>Is it for fun or academic? <input name ='type' type='text' value ='";echo $singleventproperty[0]['TYPE']; echo"'/></p>  \";
       	                        strVar += \"<p>Describe what you're gonna do: <input name ='description' value ='";echo $singleventproperty[0]['DESCRIPTION'];echo"' type='text' /></p>  \";
                                strVar += \"<p>At what time: <input name ='date' type='date' value='";echo $singleventproperty[0]['postdate']; echo"'/></p> \";
                                strVar += \"    <input type='hidden' name='updateid' value='";echo $eventID;echo" '> \";
                                strVar += \"   <p> \";
                                strVar += \"      <label>Upload your image</label> \";
                                strVar += \"              <input type='file' name='image'/>        \";
                                strVar += \" </p> \";
                                strVar += \"  <p><input name ='submit' type='submit'/> <INPUT Type='button' VALUE='Cancel and go back' onClick='history.go(-1); return true;'></p> \";
                                strVar += \"<\/form>\";";
                                

                            echo"
                           $.Dialog.title(\"Update Event\");
                           $.Dialog.content(strVar);
                           $.Metro.initInputs();
                       }

                   });
               }

               

        </script>";
        ?>
   
    <?php
        echo
        "<script  type='text/javascript' charset='UTF-8'>";
        echo
        "function display_event() {
    if (edit == true) {
        removeClickListener();
        edit = false;
    }

    //we need to somehow delete the existing group in the map object and load the right group
    map.removeObject(currentgroup);
    currentgroup = groupfun;
    currenticon = funmark;
    map.addObject(currentgroup);
    addMarkerToGroup(groupfun, { lat:";
    print_r($singleventproperty[0]['LAT']);
    
    echo", lng: ";print_r($singleventproperty[0]['LONGt']); 
    
    echo"},
      '<div><a>Location:(Ask user for detailed location instruction)</a>');
    return false;
}";
    echo" function movetoeventcenter(map) {
    map.setCenter({ lat: "; print_r($singleventproperty[0]['LAT']); echo ", lng: ";print_r($singleventproperty[0]['LONGt']); echo" });
    map.setZoom(15);}";
    echo"  
              function calculateRouteFromAtoB (platform,x,y) {
              var router = platform.getRoutingService(),
                routeRequestParams = {
                  mode: 'shortest;pedestrian',
                  representation: 'display',
                  waypoint1: '";print_r($singleventproperty[0]['LAT']);echo",";print_r($singleventproperty[0]['LONGt']);echo"',
                  waypoint0: ''+x+','+y,  
                  routeattributes: 'waypoints,summary,shape,legs',
                  maneuverattributes: 'direction,action'
                }
                 router.calculateRoute(
                routeRequestParams,
                onSuccess,
                onError
              );}";
    echo"</script>";
?>
<?php
    $authid = $singleventproperty[0]['authID'];                                              
    $userpic_query = mysqli_query($mysqli,"SELECT user_profile_pic FROM user WHERE id ='$authid'");
    $userpic=mysqli_fetch_assoc($userpic_query);
    echo"<script  type='text/javascript' charset='UTF-8'>       
        function people() {
            $.Dialog({
                        flat: false,
                        shadow: true,
                        draggable: true,
                        resizable:true,
                        title: 'Attendees',
                        content: '',
                        onShow: function(_dialog){
                           var strVar='';";
                        $query = mysqli_query($mysqli,"SELECT userID FROM attendees WHERE EVENTID = '$eventID'");
                        $attendeeslist = resultToArray($query);
                        $length = count($attendeeslist);
                        for ($i = 0; $i < $length; $i++) 
                        {
                            $attending =$attendeeslist[$i]['userID'];
                            $namedata = mysqli_query($mysqli,"SELECT username FROM user WHERE id = '$attending'");
                            $name = resultToArray($namedata);
                            echo "strVar +='<p>";    
                            print_r($name[0]['username']);
                            echo "</p>';";
                        }
                        
                                


       
       echo"                    $.Dialog.content(strVar);
                           $.Metro.initInputs();
                       }
                        
                });  

        }
    </script>";
?>
    <script src="js/page_scripts/events/event_script.js"></script>
      <script src="https://apis.google.com/js/platform.js" async defer></script>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
	<body class="metro">
	    <div id="fb-ba30dbdb2d10ef"></div>
       
        <div class="grid fluid show-grid" align="center">
            <div id="row0">
                <div class="row span4">
                     <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>   
                </div>
            </div>
            <div id="row1" >
               
                <div class="row span12 ">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
            </div>
            <div id="fb-root"></div>
                <div id="row2">
                    <div class="row span12" align="center" id="content" style="width: auto; height: auto; background: #C7D28A;" />
                        <div class="span3" align="left">
                            <nav class="vertical-menu">
                                <ul>
                                    <li><a href="index.php"><i class="icon-arrow-left-3 fg-white"></i></a></li>
                                    <li class="title" style="color: white;">Options</li>
                                    <li><a style="color: white;">
                                        </a></li>

                                    <?php
                                      
                                        if(isset($_SESSION['id']))
                                        {
                                            if(isset($_SESSION['verified']))
                                            {
                                                $verified = $_SESSION['verified'];
                                                if($verified == true)
                                                {
                                                
                                                
                                                    echo "<form action=\"event.php?id=".$eventID."\" method = \"POST\">                                                             
                                                        <div class=\"input-control switch\">
                                                            <label><a style=\"color: white;\">Join</a>
                                                                <input type=\"checkbox\" name=\"join\" onclick=\"submit()\" id=\"joinswitch\" ";
                                                                //we gotta check from our database if user already joined this event
                                                                $status = mysqli_query($mysqli,"SELECT userID FROM attendees WHERE userID = '$id' AND EVENTID = $eventID");
                                                                $numrows = mysqli_num_rows($status);
                                                                if($numrows>0)
                                                                {
                                                                   echo "checked";
                                                                }
                                                                echo "/>";
                                                               echo" <span class=\"check\"></span>
                                                            </label>
                                                        </div>   
                                                    </form>";
                                                }
                                            
                                            }
                                            else
                                            {
                                                echo "Please verify your account, we've should of sent u an email";
                                            }
                                            
                                        }    
                                        else{
                                            echo "Please sign to join event";
                                        }








?>
                                     <a href="http://twitter.com/share?url=http://ca-cdbr-azure-central-a.cloudapp.net/event.php?id=".$eventID class="twitter-follow-button" data-show-count="false">Follow @twitter</a><br><br>
                                     <div class="fb-share-button" data-href="ca-cdbr-azure-central-a.cloudapp.net/event.php?id=".$eventID data-layout="button_count"></div><br><br>
                                     <g:plusone  href="uofa.azurewebsite.net/event.php?id=".$eventID data-annotation="inline" data-width="300" size="standard"></g:plusone>

                                </ul>
                            </nav>
                        </div>
                         <div class= "span5" id ="content">
                             <div id ="info" class = "tile-group two">
                             <div class="tile-group-title">Info</div>
                                 <div class="tile">
                                    <div class="tile-content image">
                                         <?php   
                                               if($userpic['user_profile_pic'] == null)
                                               {
                                                    echo '<span class=\"icon-user\"></span>';
                                                }
                                               else
                                               {
                                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($userpic['user_profile_pic'] ).'"/>'; 
                                                }

                                         ?>
                                    </div> 
                                     <div class="tile-status">
                                         <div class="brand bg-black">
                                             
                                             <span class="name fg-white">Created By:
                                             <?php 
                                             
                                             //grab the latest 4 events from database
                                             $query = mysqli_query($mysqli,"SELECT username FROM user where id='$authid'");
                                             $stuff = resultToArray($query);
                                             print_r($stuff[0]['username']);

                                             ?></span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="tile bg-amber">
                                     <div class="tile-content">
                                             <div class="text-left padding5 ntp">
                                                 <p class="fg-white"><?php echo $dayarray[$dayofweek-1]; ?></p>
                                                 <p class="fg-white no-margin"><?php print_r($singleventproperty[0]['TIME']); ?></p>
                                                 
                                             </div>
                                         </div>
                                 </div>
                            
                             
                                 <div  class="tile bg-red"  onclick="update_event()">
                                     <div class="tile-content image-container">
                                         <div class="image-container">
                                             <div class="frame">
                                                 <?php   echo '<img src="data:image/jpeg;base64,'.base64_encode($singleventproperty[0]['thumbnail'] ).'"/>';  ?>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="tile bg-darkPink fg-white" onclick="people()"> 
                                    <div class = "tile-content icon">  
                                        <i class = "icon-accessibility"></i>
                                    </div>
                                    <div class="tile-status" align="left"><span class="label">Attendees</span></div>
                                 </div>
                             </div>
                         </div>
                         <div class="span4" id="map" style="width: 100%; height: 400px; background: grey" />   
                </div>
                </div>
                <div class="row span12" align="center" id="content" style="width: auto; height: auto; background: #C7D28A;" >
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
                                print_r(getinfo($commentstuff[$x]['c_author'],$mysqli,"SELECT * FROM user_preferences WHERE user_id =")['username']);
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
                        
                        
                        <button class="large" onclick ="opencommentdialog(<?php echo "$eventID";?>)">Comment </button>
                    </div>

                    </div>

                <div class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                    <footer class="bg-dark" data-load="bottom.html"></footer>
                </div>
               
            </div>
        <script type="text/javascript" charset="UTF-8">
            function main() {
                // by defualt page will load all fun parties
                map.addObject(currentgroup);
                display_event();
                //setupown();
            }
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
            movetoeventcenter(map);
            var platform = new H.service.Platform({
            app_id: 'DemoAppId01082013GAL',
            app_code: 'AJKnXv84fjrb0KIHawS0Tg',
            useCIT: true
        });

             var markerz = new H.map.Marker({lat:42.35805, lng:-71.0636});
        navigator.geolocation.watchPosition(function(pos){
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
          calculateRouteFromAtoB (platform,crd.latitude,crd.longitude);
          
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

        

          
            
            
             
            
            /**
             * This function will be called once the Routing REST API provides a response
             * @param  {Object} result          A JSONP object representing the calculated route
             *
             * see: http://developer.here.com/rest-apis/documentation/routing/topics/resource-type-calculate-route.html
             */
            function onSuccess(result) {
              var route = result.response.route[0];
             /*
              * The styling of the route response on the map is entirely under the developer's control.
              * A representitive styling can be found the full JS + HTML code of this example
              * in the functions below:
              */
              addRouteShapeToMap(route);
              addManueversToMap(route);
            
              addWaypointsToPanel(route.waypoint);
              addManueversToPanel(route);
              addSummaryToPanel(route.summary);
              // ... etc.
            }
            
            /**
             * This function will be called if a communication error occurs during the JSON-P request
             * @param  {Object} error  The error message received.
             */
            function onError(error) {
              alert('Ooops!');
            }
            

        
        
        </script>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      
        
        
             
    </body>
</html>
<?php 
    session_start();
    require "/events/load_events.php";
    
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
    
</head>
	<body class="metro">
        <div class="grid fluid show-grid" align="center">
            <div id="row0" >
                <div class="row span4" >
                        <a href="index.php" align="left"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" >
                <div class="row span12" align="left">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
            </div>
            <div id="row2" >
                <div class="row span12" align="center" id="content" style="width: auto; height: auto; background: #C7D28A;" />
                    <div class="grid fluid show-grid">
                        <div id="featured_row1" class="row" >
                            <div id ="content_column" class="span6" style="margin-left:4%">
                                <h2 class="subheader fg-white place-left">Featured & Latest Events</h2>
                                <!-- wait until rating system, grab events/stories with the highest ratings-->
                                <div class="tile triple double-vertical">
                                    <div class="carousel" id="carousel1">
                                            <div class="slide">
                                                <img src="Assets/1.png" class="cover1" />
                                            </div>
                                
                                            <div class="slide">
                                                <img src="Assets/2.png" class="cover1" />
                                            </div>
                                
                                            <div class="slide">
                                                <img src="Assets/3.png" class="cover1"/>
                                            </div>
                                
                        
                                    </div>
                                    <div class="brand bg-black">
                                        <div class="label fg-white place-right">Featured</div>
                                
                                
                                    </div>
                                        <script>
                                            $(function () {
                                                $("#carousel1").carousel({
                                                    height: 250
                                                });
                                            })
                                        </script>
                                </div>
                                <!--make this shit useful-->
                                <?php 
                                          $len = count($eventlist);
                                          //grab the promo pic of the latest 3 events
                                          //sort the list of (anything really) events from the latest to earliest, then print the first three
                                           echo"<div class= 'tile triple double-vertical'>
                                              <div class='carousel' id='carousel2'>
                                                      <div class='slide'>";
                                               echo '<img src="data:image/jpeg;base64,'.base64_encode($eventlist[$len-1]['image'] ).'" class="cover1"/>'; 
                                           echo"
                                           </div>";
                                           echo"
                                           <div class='slide'>";
                                               echo '<img src="data:image/jpeg;base64,'.base64_encode($eventlist[$len-2]['image'] ).'" class="cover1"/>';
                                           echo"
                                           </div>";
                                           echo"
                                           <div class='slide'>";
                                               echo '<img src="data:image/jpeg;base64,'.base64_encode($eventlist[$len-3]['image'] ).'" class="cover1"/>';
                                           echo"
                                           </div>
                                           </div>";
                                 ?>
                                   
                               
                                   <div class="brand bg-black">
                                       <div class="label fg-white place-right">Recent</div>
                                   </div>
                                   <script>
                                       $(function (){
                                               $("#carousel2").carousel({
                                                   height: 250
                                               });
                                           })
                                       </script>
                                </div>
                            </div>
                            
                            <div id="livefeed_column" class="span5"> 
                                <h2 class="subheader fg-white place-left">Featured & Latest Stories </h2>
                                <?php 
                                
                                    $storycount=count($storylist);
                                    
                                        $x=1;
                                        while($x <= $storycount)
                                        {
                                          echo"<div class='tile triple'>
                                                   <div class ='tile-content'>
                                                       <h3 class='text-left padding20'><a class=\"readable-text fg-dark\" href="; print_r("\"single_stories.php?id=");print_r($storylist[$storycount-$x]['story_id']);print_r("\""); echo">"; echo"<blockquote class=\"place-left\">";echo "\"";print_r($storylist[$storycount-$x]['story_content']);echo "\"<br><small><cite>";print_r($storylist[$storycount-$x]['story_title']);echo"</cite>"; echo" by "; printusername($storylist[$storycount-$x]['story_author']); echo", circa "; print_r($storylist[$storycount-$x]['DATE']); echo"</small></blockquote></a></h3>
                                                   </div>
                                               </div>";
                                            $x++;


                                        }

              
                                 ?>
                            </div>
                        </div>
                    </div>
               </div>  
            </div> 
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>        
        </div>
    </body>
</html>
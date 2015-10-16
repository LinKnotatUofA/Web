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
                            <div id ="content_column" class="span4">
                                
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
                                
                                            <a class="controls left"><i class="icon-arrow-left-3"></i></a>
                                            <a class="controls right"><i class="icon-arrow-right-3"></i></a>
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

                                <div class="tile triple double-vertical">
                                   <div class="carousel" id="carousel2">
                                           <div class="slide">
                                               <img src="Assets/1.png" class="cover1" />
                                           </div>
                                
                                           <div class="slide">
                                               <img src="Assets/2.png" class="cover1" />
                                           </div>
                                
                                           <div class="slide">
                                               <img src="Assets/3.png" class="cover1"/>
                                           </div>
                                
                                           <a class="controls left"><i class="icon-arrow-left-3"></i></a>
                                           <a class="controls right"><i class="icon-arrow-right-3"></i></a>
                                   </div>
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

                            
                            <div id="livefeed_column" class="span4 offset_livefeed_column">

                                <div class="tile triple">
                                    <h2><a href="?id=1_">"Event #1"</a></h2>
                                </div>

                                <div class="tile triple">
                                    <h2><a href="?id=1_">"Event #2"</a></h2>
                                </div>

                                <div class="tile triple">
                                    <h2><a href="?id=1_">"Event #3"</a></h2>
                                </div>

                                <div class="tile triple">
                                    <h2><a href="?id=1_">"Event #4"</a></h2>
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
                </div>
                </div>

      

        
    </body>
</html>

 
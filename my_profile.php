<?php 
    session_start();
	$id = $_SESSION['id'];
	$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared")

	
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - My Profile</title>
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
            <div id="row0"  >
                <div class="row span4 ">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1">
                
                <div class="row span12">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>

                <div class="row span12" id="content" style="width: 100%; height: auto; background-image: url("/assets/transparent-background.png") style="padding:40px"/>
                    <div class="grid fluid show-grid">
                    
            
                        <?php
                        
	                        $user_info = mysqli_query($mysqli,"SELECT * FROM user_preferences WHERE user_id ='$id'");
                            $info = mysqli_fetch_assoc($user_info);
                           
                            echo " <a class=\"tile bg-violet\" data-click=\"transform\">
                <div class=\"tile-content\">
                    <div class=\"text-left padding10 ntp\">
                        <h1 class=\"fg-white no-margin\">";echo "Profile Picture";print_r($info['firstn']);echo"</h1>
                        <p class=\"fg-white\">"; print_r($info['lastn']); echo"</p>
                    </div>
                </div>
            </a>"; 
	                       
                         echo " <a class=\"tile double bg-orange\" data-click=\"transform\">
                                            <div class=\"tile-content\">
                                                <div class=\"text-left padding10 ntp\">
                                                    <h2 class=\"fg-white no-margin\">";print_r($info['firstn']);print_r($info['lastn']);echo"<br>";echo "Birthday: ";echo"<br>";echo"</h2>
                                                    <p class=\"fg-white\">";print_r ($info['birthdays']); echo "<br>";echo "Study:";echo"</p>
                                                </div>
                                            </div>
                                        </a>";
                           
	                        
	                        
	                        //print_r($info[0]['lastn']);
	                        //print_r($info[0]['birthdays']);
	
?>         
                    </div>
					<br>
					<br>
					<br>
					<br>
					<br>
				<div class="tile double">
					<div class="tile-content image-set">
						<!--<img src="images/1.jpg"> 
						<img src="images/2.jpg">
						<img src="images/3.jpg">
						<img src="images/4.jpg">
						<img src="images/5.jpg"> -->
					</div>
				</div>
				
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>    
    </body>
</html>

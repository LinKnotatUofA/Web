<?php 
    session_start();
    $mysqli = new mysqli("us-cdbr-azure-northcentral-a.cleardb.com", "ba30dbdb2d10ef", "272e799b", "bsquared_user");
	/*$user = $_SESSION['username'];
	$query = mysqli_query($mysqli,"SELECT * FROM  WHERE username='$user'");
	$row = mysqli_fetch_assoc($query);
	$id = $row['id'];*/
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
                    <!--redo story page pinterest/deviant art style-->  
                    <br><br>            
                    

					<?php  
						$tileArray= array('<div class="tile double bg-pink">',
						'<div class="tile bg-LightSeaGreen">', '<div class=" tile double bg-yellow">',
						'<div class="tile bg-lime">', '<div class=" tile double bg-amber">',
						'<div class="tile double bg-yellow">', '<div class="tile double bg-darkCyan">','<div class="tile bg-red">',
						'<div class="tile bg-pink">','<div class="tile">', '<div class="tile double bg-green">' );
						
						$query = mysqli_query($mysqli,"SELECT * FROM stories");
							function resultToArray($result) {
								$rows = array();
								while($row = $result->fetch_assoc()) {
									$rows[] = $row;
								}
								return $rows;
							}
						$storylist = resultToArray($query);
						$storylistlen = count($storylist);
						$x=0;
						while ($x<$storylistlen){
							echo $tileArray[$x];
                            echo "<a href=single_stories.php?id=";
                            print_r($storylist[$x]['story_id']);
                            echo ">"; 
							print_r(strtoupper($storylist[$x]['story_title']));
                            echo "<br>"; 
                            print_r($storylist[$x]['story_content']); 
                            echo "<br>";
                            echo"</a></div>";
							$x++;
						}
						
					?>

      
                    </div>
            </div><br>
            <div class="span11 offset_special tertiary-text bg-dark fg-white" style="padding: 20px;margin-left:0;">
                Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                <br><br> <a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                <br><br> Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>
                </div>
                </div>
                </div>
                </div>

     

        
    </body>
</html>

 
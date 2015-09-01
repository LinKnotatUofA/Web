<?php 
    session_start();
    require "/account/db.php";
	/*$user = $_SESSION[	$query = mysqli_query($mysqli,"SELECT * FROM  WHERE username='$user'");
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
        <div class="grid fluid show-grid" align="center">
            <div id="row0" >
                <div class="row span4">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" >
                
                <div class="row span12 align="left">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
            </div>

            <div id="row2" >
                <div class="row span12" id="content" style="width: 100%; height: auto; background: #C7D28A; padding:20px" />
                    <div class="grid fluid show-grid">
					    <?php  
					    	$tileArray= array('<div class="tile double bg-pink">',
					    	'<div class="tile bg-lightseaGreen">', '<div class="tile double bg-yellow">',
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
                            echo"<div class=\"tile-group six\">
                                    <div class=\"tile-group-title\">Stories</div>";
					    	while ($x<$storylistlen){
					    		echo $tileArray[$x];
                               
                                echo "<a href=single_stories.php?id=";
                                print_r($storylist[$x]['story_id']);
                                echo ">"; 
                                 echo "
                                        <div class=\"tile-content\">
                    <div class=\"text-left padding10 ntp\">
                        <p class=\" fg-white no-margin\"><strong>";
                        print_r(strtoupper($storylist[$x]['story_title']));
                        echo"</strong></p>
                        <p class=\" fg-white\">";
                         print_r($storylist[$x]['story_content']); 
                        echo"</p>
                    </div>
                </div>


                                        ";
					    		
                                echo"</a></div>";
					    		$x++;
					    	}
                            echo"  </div>
                                 </div>";
					    	//echo"<br>";
					    	
					    ?>
                       
            </div>    


            <div id="row3" align="left" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
          </div> 
        </div>         
    </body>
</html>

 
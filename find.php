<?php

session_start();
require $_SERVER['DOCUMENT_ROOT']."/events/load_events.php";
require $_SERVER['DOCUMENT_ROOT']."/account/db.php";

//require "/account/db.php";



if(isset($_POST['submit']))
{
    
    

    if(isset($_POST['searchbar']))
    {
        //echo "we search by bar <br>";
        $searchbar = $_POST['searchbar'];
        $pplquery = "SELECT user_id
                  FROM
                  user_preferences
                  WHERE ( (`lastn` LIKE '%{$searchbar}%') OR (`firstn` LIKE '%{$searchbar}%' ) )";     
        //after this we search for groups
        $gpquery = "SELECT GID
                  FROM
                  groups
                  WHERE ( (`GNAME` LIKE '%{$searchbar}%') OR (`GTAGS` LIKE '%{$searchbar}%' ) OR (`GDESCRIPTION` LIKE '%{$searchbar}%' ))";  
        $etquery =  "SELECT EVENTID
                  FROM
                  events
                  WHERE (`GDESCRIPTION` LIKE '%{$searchbar}%') ";
       
    }
    else if (isset($_POST['search']))
    {
        echo "we search by button";
        $searchgroup = $_POST['search'];
        $query= $query."(SELECT GID,GNAME,GTAGS 
                (
                 (1*(MATCH(`GNAME`) AGAINST ('".$searchgroup."'))) +  
                 (1*(MATCH(`GTAGS`) AGAINST ('".$searchgroup."'))) +
                 (1*(MATCH(`GDESCRIPTION`) AGAINST ('".$searchgroup."')))
                AS score )  
                FROM groups
                WHERE score > 0 
                ORDER BY score DESC)"; 
    
    }
  
    //search things in general
    

    $pplresult = mysqli_query($mysqli,$pplquery);
    if ( false===$result ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    $ppl_result = mysqli_fetch_row($pplresult); 

    $gpresult = mysqli_query($mysqli,$gpquery);
    if ( false===$result ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    $gp_result = mysqli_fetch_row($gpresult);
    
    $etresult = mysqli_query($mysqli,$etquery);
    if ( false===$result ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    $etresult = mysqli_fetch_row($etresult); 
}

    //rank search by matching tags/group name/group description




?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - Search</title>
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
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B? - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1">
                
                <div class="row span12">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>

                <div class="row span12" id="content" style="width: 100%; height: auto; background: #C7D28A" style="padding:40px"/>
                    <div class="grid fluid show-grid">
                    
                          <?php 

                          
            
        
                          echo "<div class=\"tile-group one\">
                                    <div class=\"tile-group-title\">";  echo count($ppl_result); echo"</div>";

                         
                          for($i = 0; $i<count($ppl_result); $i++)
                          {

                              echo"
                                    <a class=\"tile bg-amber\" data-click=\"transform\">
                                        <div class=\"tile-content\">
                                            <div class=\"text-left padding10 ntp\">
                                                <h1 class=\"fg-white no-margin\">"; echo"</h1>
                                                <p class=\"fg-white\">"; echo"</p>
                                            </div>
                                        </div>
                                    </a>";
                              print_r($ppl_result[$i]);
                              echo"<br>";
                          
                          }
                          echo "</div> ";



                          echo count($gp_result).'<br>';
                          for($i=0; $i<count($gp_result);$i++)
                          {
                              print_r($gp_result[$i]);
                              echo"<br>";
                          }
                          echo count($etresult).'<br>';
                          for($i=0; $i<count($etresult);$i++)
                          {
                              print_r($etresult[$i]);
                              echo"<br>";
                          }


                    ?>

                              
                    
                    </div>
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>    
    </body>
</html>

 
 
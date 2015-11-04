<?php 
/*
    session_start();
    require "\account\db.php";

   
    
    if(isset($_POST['input']))
    {   
        $input = $_POST['input'];

    }
    $mysqli = new mysqli("us-cdbr-azure-northcentral-a.cleardb.com", "ba30dbdb2d10ef", "272e799b", "bsquared_user");
    // user
    $searchuserstatement="Select username, id from user where username like %$input%";
    $searchgroupstatement="Select GID from groups where GTAG like %$input% or GNAME like %$input% or GDESCRIPTION LIKE %INPUT%";
    $searcheventstatement="Select EVENTID from events where DESCRIPTION like %$input%";
*/

    function row_print($col1){
        print_r('<tr class="info"><td>'.$col1.'</td><td class="right">'.$col1.'</td><td class="right">'.$col1.'</td><td class="right">'.$col1.'</td><td class="right">'.$col1.'</td></tr>');
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LinKnot @ UofA - Home</title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="LinKnot,uofa,u of a,university,of,alberta" />
<meta name="description" content="LinKnot is a service provided by Team LinKnot to connect new/isolated students with each other." />
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
                        
     <h2 id="__table0__">Events</h2>
        <div class="example" style="color:black">
            <table class="table striped bordered hovered">
                <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Start/End Date</th>
                    <th class="text-left">Details</th>
                    <th class="text-left">Location</th>
                    <th class="text-left">Read More...</th>
                </tr>
                </thead>

                <tbody>
                <tr class="error"><td>Bing</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                <tr class="success"><td>Internet Explorer</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                <tr class="warning"><td>Chrome</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                <tr class="info"><td>News</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                <tr class="selected"><td>Music</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                <?php
                    for ($x = 0; $x <= 10; $x++) {
                        row_print("WHAT THE TRUCK");
                    } 
                ?>
                </tbody>
            </table>
        </div>
         <h2 id="__table1__">Stories</h2>
        <div class="example" style="color:black">
            <table class="table striped bordered hovered">
                <thead>
                <tr>
                    <th class="text-left">Name/Author</th>
                    <th class="text-left">Date</th>
                    <th class="text-left">Comments&Likes</th>
                    <th class="text-left">Location</th>
                    <th class="text-left">Read More...</th>
                </tr>
                </thead>

                <tbody>
                    <tr class="selected"><td>Music</td><td class="right">0:00:01</td><td class="right">0,1 Mb</td><td class="right">0 Mb</td><td class="right">0,1 Mb</td></tr>
                </tbody>
            </table>
        </div>
         <h2 id="__table2__">Groups</h2>
        <div class="example" style="color:black">
            <table class="table striped bordered hovered">
                <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Members</th>
                    <th class="text-left">Sponsors</th>
                    <th class="text-left">Photos</th>
                    <th class="text-left">Discussions</th>
                </tr>
                </thead>

                <tbody>
                <tr class="selected"><td>John</td><td class="right">Jian</td><td class="right">Telus</td><td class="right">hi.jpg</td><td class="right">Fun</td></tr>
                </tbody>
            </table>
        </div>

                    </div>
            </div>
            <div class="span11 offset_special tertiary-text bg-dark fg-white" style="padding: 20px">
                Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                <br><br> <a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                <br><br> Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>
                </div>
                </div>
                </div>
                </div>
                </div>

     

        
    </body>
</html>

 
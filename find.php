<?php

session_start();
//require $_SERVER['DOCUMENT_ROOT']."/events/load_events.php";
require $_SERVER['DOCUMENT_ROOT']."/account/db.php";
require $_SERVER['DOCUMENT_ROOT']."/load/load.php";
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
<title>LinKnot @ UofA - Search</title>
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

                          echo"<div align=\"center\">";
                            
        
                          echo "<div class=\"tile-group one\">
                                    <div class=\"tile-group-title\">"; echo"We found "; echo count($ppl_result); echo" user(s)."; echo"</div>";

                          echo "<br>";
                          for($i = 0; $i<count($ppl_result); $i++)
                          {
                              $userbasicinfo = getinfo($ppl_result[$i],$mysqli,"SELECT * FROM user WHERE id =");
                              $useradvancedinfo = getinfo($ppl_result[$i],$mysqli,"SELECT * FROM user_preferences WHERE user_id =");
                              $username = $userbasicinfo[0]['username'];
                              $userpic = $userbasicinfo[0]['user_profile_pic'];
                              $userfname = $useradvancedinfo[0]['firstn'];
                              $userlname = $useradvancedinfo[0]['lastn'];
                              echo"
                                    <a class=\"tile bg-amber\" data-click=\"transform\">
                                        <div class=\"tile-content\">
                                            <div class=\"text-left padding10 ntp\">
                                                <h2 class=\"fg-white no-margin\">";print_r($userfname); echo"</h2>
                                                <h3 class=\"fg-white no-margin\">";print_r($userlname); echo"</h3> 
                                            </div>
                                        </div>";
                                         echo"  <div class=\"brand bg-dark opacity\">
                                            <span class=\"text\"><p class=\"fg-white\">";
                                     echo $username;
                                     echo"   </p></span>
                                        </div>";
                                    echo"</a>";
                             
                              echo"<br>";
                          
                          }
                          echo "</div> ";




                         /* echo "<div class=\"tile-group one\">
                                    <div class=\"tile-group-title\">"; echo"We found "; echo count($gpresult); echo" party(s)."; echo"</div>";

                                    $groupbasicinfo = getinfo($gp_result[$i],$mysqli,"SELECT * FROM groups WHERE id =");
                                    $groupid = $groupbasicinfo[0]['GID'];
                                    $groupname = $groupbasicinfo[0]['GNAME'];
                                    $groupdescription = $groupbasicinfo[0]['GDESCRIPTION'];
                                    $groupmembercount = getinfo($groupid,$mysqli,"SELECT COUNT(userID) as gmCOUNT FROM group_members WHERE GID =")[0]['gmCOUNT'];

                                    echo "<br>";
                                    //echo count($gp_result).'<br>';
                                    for($i=0; $i<count($gp_result);$i++)
                                    {
                                        echo"
                                              <a class=\"tile bg-darkIndigo\" data-click=\"transform\">
                                                  <div class=\"tile-content\">
                                                      <div class=\"text-left padding10 ntp\">
                                                          <h2 class=\"fg-white no-margin\">";print_r($groupname); echo"</h2>
                                                          <h3 class=\"fg-white no-margin\">";print_r($groupdescription); echo"</h3>
                                                      </div>
                                                  </div>";
                                                   echo"  <div class=\"brand bg-dark opacity\">
                                                      <span class=\"text\"><p class=\"fg-white\">";
                                               echo $groupmembercount;
                                               echo"member(s)   </p></span>
                                                  </div>";
                                              echo"</a>";
                                        echo"<br>";
                                    }
                                    echo "</div> ";
                                    //echo count($etresult).'<br>';
                                    echo "<br>";

                           echo "<div class=\"tile-group one\">
                                     <div class=\"tile-group-title\">"; echo"We found "; echo count($etresult); echo" group(s)."; echo"</div>";
                           echo "<br>";
                           $eventinfo = getinfo($etresult[$i],$mysqli,"SELECT * FROM events WHERE id =");
                           $eventid = $eventinfo[0]['EVENTID'];
                           $eventdescription = $eventinfo[0]['DESCRIPTION'];
                           $attendence = getinfo($eventid,$mysqli,"SELECT COUNT(userID) as attendeesCount FROM attendees WHERE EVENTID =")[0]['attendeesCount'];
                          for($i=0; $i<count($etresult);$i++)
                          {
                              echo"
                                    <a class=\"tile bg-amber\" data-click=\"transform\">
                                        <div class=\"tile-content\">
                                            <div class=\"text-left padding10 ntp\">
                                                <h2 class=\"fg-white no-margin\">";print_r($eventdescription); echo"</h2>
                                                <h3 class=\"fg-white no-margin\">";print_r($userlname); echo"</h3>
                                            </div>
                                        </div>";
                                         echo"  <div class=\"brand bg-dark opacity\">
                                            <span class=\"text\"><p class=\"fg-white\">";
                                     echo $attendence;
                                     echo"person going   </p></span>
                                        </div>";
                                    echo"</a>";
                              echo"<br>";
                          }
                          echo "</div></div></div> ";*/
                          echo "</div> ";
                    ?>

                              
                    
                    </div>
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>    
    </body>
</html>

 
 
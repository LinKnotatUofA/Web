<?php 
// what we need to achieve for groups 
// 1.group creation - done
// 2.group page
// 3.search group
// 4.figure out who's in what group
// proposed table: group member id || user id || group id
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
    <script>
        function opensearchwindow()
        {
            
            $.Dialog({
            shadow: true,
            overlay: false,
            icon: '<span class="icon-search"></span>',
            title: 'Search For Groups',
            width: 500,
            padding: 10,
            onShow: function () {
                $("#datepicker").datepicker();
                var strVar="";
                     strVar += "<form id=\"form_stories\" method =\"post\" action=\"events\/upload_stories.php\">  ";
                     strVar += "    <p>What kind of groups are you interested?<\/p> <p><input name =\"search\" type=\"text\" \/><\/p> ";
                     strVar += "    <p><input name =\"submit\" type=\"submit\"\/> <\/p>";
                     strVar += "    <p><button class=\"button\" type=\"button\" onclick=\"$.Dialog.close()\">Cancel<\/button><\/p>";
                     strVar += "<\/form>";
                     strVar += "";
                $.Dialog.content(strVar);
                $.Metro.initInputs();
            }
         });

        
        }
    </script>
    
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
            </div>

            <div id="row2" class="row">
                <div class="span11 offset_special" id="content" style="width: 100%; height: auto; background: #C7D28A">
                    <div class="grid fluid show-grid">
                     
                        <div class="span3" >
                            <div style="margin-left: 20px; margin-top:40px">
                                <a href ="form.php"><button class="large">Create</button></a>
                                <button class="large" onclick="opensearchwindow()">Search</button>
                            </div>
                        </div>
                        
                        <?php 
                        
                        
                            //if user already in a group , display that group on the groups page
                            $mysqli = new mysqli("us-cdbr-azure-northcentral-a.cleardb.com", "ba30dbdb2d10ef", "272e799b", "bsquared_user");
                            $id = $_SESSION['id'];
                        
                        
                            $query = mysqli_query($mysqli,"SELECT GID FROM group_members WHERE userID='$id'");
                            $row = mysqli_fetch_assoc($query);
                            $groupid = $row['GID'];


                            
                            //grab group info once we find out which group user belongs to
                            $query = mysqli_query($mysqli,"SELECT * FROM groups WHERE GID='$groupid'");
                            $row = mysqli_fetch_assoc($query);
                            

                            if($groupid)
                            {
                                 
                                echo "<div class='tile-group four' style='margin-left:20px'>";
                                echo "      <div class='tile double double-vertical'>";
                                echo "          <div class='tile-content image'>
                                        '           <img src='data:image/jpeg;base64,'.base64_encode(";print_r($row['GPIC']);echo")/>";
                                echo "          </div>";
                                echo "      </div>";
                                echo "      <div class='tile double' style='float:right;background-color:#A3A86B'>";
                                echo "          <div class='tile-content'>
                                                        <div class='text-left padding5 ntp'>
                                                            <h2 class='fg-white no-margin'>Name:<br>";print_r($row['GNAME']);echo"</h2>
                                                        </div>

                                                </div>
                                            </div>
                                     ";     
                               
                                echo "      <div class='tile double' style='background-color:#82786F'>";
                                echo "          <div class='tile-content'>
                                                        <div class='text-left padding5 ntp'>
                                                            <h2 class='fg-white no-margin'>Description:<br>";print_r($row['GDESCRIPTION']);echo"</h2>
                                                        </div>
                                                    </div>
                                            </div>
                                     ";     
                                echo "      <div class='tile triple' style='background-color:#404545'>";
                                echo "          <div class='tile-content'>
                                                        <div class='text-left padding5 ntp'>
                                                            <h2 class='fg-white no-margin'>Tags:<br>";print_r($row['GTAGS']);echo"</h2>
                                                        </div>
                                                    </div>
                                            </div>
                                     ";     
                                //we also gotta figure out who is in the group
                                $peoplefinder = mysqli_query($mysqli,"SELECT userID FROM group_members WHERE GID='$groupid'");
                                $result = mysqli_fetch_array($peoplefinder);
                                $resultlen = count($result);
								//making changes from here
								$x = 0;
								$usernamelist = array();
								while ($x < $resultlen)
								{
									$namefinder = mysqli_query($mysqli,"SELECT username FROM user WHERE id='$result[$x]'");
									$username = mysqli_fetch_array($namefinder);
									array_push($usernamelist,$username[0]);
									//echo "$usernamelist[$x]";
									$x++;
								}
								/*for ($x=0; $x < count($usernamelist); $x++)
								{
									echo "$usernamelist[$x]"l;
								}*/
								
                                //Display the first five members, then spawn a button that will expand the list when clicked 
                                echo "      <div class='tile' style='background-color:#404545'>";
                                echo "          <div class='tile-content'>
                                                        <div class='text-left padding5 ntp'>
                                                            <h2 class='fg-white no-margin'>Group Members:<br>";if($resultlen <=5)
                                                                                                               {
                                                                                                                    $x = 0;
                                                                                                                    while($x<$resultlen)
                                                                                                                    {
                                                                                                                        // display the user ids
                                                                                                                        // bare minimum is achieved in order to display user ID
                                                                                                                        // next up would be to query all group member info with one big ass mysqli statement, in a fucking fancy javascript dialog
																														echo "$usernamelist[$x]";
																														echo "<br>";
                                                                                                                        $x++;
                                                                                                                    }
                                                                                                               }
                                                                                                               else;
                                                    echo"</h2>
                                                    <button>Button</button>
                                                        </div>
                                                    </div>
                                            </div>
                                      </div>";     

                                    
                            }
                        ?>    
                         
                            
                        
                    </div>
                </div>
            </div>
            <div id="row3" class="row">
                <div class="span11 offset_special tertiary-text bg-dark fg-white" style="padding: 20px" />
                    Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                    <br><br> <a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                    <br><br> Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>
                </div>
            </div>

        <script  type="text/javascript" charset="UTF-8" >
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

 
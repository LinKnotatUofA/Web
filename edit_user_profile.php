<?php 
    session_start();
    require "/events/load_events.php";
    require "/account/db.php";
    //check session id
    $id = $_SESSION['id'];
    if(!$id)
    {
        header( "url=/index.php" ); 
    }
    //check if info has being changed
    if(isset($_POST['user_profile_submit']))
    {
        $change = "UPDATE user_preferences SET ";
        $upload = false;
        if(isset($_POST['firstn']))
        {
            $firstn=$_POST['firstn'];
            if($firstn!="")
            {
                $change=$change."firstn = '$firstn',";
                $upload = true;
            }
            
            
        }
        if(isset($_POST['lastn']))
        {
            $lastn=$_POST['lastn'];
            if($lastn!="")
            {
                $change=$change."lastn = '$lastn',";
                $upload = true; 
            }
            
            
        }
        if(isset($_POST['background_color']))
        {
            $background_color=$_POST['background_color'];
            if($background_color!="")
            {
                $change=$change."prefered_color = '$background_color',";
                $upload = true;
            }
            
            
        }
        if(isset($_POST['birthday']))
        {
            $birthday=$_POST['birthday'];
            if($birthday!="")
            {
                $change=$change."birthdays = '$birthday',";
                $upload = true;
            }
            
        }
        $change_done = "WHERE user_id = $id";
        if(upload == true)
        {
            $change = $change.$change_done;
            
            $mysql_statement = str_replace(',WHERE',' WHERE',$change);
            $update = mysqli_query($mysqli,$mysql_statement);
            if ( false===$update ) {
                printf("error: %s\n", mysqli_error($mysqli));
               
            }
            
        }
        
      
    }
      //load original User Info
      //$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
        $user_preferences_query = mysqli_query($mysqli,"SELECT * FROM user_preferences WHERE user_id ='$id'");
        $user_preferences = mysqli_fetch_assoc($user_preferences_query);
       
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - User Settings</title>
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
    <script type="text/javascript" src="js/jscolor.js"></script>

    
</head>
	<body class="metro">
        <div class="grid fluid show-grid" align="center">
            <div id="row0">
                <div class="row span4" >
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" >
                <div class="row span12" align="left">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
            </div>
            <div id="row2" >
                <div class="row span12" align="center" id="content" style="width: auto; height: auto; background: #C7D28A;padding:2.5%;"  />
                    <div class="grid fluid show-grid">
                        <div id="featured_row1" class="row"  align="left">

                                <p> in the button tag below, add an onclick section and link it to a javascript function that display a dialog asking user to upload picture</p>
                          
                            <button class="button" id="createFlatWindow">Create Flat Window
                            </button>

                                <script>

        $("#createFlatWindow").on('click', function(){
            $.Dialog({
                                            overlay: true,
                                            shadow: true,
                                            flat: true,
                                            
                                            title: 'Flat window',
                                            content: '',
                                            onShow: function(_dialog){
                                                var content = _dialog.children('.content');
                                                content.html('Set content from event onShow');
                                                $.Dialog.content(content);
                                            }

                                        });
                                    }); 
    </script>

                            <form id="userinfo form" method ="post" enctype="multipart/form-data" action = "edit_user_profile.php">  
                                <p>First Name </p> <input name ="firstn" type="text" placeholder="<?php print_r($user_preferences['firstn']); ?>" />
                               	<p>Last Name </p> <input name ="lastn" type="text" placeholder="<?php print_r($user_preferences['lastn']); ?>"/>
                                <p>Prefered BackGround </p> <input class="color" name="background_color" type="text" placeholder="<?php print_r($user_preferences['prefered_color']); ?>"/>
                                <p>Birthday</p> <input name ="birthday" type="date" placeholder="<?php print_r($user_preferences['birthdays']); ?>"/>
                                <p></p>
                                <p><input name ="user_profile_submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>
                            </form>

                        </div>
                    </div>
               </div>  
            </div> 
            <div id="row3">
                <div align="left" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" >
                    Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                    <br></br><a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                    <br></br>Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>
                 
                </div>
            </div>
        </div>        
        </div>
    </body>
</html>
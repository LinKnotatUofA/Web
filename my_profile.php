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

                <div class="row span12" id="content" style="width: 100%; height: auto; background: #C7D28A" style="padding:40px"/>
                    <div class="grid fluid show-grid">
                    
                    <p>
                        <?php
	                        $user_info = mysqli_query($mysqli,"SELECT * FROM user_preferences WHERE user_id ='$id'");
                            $info = mysqli_fetch_assoc($user_info);
                            print_r($info['firstn']);
	                        echo " ";
	                        print_r ($info['lastn']);
	                        echo "<br>";
	                        echo "Born on: ";
	                        print_r ($info['birthdays']);
	                        
	                        //print_r($info[0]['lastn']);
	                        //print_r($info[0]['birthdays']);
	
	



?>




                    </p>              
                    
                    </div>
            </div>
            <div id = "row3" class="row span12 tertiary-text bg-dark fg-white" style="padding: 20px" align ="left" >
                <footer class="bg-dark" data-load="bottom.html"></footer>
            </div>
        </div>    
    </body>
</html>

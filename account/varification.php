<?php

session_start();
require "db.php";
if (isset($_GET["code"]))
{
    $varificationcode = $_GET["code"];
    //find the row in varify 
     
    $find =  mysqli_query($mysqli, "SELECT User_ID FROM verify WHERE Var_Code ='$varificationcode'");
    if ( false===$insert ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    $row = mysqli_fetch_assoc($find);
    $userid = $row['User_Id'];
    
    //verify the user associated with id
    
    $update = mysqli_query($mysqli,"UPDATE user SET verified = '1' WHERE id = '$userid'");
    
    
    if ( false===$update ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    else
    {
        echo "Your account is now verified!";
        header( "refresh:1; url=/index.php" ); 
    }
    
    
}
else
{
    echo"no varification code";
    
}
?>
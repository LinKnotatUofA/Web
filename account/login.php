<?php

session_start();
require $_SERVER['DOCUMENT_ROOT']."/account/db.php";

$username = $_POST['login'];
$password = $_POST['password'];

if($username&&$password)
{
    
   
   $query = mysqli_query($mysqli,"SELECT * FROM user, user_preferences WHERE user.id = user_preferences.user_id AND user.username = '$username' ");
   
   $numrows = mysqli_num_rows($query);
   
   if($numrows != 0)
   {
       while($row = mysqli_fetch_assoc($query))
       {
           $dbusername = $row['username'];
           $dbpassword = $row['password'];
           $dbuserid = $row['id'];
           $dbactualname = $row['firstn'].' '.$row['lastn'];
           $dbuserprivledge = $row['verified'];
           
       }
       if($username==$dbusername&&$password==$dbpassword)
       {
           
           echo "Login successful,heading back to homepage";
           header( "refresh:1; url=/index.php" ); 

           $_SESSION['username']=$dbusername;
           $_SESSION['id'] = $dbuserid;
           $_SESSION['actualname']=$dbactualname;           
           $_SESSION['verified']=$dbuserprivledge;
       }
       else
           echo" Incorrect password";
   }
   else
      die("That username doesn't exist");
}
else
    die("Please enter a username");

?>

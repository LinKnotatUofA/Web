<?php

session_start();

$username = $_POST['login'];
$password = $_POST['password'];

if($username&&$password)
{
    
   $mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");
   
   $query = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username'");
   $numrows = mysqli_num_rows($query);
   
   if($numrows != 0)
   {
       while($row = mysqli_fetch_assoc($query))
       {
           $dbusername = $row['username'];
           $dbpassword = $row['password'];
           $dbid= $row['id'];
       }
       if($username==$dbusername&&$password==$dbpassword)
       {
           
           echo "Login successful,heading back to homepage";
           header( "refresh:3; url=/index.php" ); 

           $_SESSION['username']=$dbusername;
           $_SESSION['id']=$dbid;
           
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
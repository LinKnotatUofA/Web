<?php

session_start();

if (isset($_SESSION['username']))
{
    
    echo "you're logged in as:".$_SESSION['username'];
    echo "<p>";
    echo "<a href='logout.php'>Click here to logout</a>";
    
}
else
    header ("location:  index.html");


?>
<?php

session_start();

session_destroy();

echo "you have been logged out";

echo "heading back to homepage";

header( "refresh:3; url=/index.php" ); 


?>
<?php 
sesssion_start();
if(isset($_SESSION['username']) != NULL)
{
	echo "YES";
}
else
	echo "NO";
?>
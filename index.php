<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	echo $user;
	echo '<br>';
	echo $pass;
}
?>
<form action="Tutorial.php" method="POST">
User Name <input type="text" name="user"/><br><br>
Password <input type="password" name="pass" /><br><br>
<input type="submit" value="submit" />
</form>

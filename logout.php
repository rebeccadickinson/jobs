<?php
session_start();
unset($_SESSION['loggedin']);//ends session 

?>
<?PHP
$title = 'Log out';//sets title
require 'top.php';//sets header 
echo 'You are now logged out';
?> 
<?PHP
	require 'bottom.php';//sets page footer 
?>
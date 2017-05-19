<?php 
	$server = '127.0.0.1';//sets server
 	$username = 'rebecca';//sets username
	$password = 'rebecca1996';//sets password
	$schema = 'traveldatabase';//sets schema
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);//sets the PDO and connects to database  
?>
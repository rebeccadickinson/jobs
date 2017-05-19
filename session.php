<?PHP
//starts the session
session_start();
//if user is logged in
if (isset($_SESSION['loggedin'])) {
	//shows the username of the person logged in 
	 echo '<p>You are logged in as '.$_SESSION['loggedin'].' <a id = "logout" href="logout.php">Logout</a></p>';
}
else { //if user is not logged in
	 header('Location: login.php');//https://bytes.com/topic/php/answers/471601-using-php-load-another-page-html-page 
	 echo '<p>Sorry, you must be logged in to view this page.</p>';
	
}
?>
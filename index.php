<?PHP
//starts the session
session_start();
//if user is logged in
if (isset($_SESSION['loggedin'])) {
	 echo '<p>You are logged in as '.$_SESSION['loggedin'].' <a id = "logout "href="logout.php">Logout</a></p>';
}
else { //if user is not logged in

}
?>
<?PHP
	$title = 'Welcome!';//sets title of webpage 
	require 'top.php';//includes header of page and connects to database 
?> 
	<h2> Welcome to The Dickinson Travel Company. On this site you can search for jobs that are available. Alternatively, if you are an admin you can log into the 
	admin area and make alterations/deletions/additions to jobs, categories and admins.</h2> 
<?PHP
	require 'bottom.php'//includes footer of webpage 
?>


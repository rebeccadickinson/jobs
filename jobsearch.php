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
$title = 'Apply for a Job!';
require 'top.php';
?>
	<form action = "jobsearchfiltered.php" method = "POST">
			<?PHP 
				//calls function for select list 
				require 'categorydropdownmenu.php';
				$category = new category();
			?>
		<input type = "submit" value = "GO!" name = "submit" />
	</form>
	
	<form action = "jobsearchfiltered.php" method = "POST">
		<label>Search by Location </label><input type = "text" name = 'location'/>
		<input type = "submit" value = "GO!" name = "submit2" />
	</form>
	
	<form action = "jobsearchfiltered.php" method = "POST">
		<label>Search by Keyword </label><input type = "text" name = 'keyword'/>
		<input type = "submit" value = "GO!" name = "submit3" />
	</form>
	
	<?PHP
	//displays all the jobs 
	$jobsQuery = $pdo->query('SELECT * from jobs');
	foreach($jobsQuery as $jobs){
	echo '<form action = "JobApplication.php" method = "POST">';
	 echo '<form action = "JobApplication.php" method = "POST">';
			 echo '<input type = "hidden" name = "jobref" value = "'.$jobs['jobref'].'"/><p> Job reference: '.$jobs['jobref'].'<br> 
			 Job Title: '.$jobs['jobtitle'].'<br>
			 Job Salary: £'.$jobs['salary'].'<br>
			 Job Description: '.$jobs['description'].'<br>
			 Location: '.$jobs['location'].'<br> 
			 Category: '.$jobs['category'].'</p><br>';
			 echo '<input type = "submit" value = "Apply For Job" name = "apply"/></form>';
	}
		//var_dump($_GET);
	?>
<?PHP
require 'bottom.php'//includes the bottom of the page 
?>

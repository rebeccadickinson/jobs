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
$title = 'Apply for a Job!';//sets title of page 
require 'top.php';//includes footer 
?> 
	<form action = "jobsearchfiltered.php" method = "POST">
				<?PHP 
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
//search by category
if(isset($_POST['submit'])){
		
		$jobsQuery = $pdo->prepare('SELECT * FROM jobs WHERE category = :category');
		$categoryQuery = $pdo->prepare('SELECT * FROM categories WHERE category = :category');
		$criteria = [
		'category' => $_POST['category']
		];
		$jobsQuery->execute($criteria);
		echo '<ul>';
		while ($jobs = $jobsQuery->fetch()) {
			 $categoryCriteria = [
				'category' => $jobs['category']
			 ];
		 $categoryQuery->execute($categoryCriteria);
		 $category = $categoryQuery->fetch();
		 echo '<form action = "JobApplication.php" method = "POST">';
			 echo '<input type = "hidden" name = "jobref" value = "'.$jobs['jobref'].'"/><p> Job reference: '.$jobs['jobref'].'<br> 
			 Job Title: '.$jobs['jobtitle'].'<br>
			 Job Salary: £'.$jobs['salary'].'<br>
			 Job Description: '.$jobs['description'].'<br>
			 Location: '.$jobs['location'].'<br> 
			 Category: '.$jobs['category'].'</p><br>';
			 echo '<input type = "submit" value = "Apply For Job" name = "apply"/></form>';
		}
		echo '</ul>';
		//var_dump($_POST);
		} 
		
	//search by location
	if(isset($_POST['submit2'])){
		$jobslocQuery = $pdo->prepare('SELECT * FROM jobs WHERE location = :location');
		$criteria = [
		'location' => $_POST['location']
		];
		$jobslocQuery->execute($criteria);
		foreach ($jobslocQuery as $jobs){
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
	//var_dump($_POST);
	}
	//search by keyword
	if(isset($_POST['submit3'])){
		$keywordquery = $pdo->prepare('SELECT * FROM jobs WHERE jobtitle LIKE :keyword
															OR  salary LIKE :keyword                    
															OR  description LIKE :keyword
															OR  location LIKE :keyword
															OR  category LIKE :keyword');
		//http://stackoverflow.com/questions/11939751/search-a-whole-table-in-mysql-for-a-string
		$criteria = [
		'keyword' => $_POST['keyword']
		];
		$keywordquery->execute($criteria);
		foreach ($keywordquery as $jobs){
			 echo '<form action = "JobApplication.php" method = "POST">';
			 echo '<input type = "hidden" name = "jobref" value = "'.$jobs['jobref'].'"/><p> Job reference: '.$jobs['jobref'].'<br> 
			 Job Title: '.$jobs['jobtitle'].'<br>
			 Job Salary: £'.$jobs['salary'].'<br>
			 Job Description: '.$jobs['description'].'<br>
			 Location: '.$jobs['location'].'<br> 
			 Category: '.$jobs['category'].'</p><br>';
			 echo '<input type = "submit" value = "Apply For Job" name = "apply"/></form>';
		}
	//var_dump($_POST);//debugging tool, shows variables  of each form in an array 
	}
?>

<?PHP
require 'bottom.php'//includes bottom of page 
?>
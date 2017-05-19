<?PHP
require 'session.php';//sets session 
$title = 'View Applications';//sets page title 
require 'top.php';//sets header
?>   
<form action ="viewapplications.php" method ="POST">
	<?php
		//shows job drop down menu
		require 'dropdown.php';
		$dropdown = new dropdown();
	?> 
<input type = "submit" value = "View Applications" name = "submit"/>
</form>
<?PHP
		if (isset($_POST['submit'])){//when button is clicked 
		$applicationsQuery = $pdo->prepare('SELECT * from applications WHERE jobref = :jobref');
		$jobsQuery = $pdo->prepare('SELECT * FROM jobs WHERE jobref = :jobref');
		$criteria = [
		':jobref' => $_POST['jobref'] 
		];
		$applicationsQuery->execute($criteria);
		echo '<ul>';
		while ($applications = $applicationsQuery->fetch()) {//displays query result 
			 $jobsCriteria = [
				'jobref' => $applications['jobref']
			 ];
		 $jobsQuery->execute($jobsCriteria);
		 $jobs = $jobsQuery->fetch();
		 echo '<form action = "JobApplication.php" method = "POST">';
		 echo '<p> First Name: '.$applications['firstname'].'<br> 
		 Surname: '.$applications['surname'].'<br> 
		 Date Of Birth: '.$applications['dob'].'<br>
		 Email: '.$applications['email'].'<br> 
		 Address: '.$applications['street'].', '.$applications['city'].', '.$applications['country'].'<br> 
		 Phone Number: '.$applications['phoneno'].'<br>
		 Mobile Number: '.$applications['mobileno'].'<br>
		 Cover Letter:	'.$applications['cvcover'].'<br>
		 Job Reference: '.$jobs['jobref'].'<br>
		 Job: '.$jobs['jobtitle'].'<br></p>';
		}
		echo '</ul>';
	}

?>
<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php';//sets page footer 
?>
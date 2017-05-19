<?PHP
require 'session.php';//sets session 
$title = 'delete a job!';
require 'top.php';//sets header 
?> 
<h1>Please select the job you need to delete!</h1>
	<form action = "deletejob.php" method = "POST">

			<?php
			//shows job dropdowm menu 
				require 'dropdown.php';
				$dropdown = new dropdown();
			?>
		
	<input type = "submit" value = "DELETE!" name = "submit" />
	<br>
<?PHP
		if (isset($_POST['submit'])){//when submit button is clicked 
			$deletejob = $pdo->prepare('DELETE FROM jobs WHERE jobref = :jobref');
			$criteria = [
				 'jobref' => $_POST['jobref']
			];
			$deletejob->execute($criteria);
			if($deletejob){//delete success
				echo "<p>job deleted</p>";
			}
			else{//failure 
				echo "<p>"; 
				echo "row not added";
				echo '</p>';
				echo $pdo->errorInfo()[2];
			}
		}
?> 
<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php';//sets page footer 
?>

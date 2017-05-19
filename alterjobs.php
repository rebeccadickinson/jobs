<?PHP
require 'session.php';//sets session 
$title = 'select a job to alter';//sets page title 
require 'top.php';//sets header 
?> 
<h2>Please select the job you need to change!</h2> 
	<form action = "alterjobs.php" method = "POST">
			<?php
			//shows job drop down menu
				require 'dropdown.php';
				$dropdown = new dropdown();
			?>
	<input type = "submit" value = "GO!" name = "submit" />
	<br>
		<?PHP
		//shows editing form 
		if (isset($_POST['submit'])){
			$catform = $pdo->prepare('SELECT*FROM jobs WHERE jobref = :jobref');
			$criteria = [
				 'jobref' => $_POST['jobref']
			];
			$catform->execute($criteria);
			foreach ($catform as $row){
				echo '<input type="hidden" name="jobref" value = "'.$row['jobref'].'"/><br>';
				echo '<label>Job Title</label> <input type="text" name="jobtitle" value = "'.$row['jobtitle'].'"/><br>';
				echo '<label>Salary</label> <input type="text" name="salary" value = "'.$row['salary'].'"/><br>';
				echo '<label>Description</label> <input type="text" name="description" value = "'.$row['description'].'"/><br>';
				echo '<label>Location</label> <input type="text" name="location" value = "'.$row['location'].'"/><br>';
				require 'categorydropdownmenu.php';//calls category function drop down menu  
				$category = new category();
				echo '<input type = "submit" value = "submit" name = "submit2" /></form>';
			}
		}
		?>
		
<?PHP
	//update query 
		if (isset($_POST['submit2'])){
		$updatejob = $pdo->prepare('UPDATE jobs SET jobtitle = :jobtitle, salary = :salary, description = :description, location = :location, category = :category
		WHERE jobref = :jobref');
			$criteria = [
				'jobref' => $_POST['jobref'],
				'jobtitle' => $_POST['jobtitle'],
				'salary' => $_POST['salary'],
				'description' => $_POST['description'],
				'location' => $_POST['location'],
				'category' => $_POST['category']
			];
		$updatejob->execute($criteria);
		if($updatejob){//success
				echo "<p>Job updated</p>";
			}
			else{//failure 
				echo "<p>"; 
				echo "Job not updated";
				echo '</p>';
				echo $pdo->errorInfo()[2];
			}
		//var_dump($_POST);
		}
		?> 	
		<a href="adminarea.php">BACK</a>		
<?PHP
	require 'bottom.php';//sets page footer 
?>
								

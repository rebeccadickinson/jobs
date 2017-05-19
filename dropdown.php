<?PHP
		class dropdown{//sets variable
			public $jobref;//sets function
			public function dropdown(){//sets drop down menu function 
			require 'connect.php';//connects to database 
			echo '<label>Choose a job</label> <select name="jobref">';
			echo '<option value = "null">[Please Select a job]</option>';
			
				$table = $pdo->query('SELECT*FROM jobs');//query 
												foreach ($table as $row) {
												echo '<option value ="'.$row['jobref'].'">'.$row['jobref'].' '.$row['jobtitle'].'</option>';
											}
				echo '</select><br>';
			} 				
		}
?>
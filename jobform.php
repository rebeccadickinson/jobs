<?PHP
require 'session.php';//displays who is logged in 
$title = 'Add a new job';//sets page title
require 'top.php';//set header 
?> 
	<?PHP  
		if (isset($_POST['submit'])){//when button is clicked 
		//adds job to database
		//
			$results = $pdo->prepare('INSERT INTO jobs (jobtitle, salary, description, location, category)  
									VALUES (:jobtitle,:salary,:description,:location,:category)');
			//declares variables
			$criteria = [
			 'jobtitle' => $_POST['jobtitle'],
			 'salary' => $_POST['salary'],
			 'description' => $_POST['description'],
			 'location' => $_POST['location'],
			 'category' => $_POST['category']
			];
			$results->execute($criteria);//runs the query 
			if($results){//job added to database 
				echo "<p>1 row added</p>";
			}
			else{//job failed to be added  
				echo "<p>"; 
				echo "row not added";
				echo '</p>';
				echo $pdo->errorInfo()[2];//displays sql error if there is one 
			}
		}
		//var_dump($_POST);	<- used to display strings entered in the fields when the submit button is clicked to debug errors 
		?>
		<form action = "jobform.php" method = "POST">
			<label>Job Title</label> <input type="text" name="jobtitle"/><br>
			<label>salary</label> <input type="text" name="salary"/><br>
			<label>description</label> <input type="text" name="description"/><br>
			<label>location</label> <input type="text" name="location"/><br>
			<?PHP 
				//calls function for dropdown menu for categories  
				require 'categorydropdownmenu.php';
				$category = new category();
			?>
			<input type = "submit" value = "submit" name = "submit" />
		</form>
		<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php'//sets footer 
?>






			 
















 
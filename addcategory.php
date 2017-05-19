<?PHP
require 'session.php';//sets session 
$title = 'Add a Category!';//sets title 
require 'top.php';//sets header 
?>  
	<?PHP  
		if (isset($_POST['submit'])){//when submit button is clicked 
			$category = $pdo->prepare('INSERT INTO categories (category, description)  
									VALUES (:category,:description)');
			$criteria = [
			 'category' => $_POST['category'],
			 'description' => $_POST['description']
			];
			$category->execute($criteria);
			if($category){// category added successfully 
				echo "<p>1 row added</p>";
			}
			else{// category not added 
				echo "<p>"; 
				echo "row not added";
				echo '</p>';
				echo $pdo->errorInfo()[2];
			}
		}
		//var_dump($_POST);	
		?>
		<form action = "addcategory.php" method = "POST">
			<label>Category</label> <input type="text" name="category"/><br>
			<label>Description</label> <input type="text" name="description"/><br>
			<input type = "submit" value = "submit" name = "submit" />
		</form>
		<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php';//sets page footer 
?>
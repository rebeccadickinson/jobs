<?PHP
require 'session.php';//sets session 
$title = 'select a category to alter';//sets page title 
require 'top.php';//sets header 
?> 
<h1>Please select the category you need to change!</h1> 
<?PHP
	$class = new databaseTable($pdo,'categories');
	$category = $class->findAll();
		echo '<table><thead><tr><th>Category</th><th>Description</th><th>Action</th></tr></thead>';
		foreach($category as $row){
			echo '<tr><td><b>'.$row['category'].'</b></td>';
			echo '<td>'.$row['description'].'.</td>';
			echo'<td>
			<form action = "addcategory.php" method ="GET">
			<input type = "hidden" name = "category" value = "'.$row['category'].'"/>
			<input type = "submit" value = "update" name = "update"/>
			</form>
			<form action = "altercategory.php" method ="POST">
			<input type = "hidden" name = "category" value = "'.$row['category'].'"/>
			<input type = "submit" value = "delete" name = "delete"/>
			</form></td></tr>';
		}
		echo '</table>';
		if (isset($_POST['delete'])){
			$criteria = [
			'category' => $_POST['category']
			];
			$class = new databaseTable($pdo,'categories');
			$record = $class->delete($criteria);
			echo "category deleted"; 
	}
		//var_dump($_POST);
?> 
		<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php';//sets page footer 
?>
								

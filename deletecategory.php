<?PHP
require 'session.php';//sets session 
$title = 'delete a category';//sets page title 
require 'top.php';//sets header 
?> 
	<h1>Please select the category you need to delete!</h1>
	<form action = "deletecategory.php" method = "POST">
			<?php
				//shows drop down menu 
				require 'categorydropdownmenu.php';
				$category = new category();
			?>
	<input type = "submit" value = "DELETE!" name = "submit" />
	<br>
<?PHP
		if (isset($_POST['submit'])){//when button is clicked 
			$deletecategory = $pdo->prepare('DELETE FROM categories WHERE category = :category');
			$criteria = [
				 'category' => $_POST['category']
			];
			$deletecategory->execute($criteria);
			if($deletecategory){//delete successfully
				echo "<p>Category deleted</p>";
			}
			else{//failure 
				echo "<p>row not added</p>"; 
				echo $pdo->errorInfo()[2];
			}
		}
?> 
<a href="adminarea.php">BACK</a>

<?PHP
	require 'bottom.php';//sets page footer 
?>

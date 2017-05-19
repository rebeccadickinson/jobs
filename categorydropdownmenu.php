<?PHP
		class category{//sets variable
			public $category;//sets variable
			public function category(){//sets drop down menu function
			require 'connect.php';//connects to database
			echo '<label>Choose a category</label> <select name="category">';
			echo '<option value = "null">[Please Select a Category]</option>';
				$category = $pdo->query('SELECT*FROM categories');
												foreach ($category as $row) {//query
												echo '<option value ="'.$row['category'].'">'.$row['category'].'</option>';
											}
				echo '</select><br>';
			} 				
		}
?>
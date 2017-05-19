<?PHP
require 'session.php';//sets session 
$title = 'add an admin';//sets title 
require 'top.php';//sets header
?> 
 
<?PHP 
$admintrack = $pdo -> query('SELECT * FROM ADMIN');
    echo '<table>';
	echo '<table><thead><tr><th>Username</th><th>Added By</th><th>Action</th></tr></thead>';
	foreach($admintrack as $row){
		echo '<tr><td>'.$row['username'].'</td> 
		<td>'.$row['whoadded'].'.</td>
		<td>
		<form action = "addadmin.php" method ="GET">
		<input type = "hidden" name = "adminid" value = "'.$row['adminid'].'"/>
		<input type = "submit" value = "update" name = "update"/>
		</form>
        <form action = "trackadmin.php" method ="POST">
		<input type = "hidden" name = "adminid" value = "'.$row['adminid'].'"/>
		<input type = "submit" value = "delete" name = "delete"/>
		</form></td></tr>';
	}
	echo '</table>';
	if (isset($_POST['delete'])){
		$criteria = [
		'adminid' => $_POST['adminid']
		];
		$class = new databaseTable($pdo,'admin');
		$record = $class->delete($criteria);
		echo "delete";
	}
?>

<a href="adminarea.php">BACK</a>
<?PHP
require 'bottom.php'//sets footer 
?>
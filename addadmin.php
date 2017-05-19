<?PHP
require 'session.php';//sets session 
$title = 'add an admin';//sets title
require 'top.php';//sets header
?> 

<?PHP
if (isset($_GET['update'])){
unset($_GET['update']);
}
if (isset($_GET['adminid'])) {
$class = new databaseTable($pdo,'admin');
$record = $class->find('adminid', $_GET['adminid']);
}
else {
$record = false;
}
?> 
<form action = "addadmin.php" method = "POST">
		<input type="hidden" name="adminid" value="<?php if ($record) echo $record['adminid']; ?>"/>
		<label>Username</label> <input type="text" name="username" value="<?php if ($record){echo $record['username'];} ?>"/><br>
		<label>Password</label> <input type="password" name="password" value="<?php if ($record) echo $record['password']; ?>"/><br>
		<label>Email</label> <input type="text" name="email" value="<?php if ($record) echo $record['email']; ?>"/><br>
		<label>Who Added</label> <input type='text' name ="whoadded" value ="<?php if ($record){echo $record['whoadded'];} else {echo $_SESSION['loggedin'];}?>"/><br>
		<input type = "submit" value = "submit" name = "submit"/>
</form>	
<?php
if (isset($_POST['submit'])){//when button is clicked 
    
		$record = [
		 'adminid' => $_POST['adminid'],
		 'username' => $_POST['username'],
		 'password' => sha1($_POST['password']),
		 'email' => $_POST['email'],
		 'whoadded' => $_POST['whoadded']
		];
		
		$database = new databaseTable($pdo,'admin');
		$record = $database->save($record,'adminid');
		 
		echo 'user added:'; 	
}		
?>
<a href="adminarea.php">BACK</a>
<?PHP
	require 'bottom.php';//sets page footer 
?>

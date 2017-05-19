<?PHP
session_start();//starts session 
?>
<?PHP
$title = 'Log in to the admin area';//sets title of page 
require 'top.php';//includes header 
?> 	
<?PHP  
		 if (isset($_POST['submit'])){//when submit button is pressed 
		 //searches for logins 
		$login = $pdo->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
			$criteria = [
			 'username' => $_POST['username'],
			 'password' => $_POST['password']
			];
			
			$login->execute($criteria);
			$user = $login->fetch();
			//successful login
			if ($login->rowCount() > 0) {
			 $_SESSION['loggedin'] = $user['username'];
			 header('Location: adminarea.php');//https://bytes.com/topic/php/answers/471601-using-php-load-another-page-html-page 
			}
			//unsuccessful login 
			else {
			 echo '<p>Sorry, your username and password could not be found</p>';
			}
		}
		?>
		<form action = "login.php" method = "POST">
			<label>Username</label> <input type="text" name="username"/><br>
			<label>Password</label> <input type="password" name="password"/><br>
			<input type = "submit" value = "submit" name = "submit" />
		</form>
<?PHP
	require 'bottom.php'//includes footer 
?>
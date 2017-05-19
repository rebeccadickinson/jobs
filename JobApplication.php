<?PHP
//starts the session
session_start();
//if user is logged in
if (isset($_SESSION['loggedin'])) {
	 echo '<p>You are logged in as '.$_SESSION['loggedin'].' <a id = "logout "href="logout.php">Logout</a></p>';
}
else { //if user is not logged in

}
?>
<?PHP
$title = 'Apply for a job!';//sets title of page 
require 'top.php';//includes header 
?>
<h2> Application Form!</h2>
<p>Please enter in BLOCK CAPITALS.</p>
	<form action = "JobApplication.php" method = "POST">
		<?PHP 
		//adds a hidden input of jobref of the selected job 
			if  (isset($_POST['apply'])){
			echo '<input type="hidden" name="jobref" value = "'.$_POST['jobref'].'"/><br>';
		}
		?>
		<label>First Name    </label> <input type="text" name="firstname"/><br>
		<label>Surname       </label> <input type="text" name="surname"/><br>
		<label>Street        </label> <input type="text" name="street"/><br>
		<label>City/County   </label> <input type="text" name="city"/><br>
		<label>Country       </label> <input type="text" name="country"/><br>
		<label>Postcode      </label> <input type="text" name="postcode"/><br>
		<label>Email         </label> <input type="text" name="email"/><br>
		<label>Date Of Birth </label> <input type="text" name="dob" value = "YYYY-MM-DD"/><br>
		<label>Phone number  </label> <input type="text" name="phoneno" maxlength="11"/><br>
		<label>Mobile Number </label> <input type="text" name="mobileno" maxlength="11"/><br>
		<label>CoverLetter/CV</label> <textarea rows="4" cols="50" name="cvcover"></textarea><br>
		<input type = "submit" value = "Submit Application" name = "submit"/>
	</form>
	<?php
	if  (isset($_POST['submit'])){//when the submit button is clicked when the application form is complete. 
		//inserts the data into the database
		$results = $pdo->prepare('INSERT INTO applications (firstname, surname, street, city, country, postcode, email, dob, phoneno, mobileno, cvcover, jobref)  
								VALUES (:firstname,:surname,:street,:city,:country,:postcode,:email,:dob,:phoneno,:mobileno,:cvcover,:jobref)');
		$criteria = [
		 'firstname' => $_POST['firstname'],
		 'surname' => $_POST['surname'],
		 'street' => $_POST['street'],
		 'city' => $_POST['city'],
		 'country' => $_POST['country'],
		 'postcode' => $_POST['postcode'],
		 'email' => $_POST['email'],
		 'dob' => $_POST['dob'],
		 'phoneno' => $_POST['phoneno'],
		 'mobileno' => $_POST['mobileno'],
		 'cvcover' => $_POST['cvcover'],
		 'jobref' => $_POST['jobref']
		];
		$results->execute($criteria);
	}
/* 	     	if($results){//if submission is successfully added to the database
				echo "<p>Submission confirmed!</p>";
				//sends an email to the admin
				$to      = 'admin@admin.com';
				$subject = 'Job application';
				$message = 'Someones added a job';
				$headers = 'From: webmaster@example.com' . "\r\n" .
					'Reply-To: webmaster@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);//http://stackoverflow.com/questions/5335273/how-to-send-an-email-using-php
			}
			}
			else{//if submission is not correctly added
				echo "<p>"; 
				echo "row not added";
				echo '</p>';
				echo $pdo->errorInfo()[2];
			} */
	
		?>
<?PHP
require 'bottom.php';//includes footer  
?> 
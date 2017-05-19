<?PHP
require 'session.php';//sets session 
$title = 'AdminArea!';//sets title
require 'top.php';//includes header 
?> 
	<p id ="admin">Welcome to the admin area. Please select from the activities below.</p> <br>
	<a class = "admin" href="jobform.php">Add a Job</a><br>
	<a class = "admin" href="alterjobs.php">Edit a Job</a><br>
	<a class = "admin" href="addcategory.php">Add a Category</a><br>
	<a class = "admin" href="altercategory.php">Edit a Category</a><br>
	<a class = "admin" href="viewapplications.php">View Applications</a><br>
	<a class = "admin" href="addadmin.php">Add a new admin</a><br>  
	<a class = "admin" href="trackadmin.php">Track Admin</a><br>
			

<?PHP
	require 'bottom.php'//includes footer 
?> 
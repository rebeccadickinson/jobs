<?PHP
class jobapp{
	public function jobapp(){
		require 'connect.php';
		 echo '<form action = "JobApplication.php" method = "POST">';
		 echo '<input type = "hidden" name = "jobref" value = "'.$jobs['jobref'].'"/><p> Job reference: '.$jobs['jobref'].'<br> Job Title: '.$jobs['jobtitle'].'<br> Job Description : '.$jobs['description']
		 .'<br> Location: '.$jobs['location'].'<br> Category: '.$category['category'].'</p><br>';
		 echo '<input type = "submit" value = "Apply For Job" name = "apply"/></form>';
	}
}
	 
?>
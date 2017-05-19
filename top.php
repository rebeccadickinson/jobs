<!DOCTYPE html>
<html>
	 <head>
		<title> 
		<?php
			//sets title of webpage
			echo $title; 
		?> 
		</title>
		<link rel="stylesheet" href="styles.css" media="screen"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php 
		//connects the page to the database
		require 'connect.php';
		require 'databaseTable.php';
		?>
	 </head>	
	<body> 
		<header>
			<h1>THE DICKINSON TRAVEL COMPANY</h1>
		</header>
	<nav id="nav">
		 <ul>
			<li>
				<a class = "navigation" href="index.php">Home</a>
			</li>
			<li>
				<a class = "navigation" href="jobsearch.php">Search For Jobs</a>
			</li>
			<li>
				<a class = "navigation" href="adminarea.php">Admin Area</a>
			</li>
		 </ul> 
	</nav>
<div class = 'content'>


		
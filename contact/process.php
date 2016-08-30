<?php

	include 'config.php';

	// GET THE VALUES FROM POST ARRAY
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$category = $_POST['category'];


	
	$mysqli = mysqli_connect(HOST, USER, PASSWORD, DB); 

	$result = mysqli_query($mysqli, "INSERT INTO contact(name,mobile,category) VALUES('$name','$mobile','$category')");

	header('Location:list.php');

	// Create a new row
	// Update the values in the created row
	// Save the row
	
	// Redirect to list.php

?>
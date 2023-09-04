<?php
	$host='localhost';
	$user='root';
	$password='';
	$database='garage';

	$conn=mysqli_connect($host, $user, $password, $database);
	if(!$conn){
		echo"failed" .mysqli_error($conn);
	}

?>

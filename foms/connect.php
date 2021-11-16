<?php
//	$con=mysqli_connect("localhost","root","","newsfeeds");
	$con = new mysqli("localhost","root","","foms");

	if ($con -> connect_errno) {
		echo "Failed to connect to MySQL: " . $con -> connect_error;
		exit();
	}
?>

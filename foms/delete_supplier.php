<?php
require_once "connect.php";

if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "DELETE FROM suppliers WHERE sup_id=$id"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error($con));
	if ($result){
		echo "Successfully Removed !";
		header("Location: load_suppliers.php"); 
	}
	else echo $con->error();
}


?>



<?php
require_once "connect.php";

if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "DELETE FROM products WHERE prod_id=$id"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error($con));
	if ($result){
		echo "Successfully Removed !";
		header("Location: load_products.php"); 
	}
	else echo $con->error();
}
?>
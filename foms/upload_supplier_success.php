<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$address = mysqli_real_escape_string($con, htmlspecialchars($_POST['address']));
	$phone = mysqli_real_escape_string($con, htmlspecialchars($_POST['phone']));

	
	$suppliers = mysqli_query($con, "SELECT * FROM suppliers");
	while($row = mysqli_fetch_array($suppliers)){$sid= $row['sup_id'];}
	$sid+=1;

	$sql="insert ignore into suppliers 
	(sup_id,sup_name, address, phone) 
	values 
	('$sid','$name','$address', '$phone')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
} else echo "Please input data!";
?>



<html>
<head>
	<title>Suppliers - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="header-text">
</div>
<br />
<a href="upload_supplier.php">Add</a><br /><br />
<a href="load_suppliers.php">All Suppliers</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>
</center>
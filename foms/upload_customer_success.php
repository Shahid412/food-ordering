<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$address = mysqli_real_escape_string($con, htmlspecialchars($_POST['address']));
	$phone = mysqli_real_escape_string($con, htmlspecialchars($_POST['phone']));
	$type = mysqli_real_escape_string($con, htmlspecialchars($_POST['ctype']));

	
	$customers = mysqli_query($con, "SELECT * FROM customers");
	while($row = mysqli_fetch_array($customers)){$cid= $row['c_id'];}
	$cid+=1;

	$sql="insert ignore into customers 
	(c_id, name, address,phone, type) 
	values 
	('$cid','$name','$address','$phone','$type')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>

<html>
<head>
	<title>Customers - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="upload_customer.php">Add</a><br /><br />
<a href="load_customers.php">All Customers</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

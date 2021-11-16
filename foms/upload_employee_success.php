<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$address = mysqli_real_escape_string($con, htmlspecialchars($_POST['address']));
	$phone = mysqli_real_escape_string($con, htmlspecialchars($_POST['phone']));
	$sal = mysqli_real_escape_string($con, htmlspecialchars($_POST['sal']));

	
	$emps = mysqli_query($con, "SELECT * FROM employee");
	while($row = mysqli_fetch_array($emps)){$eid= $row['e_id'];}
	$eid+=1;

	$sql="insert ignore into employee 
	(e_id, name, address, phone, sal) 
	values
	('$eid','$name','$address','$phone','$sal')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>



<html>
<head>
	<title>Employees - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="upload_employee.php">Add</a><br /><br />
<a href="load_employees.php">All Employeess</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

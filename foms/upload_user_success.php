<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$uname = mysqli_real_escape_string($con, htmlspecialchars($_POST['uname']));
	$password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));

	$users = mysqli_query($con, "SELECT * FROM users");
	while($row = mysqli_fetch_array($users)){$uid= $row['u_id'];}
	$uid+=1;

	$sql="insert ignore into users
	(u_id, name, username, password) 
	values 
	('$uid','$name','$uname','$password')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>

<html>
<head>
	<title>Users - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="upload_user.php">Add</a><br /><br />
<a href="load_users.php">All Users</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

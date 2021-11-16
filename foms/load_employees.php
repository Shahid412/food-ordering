<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT * FROM employee where name LIKE '%$query%'");
}
else {$result = mysqli_query($con, "SELECT * FROM employee");}
?>

<style>
body{
	margin:0 auto;
	width:100%;
	background-color:#dcdcdc;
	color: #696969;
}
.container{
}
.header-text{
	height:8%;
}
h1{
	letter-spacing:2px;
}
.header-text p{
	letter-spacing:4px;
	margin-top:-8px;
	font-style:italic;
	color:black;
}
.menu-items{
	height:24px;
	width:60%;
	
}
a{
	text-decoration:none;
	color: #696969;
	padding:8px;
	font-size:16px;
	font-weight:bold;
}
a:hover{
	color:#fff;
	
}
input{
	margin:20px;
	padding:8px;
	width:40%;
	border-radius:8px;
}
.submit{
	width:8%;
}
table{
	width:80%;
	border:2px solid gray;
}

th{
	border-bottom:2px solid gray;
	text-align:left;
	padding: 8px;
	background-color:black;
}
td{
	padding:8px;
	border-bottom:1px solid gray;
}
.operations{
	background-color:black;
}
</style>


<html>
<head>
	<title>Employees - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="header-text">
<h1>Welcome to Food Ordering Management System</h1>
</div>
<div class="feed-container">
<h1>Employees</h1>
<div class="menu-items">
<a href="index.php">Home</a>
<a href="upload_employee.php">Add</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search by Employee Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Employee ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Salary</th>
<th class="operations">Operation</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['e_id']; ?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['sal'];?></td>
<td class="operations">

<a href="delete_employee.php?id=<?php echo $row['e_id'];?>">Remove</a>
</td>

</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>
</center>
</body>
</html>
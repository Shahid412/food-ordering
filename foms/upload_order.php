<?php
require_once "connect.php";
$customers=mysqli_query($con, "select * from customers");
$products=mysqli_query($con, "select * from products");
$users=mysqli_query($con, "select * from users");

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
	margin:4px;
	padding:8px;
	width:32%;
	border-radius:8px;
}
select{
	margin:4px;
	padding:8px;
	width:32%;
	border-radius:8px;
}
.submit{
	margin:20px;
	padding:8px;
	border-radius:8px;
	width:8%;
	color:gray;
}
</style>


<html>
<head>
	<title>Orders - FOMS</title>
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
<h1>New Order</h1>
<div class="menu-items">
<a href="index.php">Home</a>
<br /><br /><br />
</div>
<div class="data-items">

<form method="post" action="upload_order_success.php">
<br />
<select name="pname" >
	<option>-- Select Product Name --</option>
	<?php 
	while($prow = mysqli_fetch_array($products))
        {
            echo "<option name='pname' value='". $prow['p_name'] ."'>" .$prow['p_name'] ."</option>";  // displaying data in option menu
        }
	?>
</select>
<br />
<select name="cname" >
	<option>-- Select Customer Name --</option>
	<?php 
	while($crow = mysqli_fetch_array($customers))
        {
            echo "<option name='cname' value='". $crow['name'] ."'>" .$crow['name'] ."</option>";  // displaying data in option menu
        }
	?>
</select>
<br />
<select name="uname" >
	<option>-- Select User Name --</option>
	<?php 
	while($urow = mysqli_fetch_array($users))
        {
            echo "<option name='uname' value='". $urow['username'] ."'>" .$urow['username'] ."</option>";  // displaying data in option menu
        }
	?>
</select>
<br />
<select name="pay_type" >
	<option>-- Select Payment Type --</option>
	<option value="cash">Cash</option>
	<option value="bank">Bank</option>
	<option value="check">Check</option>
</select>
<br />
<input type="date" name="date" >
<br />
<input type="number" name="qty" min="1" placeholder="Quantity">
<br /><br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
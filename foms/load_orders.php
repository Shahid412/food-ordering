<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	
	$result = mysqli_query($con, "SELECT od.order_id, od.price, od.qty, od.discount, od.total, c.name, p.p_name, o.dated, o.pay_type, u.username
	FROM order_details od 
	INNER JOIN orders o 
	ON od.order_id=o.order_id
	INNER JOIN customers c
	ON o.c_id=c.c_id
	INNER JOIN products p
	ON od.p_id=p.prod_id 
	INNER JOIN users u
	ON od.u_id=u.u_id 
	WHERE p.p_name LIKE '%$query%'"
	);
} else {
	$result = mysqli_query($con, "SELECT od.order_id, od.price, od.qty, od.discount, od.total, c.name, p.p_name, o.dated, o.pay_type, u.username
	FROM order_details od 
	INNER JOIN orders o 
	ON od.order_id=o.order_id
	INNER JOIN customers c
	ON o.c_id=c.c_id
	INNER JOIN products p
	ON od.p_id=p.prod_id 
	INNER JOIN users u
	ON od.u_id=u.u_id");
}
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
<h1>Orders</h1>
<div class="menu-items">
<a href="index.php">Home</a>
<a href="upload_order.php">New Order</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search by Product Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Order ID</th>
<th>Customer Name</th>
<th>Product Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Discount</th>
<th>Total</th>
<th>Date</th>
<th>Payment Type</th>
<th>Username</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['order_id']; ?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['p_name'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['qty'];?></td>
<td><?php echo $row['discount'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['dated'];?></td>
<td><?php echo $row['pay_type'];?></td>
<td><?php echo $row['username'];?></td>
</tr>
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
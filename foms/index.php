<?php 
require "connect.php";
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

?>
<html>
<style>
body{
	margin:0 auto;
	width:100%;
	background-color:#dcdcdc;
	color: #696969;
}
.container{
	width:100%;
}
.header-text{
	height:8%;
}
h1{
	letter-spacing:2px;
	margin:8px;
}
.header-text p{
	letter-spacing:4px;
	margin-top:-8px;
	font-style:italic;
	color:black;
	margin:8px;	
}
a{color:gray;text-decoration:none;}
a:hover{color:#fff;}
.items{
	width=20%;
	background-color:green;
	float:left;
	margin-top:40px;
}
.search-bar{clear:both;}
content{
	width=60%;
	background-color:blue;
	float:left;
	margin-top:40px;
}
.entity{
	border:1px solid gray;
	height:12%;
	width:200px;
	background-color:black;
	float:left;
	text-align:center;
	padding-top:2%;
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
.content{float:left;margin:40px;}
</style>

<head>
	<title>Food Ordering Management System</title>
</head>
<body>
<div class="container">
<br />
<div class="header-text">
<h1>Welcome to Food Ordering Management System</h1>
<p>Our Food Ordering Management System manages following functionalities. Go with any... </p>
</div>
<div class="items">
<a href = "load_products.php"><div class="entity"><h3>Products<h3></div></a><br />
<a href = "load_customers.php"><div class="entity"><h3>Customers<h3></div></a><br />
<a href = "load_suppliers.php"><div class="entity"><h3>Suppliers<h3></div></a><br />
<a href = "load_employees.php"><div class="entity"><h3>Employees<h3></div></a><br />
<a href = "load_orders.php"><div class="entity"><h3>Orders<h3></div></a><br />
<a href = "load_users.php"><div class="entity"><h3>Users<h3></div></a>
</div>

<div class="content">
<div style="float:left;"><h1>Orders Details</h1></div>
<div style="float:left;margin-left:40px;margin-top:12px;font-size:16px;">
<a href ="upload_order.php">Add New Order</a> &nbsp;|&nbsp;
<a href ="upload_supplier.php">Add New Supplier</a>&nbsp;|&nbsp;
<a href ="upload_product.php">Add New Product</a>&nbsp;|&nbsp;
<a href ="upload_employee.php">Add New Employee</a>&nbsp;|&nbsp;
<a href ="upload_customer.php">Add New Customer</a>&nbsp;|&nbsp;
<a href ="upload_userr.php">Add New User</a>
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

</div>
</div>

</body>

<script>
</script>

</html>
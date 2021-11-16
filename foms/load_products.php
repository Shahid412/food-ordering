<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT products.prod_id, 
	products.p_name, 
	products.ppu, 
	products.des, 
	suppliers.sup_name
	FROM products
	INNER JOIN suppliers 
	ON products.sup_id=suppliers.sup_id 
	WHERE products.name LIKE '%$query%'");
	} else {
	$result = mysqli_query($con, "SELECT products.prod_id, 
	products.p_name, 
	products.ppu, 
	products.des, 
	suppliers.sup_name
	FROM products
	INNER JOIN suppliers 
	ON products.sup_id=suppliers.sup_id ");
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
	<title>Products - FOMS</title>
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
<h1>Products</h1>
<div class="menu-items">
<a href="index.php">Home</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search by Product Name ...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Product ID</th>
<th>Name</th>
<th>Price/unit</th>
<th>Description</th>
<th>Supplier</th>
<th>Operations</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['prod_id']; ?></td>
<td><?php echo $row['p_name']; ?></td>
<td><?php echo $row['ppu'];?></td>
<td><?php echo $row['des'];?></td>
<td><?php echo $row['sup_name'];?></td>
<td><a href="delete_product.php?id=<?php echo $row['prod_id'];?>">Remove</a></td>

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
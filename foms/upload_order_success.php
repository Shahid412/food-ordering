<center>
<?php
require_once "connect.php";
if(isset($_POST['submit'])){
	$cname = isset($_POST['cname'])?$_POST['cname']:null;
	$pname = isset($_POST['pname'])?$_POST['pname']:null;
	$uname = isset($_POST['uname'])?$_POST['uname']:null;
	$qty = $_POST['qty'];
	$ptype = isset($_POST['pay_type'])?$_POST['pay_type']:null;
	$date = $_POST['date'];
	
	$customers = mysqli_query($con, "SELECT * FROM customers where name='$cname'");
	$products = mysqli_query($con, "SELECT * FROM products where p_name='$pname'");
	
	$users = mysqli_query($con, "SELECT u_id FROM users where username='$uname'");
	while($row = mysqli_fetch_array($users)){$uid= $row['u_id'];}

	$dis=0;
	
	$customer_row = mysqli_fetch_assoc($customers);
	$c_id=$customer_row['c_id'];
	$c_type=$customer_row['type'];
	
	if($c_type=="W"){$dis=10;}

	$product_row = mysqli_fetch_assoc($products);
	$p_id=$product_row['prod_id'];
	$price=$product_row['ppu']+20;

	$dis=$qty*$dis;
	$total=$price*$qty-$dis;
	
	$orders=mysqli_query($con, "select * from orders");
	while($row = mysqli_fetch_array($orders)){$id= $row['order_id'];}
	$id+=1;
	
	$sql1="insert ignore into orders 
	(order_id, c_id, dated, pay_type) 
	values 
	('$id','$c_id','$date','$ptype')";
	$sql2="insert ignore into order_details
	(order_id, p_id, u_id, price, qty, discount, total) 
	values 
	('$id','$p_id','$uid','$price','$qty','$dis','$total')";
	if (($con -> query($sql1)==TRUE)&&($con -> query($sql2)==TRUE)){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;

}else echo "Please input data!";
?>



<html>
<head>
	<title>Orders - FOMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="upload_order.php">Add</a><br /><br />
<a href="load_orders.php">All Order</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

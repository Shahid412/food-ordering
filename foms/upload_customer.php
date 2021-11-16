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
select{
	margin:20px;
	padding:8px;
	width:40%;
	border-radius:8px;
}
.submit{
	width:8%;
}
</style>


<html>
<head>
	<title>Customers - FOMS</title>
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
<h1>Customers</h1>
<div class="menu-items">
<a href="index.php">Home</a>
</div>
<div class="data-items">
<form method="post" action="upload_customer_success.php">
<input type="text" name="name" placeholder="Customer Name"> <br />
<input type="text" name="address" placeholder="Address"> <br />
<input type="text" name="phone" placeholder="Phone"> <br />
<select name="ctype">
	<option name="W" value="W">Wholesale</option>
	<option name="D" value="D">Direct</option>
</select>
<br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
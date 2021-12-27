<!doctype html>
<html>
<head>
	<title><?php if(isset($title)){ echo $title; }else{ echo 'Schauers Bikes'; } ?></title>
	<meta charset='utf-8'>
	<style>
		.product_info_table, .account_info_table {
			border-collapse: collapse;
			border: 1px solid maroon;
		}
		.product_info_table .header, .product_info_table td, .account_info_table .header, .account_info_table td{
			margin: 0;
			padding: 10px;
			border-spacing: 0px;
		}
		.product_info_table .header, .account_info_table .header{
			border: 2px solid black;
			background: darkgray;
			color: black;
		}
		.product_info_table td, .account_info_table td{
			border: 1px solid black;
			background: darkgray;
			color: black;			
		}
		
		.mainSection{
			width: 80%;
			margin: 0 auto;
			background: gray;
			padding: 10px;
		}
		
		nav.topNavBar{
			width: 75%;
			margin: 0 auto;
			margin-bottom: 1em;
			padding: 5px 0px;
		}

		nav.topNavBar ul {
			list-style: none;
		}

		nav.topNavBar:after {
			content: "";
			display: block;
			clear: both;
		}
		
		nav.topNavBar>ul>li {
			float: left;
			position: relative;
		}

		nav.topNavBar ul li a{
			background: gray;
			color: black;
			text-decoration: none;
			padding: 5px 10px;
			white-space: nowrap;
		}

		nav.topNavBar ul li:hover>a{
			color: gray;
			background: black;
		}	
	</style>
</head>
<body>
<section class='mainSection'>
	<nav class='topNavBar'>
		<ul class='left_main_ul'>
			<li>
				<?php
				if(isset($_SESSION['bike_customers_id']) && isset($_SESSION['full_name'])){
					echo "Welcome {$_SESSION['full_name']} <a href='logout.php'>Logout</a>";
				}else{
					echo "<a href='login.php'>login</a>";
				}
				?>
			</li>
			<li><a href='account_info.php'>My Account</a></li>
			<li><a href='order.php'>Order</a></li>
			<li><a href='registration.php'>Register</a></li>
			<li><a href='view_current_orders.php'>Pending Orders</a></li>
			<li><a href='view_previous_orders.php'>Past Orders</a></li>
			<li><a href='view_products.php'>Available Products</a></li>
		</ul>
	</nav>
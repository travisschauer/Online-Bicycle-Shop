<?php
session_start();
$title = 'Pending Orders';
require('../../../secure_files/mysql.inc.php');
$errors_array = array();
require('./includes/functions.inc.php');
if(isset($_SESSION['bike_customers_id']) && isset($_SESSION['full_name'])){
	$bike_customers_id = $_SESSION['bike_customers_id'];
	if(isset($_GET['bike_orders_id'])){
		$bike_orders_id = $_GET['bike_orders_id'];
		require('./includes/cancel_orders.inc.php');
	}else{
		include('./includes/header.inc.php');
		require('./includes/view_current_orders.inc.php');
	}
	include('./includes/footer.inc.php');
}else{
	redirect('You must login', 'login.php', 1);
}
?>
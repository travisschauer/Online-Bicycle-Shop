<?php
session_start();
$title = 'Prior Orders';
require('../../../secure_files/mysql.inc.php');
$errors_array = array();
require('./includes/functions.inc.php');
if(isset($_SESSION['bike_customers_id']) && isset($_SESSION['full_name'])){
	$bike_customers_id = $_SESSION['bike_customers_id'];
	include('./includes/header.inc.php');
	require('./includes/view_previous_orders.inc.php');
	include('./includes/footer.inc.php');
}else{
	redirect('You must login', 'login.php', 1);
}
?>
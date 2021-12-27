<?php
session_start();
$title = 'Logout';
require('../../../secure_files/mysql.inc.php');
$errors_array = array();
require('./includes/functions.inc.php');

if(isset($_SESSION['bike_customers_id']) && isset($_SESSION['full_name'])){
	//setcookie('bike_customers_id', '', time()-5, '/', '', 0, 1);
	//setcookie('full_name', '', time()-5, '/', '', 0, 1);
	unset($_SESSION['bike_customers_id']);
	unset($_SESSION['full_name']);
	$_SESSION = array();
	session_destroy();
	setcookie('PHPSESSID', '', time()-5, '/', '', 0, 0);
	redirect('You are now logged out', 'login.php', 1);
}else{
	redirect('You are already logged out', 'login.php', 1);
}
?>
<?php
DEFINE('HOST', 'localhost');
DEFINE('USER', 'tschauer');
DEFINE('PASS', 'FuelEX19!');
DEFINE('DB', 'tschauer_bikes_2');

$link = @mysqli_connect(HOST, USER, PASS, DB) or die('The following error occurred: '.mysqli_connect_error());
mysqli_set_charset($link, 'utf8');
?>
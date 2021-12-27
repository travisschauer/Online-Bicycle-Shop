<?php
$toggle = isset($_GET['toggle'])?$_GET['toggle']:TRUE;
$order_by = isset($_GET['order_by'])?$_GET['order_by']:'drivetrain';
$asc_desc = ($toggle)?'ASC':'DESC';

$select_previous_orders = "SELECT bike_orders_bikes.bike_orders_id, CONCAT_WS(' ',bike_shipping_addresses.address_1, bike_shipping_addresses.address_2, bike_shipping_addresses.city, state, bike_shipping_addresses.zip) as 'Shipping Address', CONCAT_WS(' ',bike_billing_addresses.address_1, bike_billing_addresses.address_2, bike_billing_addresses.city, state, bike_billing_addresses.zip) as 'Billing Address', GROUP_CONCAT(drivetrain SEPARATOR '<br><hr>') as drivetrain, GROUP_CONCAT(size SEPARATOR '<br><hr>') as size, GROUP_CONCAT(frameset SEPARATOR '<br><hr>') as frameset, GROUP_CONCAT(tire SEPARATOR '<br><hr>') as tire, GROUP_CONCAT(wheel SEPARATOR '<br><hr>') as wheel, GROUP_CONCAT(bike_orders_bikes.quantity SEPARATOR '<br><hr>') as quantity, GROUP_CONCAT(bike_orders_bikes.price SEPARATOR '<br><hr>') as price, credit_no, credit_type, order_total, shipping_fee, order_date, shipping_date
	FROM bike_customers
	INNER JOIN bike_states USING (bike_states_id)
	INNER JOIN bike_orders USING (bike_customers_id)
	INNER JOIN bike_shipping_addresses USING (bike_shipping_addresses_id)
	INNER JOIN bike_billing_addresses USING (bike_billing_addresses_id)
	INNER JOIN bike_orders_bikes USING (bike_orders_id)
	INNER JOIN bikes USING (bikes_id)
	INNER JOIN bike_drivetrains USING (bike_drivetrains_id)
	INNER JOIN bike_sizes USING (bike_sizes_id)
	INNER JOIN bike_framesets USING (bike_framesets_id)
	INNER JOIN bike_tires USING (bike_tires_id)
	INNER JOIN bike_wheels USING (bike_wheels_id)
	WHERE bike_customers_id = $bike_customers_id
	GROUP BY bike_orders_bikes.bike_orders_id
	ORDER BY $order_by $asc_desc";

$exec_select_previous_orders = @mysqli_query($link, $select_previous_orders);
if(!$exec_select_previous_orders){
	rollback('Previous orders could not be retrieved because '.mysqli_error($link));
}elseif(mysqli_num_rows($exec_select_previous_orders) > 0){
	echo "<table class='product_info_table'>
		<tr class='header'>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=bike_shipping_addresses.address_1&toggle=".!$toggle."'>Shipping Address</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=bike_billing_addresses.address_1&toggle=".!$toggle."'>Billing Address</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=drivetrain&toggle=".!$toggle."'>drivetrain</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=size&toggle=".!$toggle."'>Size</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=frameset&toggle=".!$toggle."'>frameset</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=tire&toggle=".!$toggle."'>Tire</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=wheel&toggle=".!$toggle."'>Wheel</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=bike_orders_bikes.quantity&toggle=".!$toggle."'>Quantity</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=bike_orders_bikes.price&toggle=".!$toggle."'>Price</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=credit_no&toggle=".!$toggle."'>Credit No</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=credit_type&toggle=".!$toggle."'>Credit Type</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=order_total&toggle=".!$toggle."'>Order Total</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=shipping_fee&toggle=".!$toggle."'>Shipping Fee</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=order_date&toggle=".!$toggle."'>Order Date</a></th>
			<th><a href='".$_SERVER['PHP_SELF']."?order_by=shipping_date&toggle=".!$toggle."'>Shipping Date</a></th>
		</tr>";
	while($one_record = mysqli_fetch_assoc($exec_select_previous_orders)){
		echo "<tr>
			<td>{$one_record['Shipping Address']}</td>
			<td>{$one_record['Billing Address']}</td>
			<td>{$one_record['drivetrain']}</td>
			<td>{$one_record['size']}</td>
			<td>{$one_record['frameset']}</td>
			<td>{$one_record['tire']}</td>
			<td>{$one_record['wheel']}</td>
			<td>{$one_record['quantity']}</td>
			<td>\${$one_record['price']}</td>
			<td>{$one_record['credit_no']}</td>
			<td>{$one_record['credit_type']}</td>
			<td>\${$one_record['order_total']}</td>
			<td>\${$one_record['shipping_fee']}</td>
			<td>{$one_record['order_date']}</td>
			<td>{$one_record['shipping_date']}</td>
		</tr>";
	}
	echo "<tr><td colspan='14'>Number of Prior Orders:</td><td>".mysqli_num_rows($exec_select_previous_orders)."</td></tr></table>";
	mysqli_free_result($exec_select_previous_orders);
}else{
	echo "No Prior Orders to Show";
}
?>
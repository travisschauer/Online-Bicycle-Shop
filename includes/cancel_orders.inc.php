<?php
mysqli_query($link, "SET AUTOCOMMIT = 0");
$select_bikes = "SELECT bikes_id, quantity from bike_orders_bikes WHERE bike_orders_id = $bike_orders_id";
$exec_select_bikes = @mysqli_query($link, $select_bikes);
if(!$exec_select_bikes){
	rollback('Ordered bikes could not be retrieved because '.mysqli_error($link));
}else{
	while($one_record = mysqli_fetch_assoc($exec_select_bikes)){
		$quantity = $one_record['quantity'];
		$bikes_id = $one_record['bikes_id'];
		$update_bikes = "UPDATE bikes set stock_quantity = (stock_quantity+$quantity) WHERE bikes_id = $bikes_id";
		$exec_update_bikes = @mysqli_query($link, $update_bikes);
		if(!$exec_select_bikes){
			rollback('Update was not successful because '.mysqli_error($link));
		}
	}
	$delete_order = "DELETE bike_shipping_addresses.*, bike_billing_addresses.*, bike_transactions.* FROM bike_orders 
	INNER JOIN bike_billing_addresses USING (bike_billing_addresses_id)
	INNER JOIN bike_shipping_addresses USING (bike_shipping_addresses_id)
	INNER JOIN bike_transactions USING (bike_transactions_id)
	WHERE bike_orders_id = $bike_orders_id";
	$exec_delete_order = @mysqli_query($link, $delete_order);
	if(!$exec_delete_order){
		rollback('Delete was not successful because '.mysqli_error($link));
	}else{
		mysqli_query($link, "COMMIT");
		redirect('successfully deleted...', 'view_current_orders.php', 1);
	}	
}
?>
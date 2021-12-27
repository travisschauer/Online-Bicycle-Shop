<fieldset><legend>Framesets</legend>
	<?php
	$toggle = isset($_GET['toggle'])?$_GET['toggle']:TRUE;
	$order_by = isset($_GET['order_by'])?$_GET['order_by']:'frameset';
	$asc_desc = ($toggle)?'ASC':'DESC';

	$select_producst = "SELECT bike_framesets_id, frameset, description, price
		FROM bike_framesets
		ORDER BY $order_by $asc_desc";

	$exec_select_producst = @mysqli_query($link, $select_producst);
	if(!$exec_select_producst){
		rollback('Product info could not be retrieved because '.mysqli_error($link));
	}elseif(mysqli_num_rows($exec_select_producst) > 0){
		echo "<table class='product_info_table'>
			<tr class='header'>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=frameset&toggle=".!$toggle."'>frameset</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=description&toggle=".!$toggle."'>Description</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=price&toggle=".!$toggle."'>price</a></th>
			</tr>";
		while($one_record = mysqli_fetch_assoc($exec_select_producst)){
			$bike_framesets_id = $one_record['bike_framesets_id'];
			$price = $one_record['price'];
			$max = $one_record['stock_quantity'];
			echo "<tr>
				<td>{$one_record['frameset']}</td>
				<td>{$one_record['description']}</td>
				<td>{$one_record['price']}</td>
				</tr>";
		}
		echo "</table>";
		mysqli_free_result($exec_select_producst);
	}else{
		echo "No Product to Show";
	}
	?>
	</fieldset>	

	<fieldset><legend>Drivetrains</legend>
	<?php
	$toggle = isset($_GET['toggle'])?$_GET['toggle']:TRUE;
	$order_by = isset($_GET['order_by'])?$_GET['order_by']:'drivetrain';
	$asc_desc = ($toggle)?'ASC':'DESC';

	$select_producst = "SELECT bike_drivetrains_id, drivetrain, description, price
		FROM bike_drivetrains
		ORDER BY $order_by $asc_desc";

	$exec_select_producst = @mysqli_query($link, $select_producst);
	if(!$exec_select_producst){
		rollback('Product info could not be retrieved because '.mysqli_error($link));
	}elseif(mysqli_num_rows($exec_select_producst) > 0){
		echo "<table class='product_info_table'>
			<tr class='header'>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=drivetrain&toggle=".!$toggle."'>drivetrain</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=description&toggle=".!$toggle."'>Description</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=price&toggle=".!$toggle."'>price</a></th>
			</tr>";
		while($one_record = mysqli_fetch_assoc($exec_select_producst)){
			$bike_drivetrains_id = $one_record['bike_drivetrains_id'];
			$price = $one_record['price'];
			$max = $one_record['stock_quantity'];
			echo "<tr>
				<td>{$one_record['drivetrain']}</td>
				<td>{$one_record['description']}</td>
				<td>{$one_record['price']}</td>
				</tr>";
		}
		echo "</table>";
		mysqli_free_result($exec_select_producst);
	}else{
		echo "No Product to Show";
	}
	?>
	</fieldset>	

	<fieldset><legend>Wheels</legend>
	<?php
	$toggle = isset($_GET['toggle'])?$_GET['toggle']:TRUE;
	$order_by = isset($_GET['order_by'])?$_GET['order_by']:'wheel';
	$asc_desc = ($toggle)?'ASC':'DESC';

	$select_producst = "SELECT bike_wheels_id, wheel, description, price
		FROM bike_wheels
		ORDER BY $order_by $asc_desc";

	$exec_select_producst = @mysqli_query($link, $select_producst);
	if(!$exec_select_producst){
		rollback('Product info could not be retrieved because '.mysqli_error($link));
	}elseif(mysqli_num_rows($exec_select_producst) > 0){
		echo "<table class='product_info_table'>
			<tr class='header'>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=wheel&toggle=".!$toggle."'>wheel</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=description&toggle=".!$toggle."'>Description</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=price&toggle=".!$toggle."'>price</a></th>
			</tr>";
		while($one_record = mysqli_fetch_assoc($exec_select_producst)){
			$bike_wheels_id = $one_record['bike_wheels_id'];
			$price = $one_record['price'];
			$max = $one_record['stock_quantity'];
			echo "<tr>
				<td>{$one_record['wheel']}</td>
				<td>{$one_record['description']}</td>
				<td>{$one_record['price']}</td>
				</tr>";
		}
		echo "</table>";
		mysqli_free_result($exec_select_producst);
	}else{
		echo "No Product to Show";
	}
	?>
	</fieldset>	
	
	<fieldset><legend>Tires</legend>
	<?php
	$toggle = isset($_GET['toggle'])?$_GET['toggle']:TRUE;
	$order_by = isset($_GET['order_by'])?$_GET['order_by']:'tire';
	$asc_desc = ($toggle)?'ASC':'DESC';

	$select_producst = "SELECT bike_tires_id, tire, price
		FROM bike_tires
		ORDER BY $order_by $asc_desc";

	$exec_select_producst = @mysqli_query($link, $select_producst);
	if(!$exec_select_producst){
		rollback('Product info could not be retrieved because '.mysqli_error($link));
	}elseif(mysqli_num_rows($exec_select_producst) > 0){
		echo "<table class='product_info_table'>
			<tr class='header'>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=tire&toggle=".!$toggle."'>tire</a></th>
				<th><a href='".$_SERVER['PHP_SELF']."?order_by=price&toggle=".!$toggle."'>price</a></th>
			</tr>";
		while($one_record = mysqli_fetch_assoc($exec_select_producst)){
			$bike_tires_id = $one_record['bike_tires_id'];
			$price = $one_record['price'];
			$max = $one_record['stock_quantity'];
			echo "<tr>
				<td>{$one_record['tire']}</td>
				<td>{$one_record['price']}</td>
				</tr>";
		}
		echo "</table>";
		mysqli_free_result($exec_select_producst);
	}else{
		echo "No Product to Show";
	}
	?>
	</fieldset>	

<?php 

	header("Content-Type: application/json");


	include "../include/db_connect.php";

	$query = "SELECT temperature, heart_rate, respiration FROM baby_table";

	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "QUERY FAILED";
	}

	$data = array();

	foreach ($result as $row) {
		
		$data[] = $row;

	}

	mysqli_close($conn);

	print json_encode($data);






 ?>
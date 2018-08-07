<?php

	include_once "../../koneksi.php";

	class usr{}

	$id_barang = $_GET['id_barang'];

	$query = mysqli_query($con, "SELECT * FROM `tb_barang` WHERE `id_barang`='$id_barang'");
	while($row = mysqli_fetch_assoc($query)) {
		$db_code = $row['status'];
	} if($db_code) {
		mysqli_query($con, " UPDATE tb_barang SET status = 'True' WHERE id_barang = '$id_barang'");
		$response = new usr();
		$response->success = 1;
		$response->message = "Scan QR Code Success";
		die(json_encode($response));
	} else {
		$response = new usr();
		$response->success = 0;
		$response->message = "Scan QR Code Failed";
		die(json_encode($response));
	}

?>
<?php

	include_once "../../koneksi.php";
	
	class usr{}
	$id = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
    $lebar = $_POST['lebar'];
    $panjang = $_POST['panjang'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $tujuan = $_POST['tujuan'];
    $qty = $_POST['qty'];
    $stock = $_POST['stock'];

	
	if ((empty($qty))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Jumlah barang tidak boleh kosong";
	 	die(json_encode($response));
	 } else {
		
		$query = mysqli_query($con, " UPDATE tb_barang SET nama_barang = '$nama_barang',lebar = '$lebar',panjang = '$panjang',tinggi = '$tinggi',berat = '$berat',harga = '$harga',tujuan = '$tujuan',qty = '$qty',stock = '$stock' WHERE id_barang = '$id'");
	
		if ($query){
			$response = new usr();
			$response->success = 1;
			$response->message = "Update berhasil";
			die(json_encode($response));
		} else{ 
			$response = new usr();
			$response->success = 0;
			$response->message = "Update gagal";
			die(json_encode($response)); 
		}
	
	}	

	mysqli_close($con);
	
?>	
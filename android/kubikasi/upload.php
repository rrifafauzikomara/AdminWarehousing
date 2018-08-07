<?php

	include_once "../../koneksi.php";
	
	class usr{}
	
	$id = $_POST['id_user'];
	$foto = $_POST['foto'];
	$nama = $_POST['nama'];
	$email = $_POST["email"];

	
	if ((empty($nama))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Nama tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($email))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Email tidak boleh kosong";
	 	die(json_encode($response));
	 } else {

		$random = random_word(20);
		$path = "image/".$random.".png";
		
		// untuk menyimpan lokasi gambar yang telah di upload
		$actualpath = "http://gudangku.pe.hu/android/kubikasi/$path";
		
		$query = mysqli_query($con, " UPDATE tb_regis SET nama = '$nama', email = '$email', foto = '$actualpath' WHERE id_user = '$id'");
	
		if ($query){
			file_put_contents($path,base64_decode($foto));
			$response = new usr();
			$response->success = 1;
			$response->message = "Upload berhasil";
			die(json_encode($response));
		} else{ 
			$response = new usr();
			$response->success = 0;
			$response->message = "Upload gagal";
			die(json_encode($response)); 
		}
	
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	
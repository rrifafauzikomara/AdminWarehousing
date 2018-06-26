<?php

	include_once "../koneksi.php";

	class usr{}
	
	$email = mysqli_real_escape_string($con, @$_POST['email']);
	$password = mysqli_real_escape_string($con, @$_POST['password']);
	
	if ((empty($email)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM tb_regis WHERE email='$email' AND password='$password'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->id_user = $row['id_user'];
		$response->email = $row['email'];
		$response->message = "Selamat datang ".$row['nama'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysqli_close($con);

?>
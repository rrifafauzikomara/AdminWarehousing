<?php

	 include_once "../koneksi.php";

	 class usr{}

	 $nama = $_POST["nama"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $confirm_password = $_POST["confirm_password"];
	 $level = $_POST["level"];

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
	 } else if ((empty($password))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom password tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($confirm_password)) || $password != $confirm_password) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Konfirmasi password tidak sama";
	 	die(json_encode($response));
	 } else if ((empty($level))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Silahkan tentukan level anda";
	 } else {
		 if (!empty($email) && $password == $confirm_password){
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_regis WHERE email='".$email."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO tb_regis (id_user, nama, email, password, foto, level) VALUES(0, '".$nama."', '".$email."', '".$password."','http://192.168.100.69/pergudangan/android/','".$level."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan login.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Register gagal";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "Username sudah ada";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($con);

?>
<?php 
	$id_user = $_GET['id_user'];
	
	require_once('../../koneksi.php');
	
	$sql = "SELECT * FROM tb_regis WHERE id_user=$id_user";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"id_user"=>$row['id_user'],
			"nama"=>$row['nama'],
			"email"=>$row['email'],
			"foto"=>$row['foto']
		));

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
	
?>
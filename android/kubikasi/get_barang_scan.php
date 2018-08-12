<?php 

	include_once "../../koneksi.php";
	
	$query = "SELECT * FROM tb_barang WHERE status='True'";
	$result = mysqli_query($con,$query);
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($result))
	{
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>
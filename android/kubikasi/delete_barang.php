<?php 

	include_once "../../koneksi.php";

	$id_barang = $_POST['id_barang']; 

	$getdata = mysqli_query($con,"SELECT * FROM tb_barang WHERE id_barang ='$id_barang'");
	$rows = mysqli_num_rows($getdata);

	$delete = "DELETE FROM tb_barang WHERE id_barang ='$id_barang'";
	$exedelete = mysqli_query($con, $delete);

	$respose = array();

	if($rows > 0)
	{
		if($exedelete)
		{
			$respose['code'] =1;
			$respose['message'] = "Delete berhasil";
		}
		else
		{
		$respose['code'] =0;
		$respose['message'] = "Delete gagal";
		}
	}
	else
	{
		$respose['code'] =0;
		$respose['message'] = "Delete gagal, data tidak ditemukan";
	}
	


	echo json_encode($respose);

 ?>
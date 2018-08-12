<link rel="shortcut icon"  href="../images/logo.jpg"/>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";  
  disp_setting+="scrollbars=yes,width=1300, height=540, left=30, top=50"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Auto 2000</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 1200px; font-size:50px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body><table width="1350" border="2" cellpadding="4" cellspacing="5 " bgcolor="#FFFFFF"></table></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<center><a href="javascript:Clickheretoprint()">Print/Cetak QR Code</a><a href="home.php"><center>Home</a></center><br><br>
<div id="print_content" style="width:1350;">
	<!-- <img src="../images/primajasa.jpg"> -->
<table width="1350" border="2" cellpadding="4" cellspacing="5 " bgcolor="#FFFFFF"></table>
<strong><font color="#000000" size="5">Silahkan Print/Cetak QR Code Anda</font></strong><br>
<table width="1350" border="2" cellpadding="4" cellspacing="5 " bgcolor="#FFFFFF"></table>
<strong><font color="#000000" size="5">Rincian Data Barang Anda</font></strong><br>
<table width="1350" border="2" cellpadding="4" cellspacing="5 " bgcolor="#FFFFFF"><br>

<tr>
  <th><div align="center">Id Barang</div></th>
  <th><div align="center">Nama Barang</div></th>
  <th><div align="center">Lebar</div></th>
  <th><div align="center">Panjang</div></th>
  <th><div align="center">Tinggi</div></th>
  <th><div align="center">Berat</div></th>
  <th><div align="center">Harga</div></th>
  <th><div align="center">Tanggal</div></th>
  <th><div align="center">Tujuan</div></th>
  <th><div align="center">Qty</div></th>
  <th><div align="center">Total</div></th>
  <th><div align="center">QR Code</div></th>
</tr>

<?php
include('koneksi.php');
$id=$_GET['id'];

$result = "SELECT * FROM tb_barang WHERE id_barang='$id'" or die(mysqli_error());
$print = mysqli_query($con, $result);
while($data = mysqli_fetch_array($print))
	{
		$id_barang=$data['id_barang'];
    $nama_barang = $data['nama_barang'];
    $lebar = $data['lebar'];
    $panjang = $data['panjang'];
    $tinggi = $data['tinggi'];
    $berat = $data['berat'];
    $harga = $data['harga'];
    $tgl = $data['tgl_masuk'];
    $tujuan = $data['tujuan'];
    $qty = $data['qty'];
    $total = $data['harga'] * $data['qty'];
    $status = $data['status'];
	}

?>

<tr>
  <td><div align="center"><?php echo $id_barang; ?></div></td>
  <td><div align="center"><?php echo $nama_barang; ?></div></td>
  <td><div align="center"><?php echo $lebar; ?></div></td>
  <td><div align="center"><?php echo $panjang; ?></div></td>
  <td><div align="center"><?php echo $tinggi; ?></div></td>
  <td><div align="center"><?php echo $berat; ?></div></td>
  <td><div align="center"><?php echo $harga; ?></div></td>
  <td><div align="center"><?php echo $tgl; ?></div></td>
  <td><div align="center"><?php echo $tujuan; ?></div></td>
  <td><div align="center"><?php echo $qty; ?></div></td>
  <td><div align="center"><?php echo $total; ?></div></td>
  <td><div align="center"><?php echo "<img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=$id_barang&choe=UTF-8' title='Link to Google.com' />"; ?></div></td>
</tr>

</table>
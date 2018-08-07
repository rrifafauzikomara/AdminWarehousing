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
<table width="1350" border="2" cellpadding="4" cellspacing="5 " bgcolor="#FFFFFF"></table><br>

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
    $stock = $data['stock'];
	}
    echo '<font color=#"000000" size="3">Nomor Barang : '.$id_barang.'<br><br>';
    echo 'Nama Barang : '.$nama_barang.'<br><br>';
    echo 'Lebar : '.$lebar.'<br><br>';
    echo 'Panjang : '.$panjang.'<br><br>';
    echo 'Tinggi : '.$tinggi.'<br><br>';
	  echo 'Berat : '.$berat.'<br><br>';
    echo 'Harga : '.$harga.'<br><br>';
    echo 'Tanggal : '.$tgl.'<br><br>';
    echo 'Tujuan : '.$tujuan.'<br><br>';
    echo 'Qty : '.$qty.'<br><br>';
    echo 'Total : '.$total.'<br><br>';
    echo 'Stock : '.$stock.'<br><br>';
    echo '<center><div style="height: 30%; width: 50%;">';
    echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=Nomor Barang : $id_barang, Nama Barang : $nama_barang, Lebar : $lebar, Panjang : $panjang, Tinggi : $tinggi, Berat : $berat, Harga : $harga, Tanggal : $tgl, Tujuan : $tujuan, Qty : $qty, Total : $total, Stock : $stock&choe=UTF-8' title='Link to Google.com' />";
   
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Pergudangan</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="home.php" class="simple-text">
                    Pergudangan
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="home.php">
                        <i class="pe-7s-plus"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <li>
                    <a href="table.php">
                        <i class="pe-7s-search"></i>
                        <p>Search Barang</p>
                    </a>
                </li>
                <li class="active">
                    <a href="list.php">
                        <i class="pe-7s-note2"></i>
                        <p>List Barang</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Tambah Barang</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Data Barang</h4>
                                <hr>
                            </div>
                            <fieldset>

                            	<?php
			                       include "koneksi.php";
			                        $id_barang = @$_POST['id_barang'];
			                        $nama_barang = @$_POST['nama_barang'];
			                        $lebar = @$_POST['lebar'];
			                        $panjang = @$_POST['panjang'];
			                        $tinggi = @$_POST['tinggi'];
			                        $berat = @$_POST['berat'];
			                        $harga = @$_POST['harga'];
			                        $tujuan = @$_POST['tujuan'];
			                        $stock = @$_POST['stock'];

                        			$tambah = @$_POST['edit'];

			                        if ($tambah) {
			                            if ($id_barang == "" || $nama_barang == "" || $lebar == "" || $panjang == "" || $tinggi == "" || $berat == "" || $harga == "" || $tujuan == "" || $stock == "") {
			                                    ?> <script type="text/javascript">alert("Inputan tidak boleh kosong !!");</script> <?php
			                            } else {
			                                $sql_tambah = "update tb_barang set nama_barang='$nama_barang', lebar='$lebar', panjang='$panjang', tinggi='$tinggi', berat='$berat', harga='$harga', tujuan='$tujuan', stock='$stock' where id_barang='$id_barang'" or die (mysqli_error());
			                                $register = mysqli_query($con, $sql_tambah);
			                                
			                                echo "<script type=text/javascript>
						                                window.location.href='http://localhost/pergudangan/list.php';
						                                </script>";
			                            }
			                        }
                                     
                                     $sql = "select * from tb_barang where id_barang ='$_GET[id]'" or die (mysqli_error());
                                     $update = mysqli_query($con, $sql);
                                     $data=mysqli_fetch_array($update);
                                     ?>

                                    <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                                        <div class="item form-group">
                                        	<input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_barang">Nama Barang <span class="required"></span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" id="nama_barang" name="nama_barang" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Lengkap" value="<?php echo $data['nama_barang']; ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lebar">Lebar <span class="required"></span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="lebar" min="1" type="number" value="<?php echo $data['lebar']; ?>" name="lebar"  data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="Masukan Alamat Lengkap">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang"> Panjang<span class="required"></span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="panjang" min="1" type="number" value="<?php echo $data['panjang']; ?>" name="panjang" data-validate-length-range="10,12" class="optional form-control col-md-7 col-xs-12" maxlength="12" placeholder="Masukan No Hp atau Tlp">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinggi">Tinggi <span class="required"></span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="tinggi" min="1" value="<?php echo $data['tinggi']; ?>" type="number" name="tinggi"  data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="Masukan Email">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berat">Berat <span class="required"></span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="berat" min="1" value="<?php echo $data['berat']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="4" data-validate-number="4" name="berat" placeholder="Masukan Username" required="required" type="number">
                                            </div>
                                        </div>
                                       <div class="item form-group">
                                            <label for="harga" class="control-label col-md-3">Harga</label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="harga" min="1" value="<?php echo $data['harga']; ?>" type="number" name="harga"  data-validate-length="0" class="form-control col-md-7 col-xs-12" placeholder="Masukan Password" required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                        <label for="tujuan" class="control-label col-md-3">Tujuan</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="form-control" name='tujuan' value="<?php echo $data['tujuan']; ?>" requered="requered">
                                                    <option>Paster</option>
                                                    <option>Cimahi</option>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="item form-group">
                                        <label for="stock" class="control-label col-md-3">Stock</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="form-control" name='stock' value="<?php echo $data['stock']; ?>" requered="requered">
                                                    <option>Ada</option>
                                                    <option>Kosong</option>
                                        </select>
                                        </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                                <input type="reset" value="Cancel" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                            </fieldset>
                        </div>
                    </div>
                </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a>Pergudangan</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
</html>
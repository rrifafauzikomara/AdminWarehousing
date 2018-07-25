<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Auto 2000</title>

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

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    Auto 2000
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
                    <a class="navbar-brand">List Barang</a>
                </div>
                <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                	<?php
                        $id_barang = @$_POST['id_barang'];
                        $nama_barang = @$_POST['nama_barang'];
                        $lebar = @$_POST['lebar'];
                        $panjang = @$_POST['panjang'];
                        $tinggi = @$_POST['tinggi'];
                        $berat = @$_POST['berat'];
                        $harga = @$_POST['harga'];
                        $tujuan = @$_POST['tujuan'];
                        
                        $id_barang = @$_GET['id_barang'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($id_barang<>"")){
                             $sql_delete = "delete from tb_barang where id_barang='$id_barang'" or die (mysqli_error());
                             $delete = mysqli_query($con, $sql_delete);
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/pergudangan/list.php';
                                </script>" ;
                        }
                        ?>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Barang</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><div align="center">No Barang</div></th>
                                    	<th><div align="center">Nama Barang</div></th>
                                    	<th><div align="center">Lebar</div></th>
                                    	<th><div align="center">Panjang</div></th>
                                    	<th><div align="center">Tinggi</div></th>
                                        <th><div align="center">Berat</div></th>
                                        <th><div align="center">Harga</div></th>
                                        <th><div align="center">Tujuan</div></th>
                                        <th><div align="center">Stock</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </thead>
                                    <tbody>

                                        <?php
			                            $sql = "select * from tb_barang" or die (mysql_error());
			                            $barang = mysqli_query($con, $sql);
			                            while($data = mysqli_fetch_array($barang)) {        
			                            ?>

                                        <tr>
                                            <td><div align="center"><?php echo $data['id_barang']; ?></div></td>
                                            <td><div align="center"><?php echo $data['nama_barang']; ?></div></td>
                                            <td><div align="center"><?php echo $data['lebar']; ?></div></td>
                                            <td><div align="center"><?php echo $data['panjang']; ?></div></td>
                                            <td><div align="center"><?php echo $data['tinggi']; ?></div></td>
                                            <td><div align="center"><?php echo $data['berat']; ?></div></td>
                                            <td><div align="center"><?php echo $data['harga']; ?></div></td>
                                            <td><div align="center"><?php echo $data['tujuan']; ?></div></td>
                                            <td><div align="center"><?php echo $data['stock']; ?></div></td>
                                            <td align="center"><a  href="editlist.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-xs btn-default" title="Edit" >
                                        <i class="fa fa-edit fa-fw"></i>
                                    </a>
                                    <a onclick="return confirm('Anda yakin akan menghapus');" href="list.php?id_barang=<?php echo $data['id_barang']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus">
                                        <i class="fa fa-times fa-fw"></i>
                                        </a>
                                        </td>
                                        </tr>
                                        <?php
			                            }
			                            ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-left">
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

<?php
@session_start();
include "koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['user']) {
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

    <script src="js1/jquery.min.js" type="text/javascript"></script>
    <script src="js1/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
        var chart1; // globally available
    $(document).ready(function() {
          chart1 = new Highcharts.Chart({
             chart: {
                renderTo: 'container',
                type: 'column'
             },   
             title: {
                text: 'Grafik Jumlah Barang '
             },
             xAxis: {
                categories: ['Nama Barang']
             },
             yAxis: {
                title: {
                   text: 'Jumlah Barang'
                }
             },
                  series:             
                [
            <?php
               $sql   = "SELECT nama_barang  FROM tb_barang";
                $query = mysqli_query($con, $sql)  or die(mysqli_error());
                while( $ret = mysqli_fetch_array( $query ) ){
                    $nama_barang=$ret['nama_barang'];                     
                     $sql_jumlah   = "SELECT qty FROM tb_barang WHERE nama_barang='$nama_barang'";        
                     $query_jumlah = mysqli_query($con, $sql_jumlah) or die(mysql_error());
                     while( $data = mysqli_fetch_array( $query_jumlah ) ){
                        $qty = $data['qty'];                 
                      }             
                      ?>
                      {
                          name: '<?php echo $nama_barang; ?>',
                          data: [<?php echo $qty; ?>]
                      },
                      <?php } ?>
                ]
          });
       });  
    </script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="home.php" class="simple-text">
                    <img src="images/logoHeader.png" width="200px" height="40px"/>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="barang.php">
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
                <li>
                    <a href="list.php">
                        <i class="pe-7s-note2"></i>
                        <p>List Barang</p>
                    </a>
                </li>
                <li>
                    <a href="barangScan.php">
                        <i class="pe-7s-note2"></i>
                        <p>Barang Hasil Scan</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Home</a>
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
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="jumbotron">
                                        <h1>Selamat datang!</h1>
                                        <p>Di Perusahaan Auto 2000</p>
                                    </div>

                                    <div id='container'></div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Nama Barang</h3>
                                            </div>
                                            <div class="panel-body">
                                                <ol>
                                                    <?php
                                                        $sql = "SELECT * FROM tb_barang ORDER BY id_barang ASC" or die(mysqli_error());
                                                        $print = mysqli_query($con, $sql);
                                                        while($data = mysqli_fetch_array($print)) {
                                                            $nama_barang = $data['nama_barang'];
                                                    ?>
                                                    <li><a href="hasil.php?nama_barang=<?php echo $data['nama_barang'] ?>"><?php echo $data['nama_barang'] ?></a></li>
                                                </ol>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">User Packer</h3>
                                            </div>
                                            <div class="panel-body">
                                                <ol>
                                                    <?php
                                                        $result = "SELECT * FROM tb_regis WHERE level='Packer'" or die(mysqli_error());
                                                        $print = mysqli_query($con, $result);
                                                        while($data = mysqli_fetch_array($print)){
                                                            $nama = $data['nama'];
                                                    ?>
                                                    <li><?php echo $data['nama'] ?></li>
                                                </ol>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">User Kubikasi</h3>
                                            </div>
                                            <div class="panel-body">
                                                <ol>
                                                    <?php
                                                        $result = "SELECT * FROM tb_regis WHERE level='Kubikasi'" or die(mysqli_error());
                                                        $print = mysqli_query($con, $result);
                                                        while($data = mysqli_fetch_array($print)){
                                                            $nama = $data['nama'];
                                                    ?>
                                                    <li><?php echo $data['nama'] ?></li>
                                                </ol>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- query here -->

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><div align="center">No Barang</div></th>
                                        <th><div align="center">Nama Barang</div></th>
                                        <th><div align="center">Lebar</div></th>
                                        <th><div align="center">Panjang</div></th>
                                        <th><div align="center">Tinggi</div></th>
                                        <th><div align="center">Volume Barang</div></th>
                                        <th><div align="center">Volume Truck</div></th>
                                        <th><div align="center">Sisa Volume Truck</div></th>
                                        <th><div align="center">Persentase Volume Truck</div></th>
                                        <!-- <th><div align="center">Aksi</div></th> -->
                                    </thead>
                                    <tbody>

                                        <?php

                                        error_reporting(0);
                                            include('koneksi.php');
                                            $id=$_POST['id_barang'];
                                            $truck = 4 * 3 * 3;
                                            $result = "SELECT * FROM tb_barang" or die(mysqli_error());
                                            $print = mysqli_query($con, $result);
                                            while($data = mysqli_fetch_array($print)){
                                            $id_barang=$data['id_barang'];
                                            $nama_barang = $data['nama_barang'];
                                            $lebar = $data['lebar'];
                                            $panjang = $data['panjang'];
                                            $tinggi = $data['tinggi'];
                                            $qty = $data['qty'];
                                            $volume = $data['volumBarang'];
                                            $sisa = $data['sisaVTB'];

                                        ?>

                                        <tr>
                                            <td><div align="center"><?php echo $data['id_barang']; ?></div></td>
                                            <td><div align="center"><?php echo $data['nama_barang']; ?></div></td>
                                            <td><div align="center"><?php echo $data['lebar'];?> cm</div></td>
                                            <td><div align="center"><?php echo $data['panjang'];?> cm</div></td>
                                            <td><div align="center"><?php echo $data['tinggi'];?> cm</div></td>
                                            <td><div align="center"><?php echo number_format((float)$volume);?> %</div></td>
                                            <td><div align="center"><?php echo $truck;?> m<sup>3</sup></div></td>
                                            <td><div align="center"><?php echo number_format((float)$sisa);?> %</div></td>
                                            <td><div align="center"><?php echo 100; ?> %</div></td>
                                            
                                        <!-- <?php
                                            if($stock=="Ada"){
                                            ?>
                                            <td><div align="center"><a href="qrcode.php?id=<?php echo $id_barang; ?>&namabarang=<?php echo $nama_barang; ?>&lebar=<?php echo $lebar; ?>&panjang=<?php echo $panjang; ?>&tinggi=<?php echo $tinggi; ?>&berat=<?php echo $berat; ?>&harga=<?php echo $harga; ?>&tujuan=<?php echo $tujuan; ?>">Cetak QR Code</a></div></td>
                                            <?php
                                            }
                                            else if($status=="Kosong") {
                                            ?>
                                            <?php
                                              }
                                            ?> -->
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

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a>Auto 2000</a>
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
<?php
} else {
    header("location:index.php");
}
?>
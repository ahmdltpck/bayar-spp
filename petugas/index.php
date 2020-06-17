<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <script type="text/javascript" src="js.js"></script>
    <title>Document</title>
</head> 
<body> 
    <!-- mencegah Paksa masuk -->
    <?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['status']!="masuk"){
		header("location:../");

	}?>
    <!-- mencegah paksa masuk -->
    <div class="header">
        <?php include 'header.php';
         ?>
    </div>

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-2 pt-4 min-vh-100">
            
            <?php include 'sidebar.php'; ?>
        </div>


        <div class="col-md-10 p-5 pt-2">
            <h3>
                <i class="mr-2 fas fa-tachometer-alt"></i>Dashboard
            </h3><hr>
                    <div class="row">
                        <div class="card bg-success text-white ml-4 " style="width: 18rem;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <h5 class="card-title">Jumlah Siswa</h5>
                                    <div class="display-4">
                                    <?php  
                                        include 'koneksi.php';
                                            $data = mysqli_query($koneksi,"SELECT COUNT(*) as num FROM siswa");
                                            $data = mysqli_fetch_assoc($data);
                                            $jml = $data['num'];
                                            echo $jml;
                                        ?>        
                                        </div>
                                <a href="data_siswa"><p class="card-text text-white"><i class="fas ml-2 fa-angle-double-right"></i> Lihat Detail</p></a>
                            </div>
                        </div>
                        
                        <div class="card bg-warning text-white ml-4 " style="width: 18rem;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h5 class="card-title">Jumlah Kelas</h5>
                                <div class="display-4"><?php  
                                        include 'koneksi.php';
                                            $data = mysqli_query($koneksi,"SELECT COUNT(*) as num FROM kelas");
                                            $data = mysqli_fetch_assoc($data);
                                            $jml = $data['num'];
                                            echo $jml;
                                        ?>        </div>
                                <a href="data_kelas.php"><p class="card-text text-white"><i class="fas ml-2 fa-angle-double-right"></i> Lihat Detail</p></a>
                            </div>
                        </div>
                        <div class="card bg-primary text-white ml-4 " style="width: 18rem;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <h5 class="card-title">Jumlah Data SPP</h5>
                                <div class="display-4"><?php  
                                        include 'koneksi.php';
                                            $data = mysqli_query($koneksi,"SELECT COUNT(*) as num FROM spp");
                                            $data = mysqli_fetch_assoc($data);
                                            $jml = $data['num'];
                                            echo $jml;
                                        ?>        </div>
                                <a href="data_spp.php"><p class="card-text text-white"><i class="fas ml-2 fa-angle-double-right"></i> Lihat Detail</p></a>
                            </div>
                        </div>
                        <div class="card bg-dark text-white ml-4 mt-4" style="width: 18rem;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <h5 class="card-title">Jumlah Transaksi</h5>
                                <div class="display-4"><?php  
                                        include 'koneksi.php';
                                            $data = mysqli_query($koneksi,"SELECT COUNT(*) as num FROM pembayaran");
                                            $data = mysqli_fetch_assoc($data);
                                            $jml = $data['num'];
                                            echo $jml;
                                        ?>        </div>
                                <a href="pembayaran.php"><p class="card-text text-white"><i class="fas ml-2 fa-angle-double-right"></i> Lihat Detail</p></a>
                            </div>
                        </div>
            </div>
        </div>
                  
    </div>
    <div id="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
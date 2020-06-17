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
    <title>Pembayaran SPP Sekolah</title>
</head> 
<body> 
    <!-- mencegah Paksa masuk -->
    <?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['status']!="login"){
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
                <i class="mr-2 fas fa-calendar-alt"></i>Menambahkan Kelas
            </h3><hr>

            <form class="form-vertical" role="form" action="" method="POST" >
                <div class="form-group">
                    <label for="" class="sr-only" >Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" placeholder="Kelas" required>
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Jurusan</label>
                    <input type="text" class="form-control mb-sm-2" name="kompetensi_keahlian" require placeholder="Kompetensi Keahlian">
                
                    <a class="btn btn-danger" href="data_kelas.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit">Simpan</button>
            </form>

            <!-- proses -->
            <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                    // koneksi database
                    include 'koneksi.php';
                    
                    // menangkap data yang di kirim dari form
                    $nama_kelas = $_POST['nama_kelas'];
                    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
                    // menginput data ke database
                    $berhasil = mysqli_query($koneksi,"INSERT INTO kelas VALUES( NULL, '$nama_kelas','$kompetensi_keahlian')");
                    if($berhasil){
                        echo "<p class='text-center text-success'>Berhasil</p>";
                    }
                    else{
                        echo "<p class='text-center text-danger'>Gagal</p>";
                    }
                    }
                    ?>
            <!-- proses -->
        </div>
                  
    </div>
    <div id="">
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
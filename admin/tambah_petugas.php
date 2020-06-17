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
                <i class="mr-2 fas fa-user-graduate"></i>Menambahkan Petugas
            </h3><hr>

            <form class="form-vertical" role="form" action="" method="POST" >
                <div class="form-group">
                    <label for="" class="sr-only" >Id Petugas</label>
                    <input type="text" class="form-control" name="id_petugas" placeholder="Id Petugas">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Nama</label>
                    <input type="text" class="form-control" name="nama_petugas" id="" placeholder="Nama Lengkap Petugas">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">username</label>
                    <input type="text" class="form-control" name="username" id="" placeholder="Username Akun Petugas">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Password</label>
                    <input type="text" class="form-control" name="password" id="" placeholder="Password Akun Petugas">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Level Petugas</label>
                    <input type="text" class=" sr-only" name="Level value="petugas">
                </div>
                    <a class="btn btn-danger" href="data_petugas.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit">Simpan</button>
            </form>

            <!-- proses -->
                    <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                    // koneksi database
                    include 'koneksi.php';
                    
                    // menangkap data yang di kirim dari form
                    $id_petugas = $_POST['id_petugas'];
                    $nama_petugas = addslashes($_POST['nama_petugas']);
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    // menginput data ke database
                    $berhasil = mysqli_query($koneksi,"INSERT INTO petugas VALUES('$id_petugas','$username','$password', '$nama_petugas','petugas')");
                    if($berhasil){
                        echo "<p class='text-center text-success'>Berhasil</p>";
                    }
                    else{
                        echo "<p class='text-center text-danger'>Gagal</p>";
                    }
                    }
                    ?>

        </div>
                  
    </div>
    <div id="">
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
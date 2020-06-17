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
                <i class="mr-2 fas fa-user-graduate"></i>Pengaturan
            </h3><hr>
            <?php 
			include 'koneksi.php';
			$id_petugas = $_GET['id_petugas'];
			$data = mysqli_query($koneksi, "SELECT  petugas.id_petugas, petugas.nama_petugas, petugas.username, petugas.password FROM petugas WHERE id_petugas='$id_petugas'");
			while ($d = mysqli_fetch_array($data)) {
			 ?>

            <form class="form-vertical" action="#" method="POST" >
                <div class="form-group">
                    <label for="" class="" >Id Petugas : <?php echo $d['id_petugas']; ?></label>
                    <input type="" class="form-control" name="id_petugas"  value=" <?php echo $d['id_petugas']; ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Nama</label>
                    <input type="text" class="form-control" name="nama_petugas" id="" placeholder="Nama Lengkap Petugas" value="<?php echo $d['nama_petugas'];  ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">username</label>
                    <input type="text" class="form-control" name="username" id="" placeholder="Username Akun Petugas"value="<?php echo $d['username'];  ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Password</label>
                    <input type="text" class="form-control" name="password" id="" placeholder="Password Akun Petugas"value="<?php echo $d['password'];  ?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Level Petugas</label>
                    <input type="text" class=" sr-only" name="level" value="petugas">
                </div>
                    <a class="btn btn-danger" href="data_petugas.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit" name="submit">Simpan</button>
                    
            </form>
            <?php }?>
            <!-- proses -->
                    <?php 
                if(isset($_POST['submit'])){
                // koneksi database
                include 'koneksi.php';
                
                // menangkap data yang di kirim dari form
                $id_petugas = $_POST['id_petugas'];
                $nama_petugas = addslashes($_POST['nama_petugas']);
                $username = $_POST['username'];
                $password = $_POST['password'];
                // menginput data ke database
                $berhasil = mysqli_query($koneksi,"UPDATE petugas SET id_petugas = '$id_petugas', username = '$username', password ='$password', nama_petugas = '$nama_petugas'  WHERE id_petugas = '$id_petugas' ");
                if(!$berhasil){
                    echo "<p class='text-center text-danger'>Gagal</p>";
                }
                else{
                    echo "<script>document.location.href='data_petugas.php'</script>";
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
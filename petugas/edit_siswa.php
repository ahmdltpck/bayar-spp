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
                <i class="mr-2 fas fa-user-graduate"></i>Mengedit Siswa
            </h3><hr>
            <p class="text-primary text-bold" style="font-size: 10pt">NB: Kelas dan Tahun Spp Tidak Bisa Diganti</p>

            <?php 
                include 'koneksi.php';
                $nisn = $_GET['nisn'];
                $data = mysqli_query($koneksi,"SELECT siswa.nisn, siswa.nis, siswa.nama, siswa.alamat, siswa.no_telp, kelas.id_kelas, kelas.nama_kelas, kelas.kompetensi_keahlian, spp.id_spp, spp.tahun FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN spp ON spp.id_spp=siswa.id_spp WHERE '$nisn'= nisn"); 
                while ($d = mysqli_fetch_array($data)) {
			 ?>

            <form class="form-vertical" role="form" action="" method="POST" >
                <div class="form-group">
                    <label for="" class="" >NISN : <?php echo $d['nisn'];?> </label>
                    <input type="hidden" class="form-control" name="nisn" value="<?php echo $d['nisn'];?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only" >Nis</label>
                    <input type="text" class="form-control" name="nis" value="<?php echo $d['nis'];?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $d['nama'];?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Kelas</label>
                    <input type="hidden" name="id_kelas" value="<?php echo $d['id_kelas'];?>">
                    <label for="" class="form-control"><?php echo $d['nama_kelas']." "; echo $d['kompetensi_keahlian']; ?></label>
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'];?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">NO_telp</label>
                    <input type="tel" class="form-control" name="no_telp"  value="<?php echo $d['no_telp'];?>">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Spp</label>
                    <input type="hidden" name="id_spp" value="<?php echo $d['id_spp'];?>">
                    <label for="" class="form-control"><?php echo $d['tahun']; ?></label>
                </div>
                    <a class="btn btn-danger" href="data_siswa.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit" name="submit">Simpan</button>
            </form>
            <?php } ?>


            <!-- proses -->
             <?php 
                if(isset($_POST['submit'])){
                // koneksi database
                include 'koneksi.php';
                
                // menangkap data yang di kirim dari form
                $nisn = $_POST['nisn'];
                $nis = $_POST['nis'];
                $nama = addslashes($_POST['nama']);
                $alamat = $_POST['alamat'];
                $id_kelas = $_POST['id_kelas'];
                $id_spp = $_POST['id_spp'];
                $no_telp = $_POST['no_telp'];
                // menginput data ke database
                $berhasil = mysqli_query($koneksi,"UPDATE siswa SET nisn = '$nisn', nis = '$nis', nama ='$nama', id_kelas = '$id_kelas', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp'  WHERE nisn = '$nisn' ");
                if($berhasil){
                    echo "<script>document.location.href='data_siswa.php'</script>";
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
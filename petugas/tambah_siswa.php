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
                <i class="mr-2 fas fa-user-graduate"></i>Menambahkan Siswa
            </h3><hr>

            <form class="form-vertical" role="form" action="" method="POST" >
                <div class="form-group">
                    <label for="" class="sr-only" >NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="NISN">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only" >Nis</label>
                    <input type="text" class="form-control" name="nis" placeholder="Nis">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Nama</label>
                    <input type="text" class="form-control" name="nama"  placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Kelas</label>
                        <select class="form-control" name="id_kelas">
                            <option>Kelas</option>
                            <?php
                                include 'koneksi.php';	
                                $data = mysqli_query($koneksi,"SELECT id_kelas, nama_kelas, kompetensi_keahlian FROM kelas"); 
                                echo mysqli_error($koneksi);

                                while($d = mysqli_fetch_array($data) ){
                                ?>
                            <option value="<?php echo $d['id_kelas']; ?> "><?php echo $d['nama_kelas']."    "; echo $d['kompetensi_keahlian'];?></option>
                            
                            <?php } ?>
                        </select>
                </div>
                
                
                <div class="form-group">
                    <label for="" class="sr-only">Alamat</label>
                    <input type="text" class="form-control" name="alamat"  placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">NO_telp</label>
                    <input type="tel" class="form-control" name="no_telp"  placeholder="Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="" class="sr-only">Spp</label>
                        <select class="form-control" name="id_spp">
                            <option>Tahun Pelajaran</option>
                            <?php
                                include 'koneksi.php';	
                                $data = mysqli_query($koneksi,"SELECT id_spp, tahun FROM spp"); 
                                echo mysqli_error($koneksi);

                                while($d = mysqli_fetch_array($data) ){
                                ?>
                            <option value="<?php echo $d['id_spp']; ?> "><?php echo $d['tahun'];?></option>
                            
                            <?php } ?>
                        </select>
                </div>
                    <a class="btn btn-danger" href="data_siswa.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit">Simpan</button>
            </form>

            <!-- proses -->
                            <?php 
                if($_SERVER['REQUEST_METHOD']=='POST'){
                // koneksi database
                include '../koneksi.php';
                
                // menangkap data yang di kirim dari form
                $nisn = $_POST['nisn'];
                $nis = $_POST['nis'];
                $nama = addslashes($_POST['nama']);
                $id_kelas = $_POST['id_kelas'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $id_spp = $_POST['id_spp'];
                // menginput data ke database
                $berhasil = mysqli_query($koneksi,"INSERT INTO siswa values('$nisn','$nis','$nama','$id_kelas','$alamat', '$no_telp', '$id_spp')");
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
</body>
</html>
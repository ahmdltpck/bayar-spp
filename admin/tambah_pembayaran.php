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
                <i class="mr-2 fas fa-user-graduate"></i>Menambahkan pembayaran
            </h3><hr>

            <form class="form-vertical" role="form" action="config/pembayaran.php" method="POST" >
            <div class="form-group">
                <?php  $data = mysqli_query($koneksi," SELECT id_petugas, nama_petugas FROM petugas where username = '$_SESSION[username]'"); 
                while($d = mysqli_fetch_array($data) ){
                    $id_petugas = $d['id_petugas'];
                } ?>
                <div class="form-group">
                    <label for="" class="sr-only" >Petugas</label>
                    <input type="text" class="sr-only" name="id_petugas" value="<?php echo $id_petugas; ?>">
                </div>


                    <label for="" class="">NISN</label>
                        <select class="form-control" name="nisn">
                            <option>NISN</option>
                            <?php
                                include 'koneksi.php';	
                                $data = mysqli_query($koneksi,"SELECT nisn, nama FROM siswa"); 
                                echo mysqli_error($koneksi);

                                while($d = mysqli_fetch_array($data) ){
                                ?>
                            <option value="<?php echo $d['nisn']; ?> "><?php echo $d['nisn']."    "; echo $d['nama'];?></option>
                            
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="" class="" >Tgl Bayar</label>
                    <input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar">
                </div>
                <div class="form-group">
                    <label for="" class="" >Bulan diBayar</label>
                    <select name="bulan_dibayar" class="form-control">
                        <option value="">Bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="">Tahun diBayar</label>
                    <input type="text" class="form-control" name="tahun_dibayar"  placeholder="Tahun Dibayar" maxlength="4">
                </div>
                <div class="form-group">
                    <label for="" class="">Tahun SPP</label>
                        <select class="form-control" name="id_spp">
                            <option>Tahun SPP</option>
                            <?php
                                include 'koneksi.php';	
                                $data = mysqli_query($koneksi,"SELECT * FROM spp"); 
                                echo mysqli_error($koneksi);

                                while($d = mysqli_fetch_array($data) ){
                                ?>
                            <option value="<?php echo $d['id_spp']; ?> "><?php echo $d['tahun']." - Rp. "; echo $d['nominal'];?></option>
                            
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="" class="">Jumlah Bayar</label>
                    <input type="int" class="form-control" name="jumlah_bayar"  placeholder="Jumlah Bayar">
                </div>
               
                    <a class="btn btn-danger" href="pembayaran.php">Kembali</a>
                    <button class="btn btn-secondary " type="reset">Reset</button>
                    <button class="btn btn-success " type="submit" name="submit">Lanjut</button>
            </form>

            <?php 
                if(isset($_POST['submit'])){
                // koneksi database
                include 'koneksi.php';
                
                // menangkap data yang di kirim dari form

                $id_petugas = $_POST['id_petugas'];
                $nisn = $_POST['nisn'];
                $tgl_bayar = $_POST['tgl_bayar'];
                $bulan_dibayar = $_POST['bulan_dibayar'];
                $tahun_dibayar = $_POST['tahun_dibayar'];
                $jumlah_bayar = $_POST['jumlah_bayar'];
                $id_spp = $_POST['id_spp'];


                // menginput data ke database
                $succes = mysqli_query($koneksi,"INSERT INTO pembayaran 
                    values('NULL','$id_petugas','$nisn','$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')");
                if($succes){
                    echo "<script>document.location.href='pembayaran.php'</script>";
                }
                }
                ?>


        </div>
                  
    </div>
    <div id="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
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
                <i class="mr-2 fas fa-user-graduate"></i>Laporan pembayaran
            </h3><hr>
                <!-- DAta -->
                <?php
                
                $id_pembayaran = $_GET['id_pembayaran'];   
                $data = mysqli_query($koneksi," SELECT pembayaran.jumlah_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.tgl_bayar, siswa.nis, pembayaran.id_pembayaran, petugas.id_petugas, petugas.nama_petugas, siswa.nama, siswa.nisn, kelas.nama_kelas, kelas.kompetensi_keahlian, spp.nominal ,spp.tahun FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON spp.id_spp=siswa.id_spp INNER JOIN pembayaran ON pembayaran.nisn=siswa.nisn INNER JOIN petugas ON petugas.id_petugas=pembayaran.id_petugas where id_pembayaran = '$id_pembayaran' "); 
                                echo mysqli_error($koneksi);
                                
                                while($e = mysqli_fetch_array($data) ){

                            ?>
                <!-- Data -->

            <!-- ubah jadi Rupiah -->
            <?php function rupiah($angka){
                    $format_rupiah = "Rp.".number_format($angka,2,',','.');
                    return $format_rupiah;
            } ?>
            <!--ubah jadi rupiah -->

            <form class="form-vertical" role="form" >
            <div class="form-group">
                    <label for="" class="">ID PETUGAS : </label>
                    <label for="" class="form-control"><?php echo $e['id_petugas']." -- "; echo $e['nama_petugas'];?> </label>
            </div>
            <table class="table border" >
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?php echo $e['nisn'];?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?php echo $e['nis'];?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?php echo $e['nama'];?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?php echo $e['nama_kelas']." "; echo $e['kompetensi_keahlian']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td><?php echo $e['tgl_bayar'];?></td>
                </tr>
                <tr>
                    <td>Bulan Dibayar</td>
                    <td>:</td>
                    <td><?php echo $e['bulan_dibayar'];?></td>
                </tr>
                <tr>
                    <td>Tahun Dibayar</td>
                    <td>:</td>
                    <td><?php echo $e['tahun_dibayar'];?></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td><?php echo $e['tahun'];?></td>
                </tr>
                <tr>
                    <td>Nominal</td>
                    <td>:</td>
                    <td><?php echo rupiah($e['nominal']);?></td>
                </tr>
                <tr>
                    <td>Jumlah Dibayar</td>
                    <td>:</td>
                    <td><?php echo rupiah($e['jumlah_bayar']);?></td>
                </tr>                
            </table>
               
                    <a class="btn btn-danger" href="pembayaran.php">kembali</a>
                    <center><button class="btn btn-success " type="button">Cetak Laporan</button></center>
            </form>
            <?php } ?>
        </div>
                  
    </div>
    <div id="">
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
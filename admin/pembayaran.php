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
    <?php include 'header.php'; ?>
    </div>

    <!-- ubah jadi Rupiah -->
    <?php function rupiah($angka){
        $format_rupiah = "Rp.".number_format($angka,2,',','.');
        return $format_rupiah;
        } ?>
    <!--ubah jadi rupiah -->

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-2 pt-4 min-vh-100">
            
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="mr-2 fas fa-paper-plane"></i>Pembayaran SPP</h3><hr>
            <button type="button" class="btn btn-primary mb-3"> <a class="text-decoration-none text-white" href="tambah_pembayaran.php" class="text-white">Tambah Data</a> </button>
    
            <p class="text-primary text-bold" style="font-size: 10pt">NB: Menghapus Transaksi Berarti Menghapus Data Siswa</p>
        
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ID PET</th>
                                <th>NISN</th>
                                <th>Tgl Bayar</th>
                                <th>Bln</th>
                                <th>Thn bayar</th>
                                <th>Tahun SPP</th>
                                <th>Uang SPP</th>
                                <th>Jumlah Bayar</th>
                                <th colspan="2">Pilihan</th>
                            </tr>
                        </thead>
                        <!-- perulangan data -->
                        <?php 
                        include 'koneksi.php';
                            error_reporting(0);
                            $no=1;
                            $cari = $_POST['cari'];
                            if($cari != ''){
                                $data = mysqli_query($koneksi,"SELECT pembayaran.id_pembayaran, petugas.id_petugas, siswa.nisn, 
                                siswa.nama, kelas.nama_kelas, kelas.kompetensi_keahlian, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, 
                                pembayaran.tahun_dibayar, spp.tahun, spp.nominal, pembayaran.jumlah_bayar FROM pembayaran INNER JOIN 
                                petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN siswa ON siswa.nisn=pembayaran.nisn 
                                INNER JOIN spp ON spp.id_spp=siswa.id_spp INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                                WHERE siswa.nisn = '$cari' OR pembayaran.id_pembayaran = '$cari' ");
                            }
                            else{
                                $data = mysqli_query($koneksi,"SELECT pembayaran.id_pembayaran, petugas.id_petugas, siswa.nisn, siswa.nama, 
                            kelas.nama_kelas, kelas.kompetensi_keahlian, pembayaran.tgl_bayar, pembayaran.bulan_dibayar,
                            pembayaran.tahun_dibayar, spp.tahun, spp.nominal, pembayaran.jumlah_bayar FROM pembayaran INNER JOIN 
                            petugas ON pembayaran.id_petugas=petugas.id_petugas INNER JOIN siswa ON siswa.nisn=pembayaran.nisn 
                            INNER JOIN spp ON spp.id_spp=siswa.id_spp INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ");
                                }   
                            echo mysqli_error($koneksi);
                            if(mysqli_num_rows($data)){
                            while($d = mysqli_fetch_array($data) ){
                        ?>



                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $d['id_pembayaran']; ?></th>
                                <th><?php echo $d['id_petugas']; ?></th>
                                <td><?php echo $d['nisn']; ?></td>
                                <td><?php echo $d['tgl_bayar']; ?></td>
                                <td><?php echo $d['bulan_dibayar']; ?></td>
                                <td><?php echo $d['tahun_dibayar']; ?></td>
                                <td><?php echo $d['tahun']; ?></td>
                                <td><?php echo rupiah($d['nominal']); ?></td>
                                <td><?php echo rupiah($d['jumlah_bayar']); ?></td>
                                <td><a href="detail_pembayaran.php?id_pembayaran=<?php echo $d['id_pembayaran']; ?>">
                                    <i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></a></td>
                                <td><a href="config/hapus_pembayaran.php?id_pembayaran=<?php echo $d['id_pembayaran']; ?>">
                                    <i class="fas fa-trash-alt" data-toggle="tooltip" title="hapus"></i></a></td>
                            </tr>
                            
                            
                        </tbody>
                        <?php }}
                            
                            else{
                                echo "<tbody>
                            <tr><td colspan='10'><p class='text-center'>Data Tidak Ditemukan</p></td></tr>
                                    </tbody>";
                            } ?>
                    </table>
                                    
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
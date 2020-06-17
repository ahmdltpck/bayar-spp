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
            <h3><i class="mr-2 fas fa-user-graduate"></i>Data Siswa</h3><hr>

                <div class="row">
                    <button type="button" class="btn btn-primary mb-3"> <a class="text-decoration-none text-white" href="tambah_siswa.php" class="text-white">Tambah Data</a> </button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NISN</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>No Tlp</th>
                                <th colspan="2">Pilihan</th>
                            </tr>
                        </thead>

                        <?php 
                        include 'koneksi.php';
                            error_reporting(0);
                            $no=1;
                            $cari = $_POST['cari'];
                            if($cari != ''){
                                $data = mysqli_query($koneksi,"SELECT siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, 
                                kelas.kompetensi_keahlian, siswa.alamat, no_telp FROM siswa INNER JOIN kelas ON 
                                siswa.id_kelas=kelas.id_kelas WHERE siswa.nisn = '$cari'");
                            }
                            else{
                                $data = mysqli_query($koneksi,"SELECT siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, 
                                kelas.kompetensi_keahlian, siswa.alamat, no_telp FROM siswa INNER JOIN kelas ON 
                                siswa.id_kelas=kelas.id_kelas");
                                }   
                            echo mysqli_error($koneksi);
                            if(mysqli_num_rows($data)){
                            while($d = mysqli_fetch_array($data) ){
                        ?>


                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <th><?php echo $d['nisn']; ?></th>
                                <td><?php echo $d['nis']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['nama_kelas']; ?></td>
                                <td><?php echo $d['kompetensi_keahlian']; ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td><?php echo $d['no_telp']; ?></td>
                                <td><a href="edit_siswa.php?nisn=<?php echo $d['nisn']; ?>">
                                    <i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></a></td>
                                <td><a href="config/hapus_siswa.php?nisn=<?php echo $d['nisn']; ?>">
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
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
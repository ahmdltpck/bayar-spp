<!-- nama Petugas -->
<?php 
$data = mysqli_query($koneksi,"SELECT nama_petugas FROM petugas where username = '$_SESSION[username]'"); 
                                
    echo mysqli_error($koneksi);
    while($d = mysqli_fetch_array($data) ){
        $nama = $d['nama_petugas'];
    }?>
<!-- nama Petugas -->
<ul class="nav flex-column mb-5 ml-1 ">
                <div class="profil ml-4 ">
                    <h4><i class="fas fa-user-edit text-white display-4 ml-4"></i>
                    <p class="text-white mt-2"><?php echo $nama; ?></p></h4>
                </div>
    
                <li class="nav-item">
                    <a class="nav-link active text-white" href="index.php"><i class="mr-2 fas fa-tachometer-alt"></i> Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data_siswa.php"><i class="mr-2 fas fa-user-graduate"></i> Data Siswa</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data_kelas.php"><i class="mr-2 fas fa-calendar-alt"></i>Data Kelas</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pembayaran.php"><i class="mr-2 fas fa-paper-plane"></i> Pembayaran SPP </a><hr class="bg-secondary">
                </li>
                </li> <li class="nav-item">
                    <a class="nav-link text-white" href="data_spp.php"><i class="mr-2 fas fa-money-bill"></i> Data SPP </a><hr class="bg-secondary">
                </li>
            </ul>
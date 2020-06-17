<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$nisn = $_GET['nisn'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from siswa where nisn='$nisn' ");




// mengalihkan halaman kembali ke index.php
header("location:../data_siswa.php");
 
?>
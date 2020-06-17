<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_spp = $_GET['id_spp'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from spp where id_spp='$id_spp' ");




// mengalihkan halaman kembali ke index.php
header("location:../data_spp.php");
 
?>
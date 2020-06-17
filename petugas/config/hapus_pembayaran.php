<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_pembayaran = $_GET['id_pembayaran'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembayaran where id_pembayaran='$id_pembayaran' ");




// mengalihkan halaman kembali ke index.php
header("location:../pembayaran.php");
 
?>
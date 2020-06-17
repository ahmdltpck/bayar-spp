<?php 
// koneksi database
include '../koneksi.php';
 
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
     header("location: ../pembayaran.php");
 }
// mengalihkan halaman kembali ke index.php
?>
<?php
//koneksi database
include '../koneksi.php';

//menangkap data yg dikirim dari from
$totalharga = $_POST['totalharga'];
$id_penjualan = $_POST['id_penjualan'];
$id_pelanggan = $_POST['id_pelanggan'];

//menginput data ke database
mysqli_query($koneksi,"update penjualan set totalharga='$totalharga' where id_penjualan='$id_penjualan'");

//mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>
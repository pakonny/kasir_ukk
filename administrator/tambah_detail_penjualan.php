<?php
//koneksi ke database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$id_penjualan = $_POST['id_penjualan'];

mysqli_query($koneksi,"insert into detailpenjualan values('','$id_penjualan','','','')");

//menginput halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>
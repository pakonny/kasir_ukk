<?php 
//koneksi databse
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_produk = $_POST['id_produk'];
$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];

//menginput data ke database

mysqli_query($koneksi,"update detailpenjualan set id_produk='$id_produk' where id_detail='$id_detail'");

//mengalihkan halaman kembali ke pembelian.php
header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>
<?php
//koneksi database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$stok = $_POST['stok'];
$id_produk = $_POST['id_produk'];
$jumlahproduk = $_POST['jumlahproduk'];
$harga = $_POST['harga'];
$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];
$subtotal = $jumlahproduk * $harga;
$stok_total = $stok - $jumlahproduk;

//menginput ke database

mysqli_query($koneksi,"update detailpenjualan set subtotal='$subtotal', jumlahproduk='$jumlahproduk' where id_detail='$id_detail'");
mysqli_query($koneksi,"update produk set stok='$stok_total' where id_produk='$id_produk'");

//mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");
?>
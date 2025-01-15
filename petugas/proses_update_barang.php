<?php
//koneksi database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_produk = $_POST['id_produk'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

//updatae ke database
mysqli_query($koneksi,"update produk set namaproduk='$namaproduk', harga='$harga',
stok='$stok' where id_produk='$id_produk'");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=update");

?>
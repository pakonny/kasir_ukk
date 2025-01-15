<?php
//koneksi database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

//menginput data ke database
mysqli_query($koneksi,"insert into produk values('','$namaproduk','$harga','$stok')");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=simpan");

?>
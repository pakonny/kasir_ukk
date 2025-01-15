<?php
//koneksi database
include '../koneksi.php';

//menangkap data id yg di kirim dari url
$id_produk = $_POST['id_produk'];


//menghapus data dai database
mysqli_query($koneksi,"delete from produk where id_produk='$id_produk'");

//mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=hapus");

?>
<?php
//koneksi database
include '../koneksi.php';

//menangkap data id yg di kirim dari url
$id_pelanggan = $_POST['id_pelanggan'];


//menghapus data dai database
mysqli_query($koneksi,"delete from pelanggan where id_pelanggan='$id_pelanggan'");
mysqli_query($koneksi,"delete from penjualan where id_pelanggan='$id_pelanggan'");

//mengalihkan halaman kembali ke pembelian.php
header("location:pembelian.php?pesan=hapus");

?>
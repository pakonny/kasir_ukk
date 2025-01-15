<?php
//koneksi database
include '../koneksi.php';

//menangkap data id yg di kirim dari url
$id_detail = $_POST['id_detail'];
$id_pelanggan = $_POST['id_pelanggan'];

//menghapus data dari database
mysqli_query($koneksi,"DELETE FROM detailpenjualan WHERE id_detail='$id_detail'");

//mengalihkan halaman kembali ke pembelian.php
header("location:detail_pembelian.php?id_pelanggan=$id_pelanggan");

?>
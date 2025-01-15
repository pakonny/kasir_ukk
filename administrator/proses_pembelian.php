<?php
//koneksi ke database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$namapelanggan = $_POST['namapelanggan'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];
$tanggalpenjualan = $_POST['tanggalpenjualan'];
//menginput data ke database
mysqli_query($koneksi,"insert into pelanggan values('$id_pelanggan','$namapelanggan','$alamat','$no')");
mysqli_query($koneksi,"insert into penjualan values('','$tanggalpenjualan','','$id_pelanggan')");

//mengalihkan halaman kembali ke database
header("location:pembelian.php?pesan=simpan");
?>
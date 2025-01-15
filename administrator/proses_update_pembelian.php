<?php
//koneksi ke database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_pelanggan = $_POST['id_pelanggan'];
$namapelanggan = $_POST['namapelanggan'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];

//update data ke database
mysqli_query($koneksi,"update pelanggan set namapelanggan='$namapelanggan', no='$no', alamat='$alamat' where id_pelanggan='$id_pelanggan'");


//mengalihkan halaman kembali ke pembelian.php
header("location:pembelian.php?pesan=update");
?>
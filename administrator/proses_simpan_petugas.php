<?php
//koneksi database
include '../koneksi.php';

//menangkap data yg di kirim dari form
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

//menginput data ke database
mysqli_query($koneksi,"insert into petugas values('','$nama_petugas','$username','$password','$level')");

//mengalihka kembali ke data_pengguna.php
header("location:data_pengguna.php?pesan=simpan");
?>
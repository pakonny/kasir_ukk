
<?php
include '../koneksi.php';

//menangkap data yg di kirim dari form
$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

//update ke database
if (!$password) {
    mysqli_query($koneksi,"update petugas set nama_petugas='$nama_petugas', username='$username', level='$level' where id_petugas='$id_petugas'");
} else {
    mysqli_query($koneksi,"update petugas set nama_petugas='$nama_petugas', username='$username', password='$password',
    level='$level' where id_petugas='$id_petugas'");
}

//mengalihkan halaman kembali
header("location:data_pengguna.php?pesan=update");

?>
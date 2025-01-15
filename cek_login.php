<?php
//mengaktifkan session pada php
session_start();

//menghubungkan php dg koneksi dataabse
include 'koneksi.php';

//menghubungkan data yg di kirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


//menyeleksi data user dg username dan password yg sesuai
$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
//menghitung jumlah data yg di temukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['level']=="1"){

        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "1";
        //alihkan ke halaman dashboard lain
        header("location:administrator/index.php");

        //cek jika user login sebagai petugas
    }else if($data['level']=="2"){
         //buat session login dan username
         $_SESSION['username'] = $username;
         $_SESSION['level'] = "2";
         //alihkan ke halaman dashboard lain
         header("location:petugas/index.php");

    }else{
        
        //alihkan ke hal login
        header("location:index.php?pesan=gagal");
    }
}else{
    header("location:index.php?pesan=gagal");
}

?>
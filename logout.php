<?php
//mengaktifkan session pada php
session_start();

//menghapus semua session
session_destroy();

//mengalihkan ke halaman login.php
header("location:index.php");
?>
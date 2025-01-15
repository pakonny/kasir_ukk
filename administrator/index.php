<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        Data Barang
                        <?php
                        include '../koneksi.php';
                        $data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
                        $jumlahproduk = mysqli_num_rows($data_produk);
                        ?>
                        <h3><?php echo $jumlahproduk; ?></h3>
                        <a href="data_barang.php" class="btn btn-outline-primary btn-sm ">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        Data Pembelian
                        <?php
                        include '../koneksi.php';
                        $data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
                        $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                        ?>
                        <h3><?php echo $jumlah_penjualan; ?></h3>
                        <a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        Data Pengguna
                        <?php
                        include '../koneksi.php';
                        $data_petugas = mysqli_query($koneksi,"SELECT * FROM petugas");
                        $jumlah_petugas = mysqli_num_rows($data_petugas);
                        ?>
                        <h3><?php echo $jumlah_petugas; ?></h3>
                        <a href="data_pengguna.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <p><h1 style="height: 100; text-align: center;">Selamat datang di halaman Administrator</h1></p>
    </div>
</div>

<?php
include "footer.php";
?>

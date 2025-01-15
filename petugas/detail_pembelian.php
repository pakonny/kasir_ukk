<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <?php
        include '../koneksi.php';
        $id_pelanggan = $_GET['id_pelanggan'];
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.id_pelanggan=penjualan.id_pelanggan");
        while($d = mysqli_fetch_array($data)){
        ?>
            <?php if($d['id_pelanggan'] == $id_pelanggan) { ?>
                <table>
                    <tr>
                        <td>ID Pelanggan</td>
                        <td>: <?php echo $d['id_pelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>: <?php echo $d['namapelanggan']; ?> </td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>: <?php echo $d['no']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $d['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Pembelian</td>
                        <td>: Rp. <?php echo $d['totalharga']; ?></td>
                    </tr>
                </table>
                <form method="post" action="tambah_detail_penjualan.php">
                    <input type="text" name="id_penjualan" value="<?php echo $d['id_penjualan']; ?>" hidden>
                    <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" hidden>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">
                        Tambah Barang
                    </button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $nos = 1;
                        $detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
                        while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
                        ?>
                            <?php
                            if ($d_detailpenjualan['id_penjualan'] == $d['id_penjualan']) { ?>
                            <tr>
                                <td><?php echo $nos++; ?></td>
                                <td>
                                    <form action="simpan_barang_beli.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" hidden>
                                            <input type="text" name="id_detail" value="<?php echo $d_detailpenjualan['id_detail']; ?>" hidden>
                                            <select name="id_produk" class="form-control" onchange="this.form.submit()">
                                            <option>-- Pilih Produk ---</option>
                                            <?php
                                            include '../koneksi.php';
                                            $no = 1;
                                            $produk = mysqli_query($koneksi,"SELECT * FROM produk");
                                            while($d_produk = mysqli_fetch_array($produk)){
                                                ?>
                                                <option value="<?php echo $d_produk['id_produk']; ?>" <?php if ($d_produk['id_produk']==$d_detailpenjualan
                                                ['id_produk']) {echo "selected";} ?>><?php echo $d_produk['namaproduk']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="hitung_subtotal.php">
                                        <?php
                                        include '../koneksi.php';
                                        $produk = mysqli_query($koneksi,"SELECT * FROM produk");
                                        while($d_produk = mysqli_fetch_array($produk)){
                                            ?>
                                            <?php
                                            if ($d_produk ['id_produk']==$d_detailpenjualan['id_produk']) { ?>
                                            <input type="text" name="harga" value="<?php echo $d_produk['harga']; ?>" hidden>
                                            <input type="text" name="id_produk" value="<?php echo $d_produk['id_produk']; ?>" hidden>
                                            <input type="text" name="stok" value="<?php echo $d_produk['stok']; ?>" hidden>
                                            <?php
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input type="number" name="jumlahproduk" value="<?php echo $d_detailpenjualan['jumlahproduk']; ?>" class="form-control">
                                        </div>
                                        </td>
                                        <td><?php echo $d_detailpenjualan['subtotal']; ?></td>
                                        <td>
                                            <input type="text" name="id_detail" value="<?php echo $d_detailpenjualan['id_detail']; ?>" hidden>
                                            <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" hidden>
                                            <button type="submit" class="btn btn-warning btn-sm">Proses</button>
                                    </form>
                                    <form method="post" action="hapus_detail_pembelian.php">
                                        <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" hidden>
                                        <input type="text" name="id_detail" value="<?php echo $d_detailpenjualan['id_detail']; ?>" hidden>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } else {
                                ?>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <form method="post" action="simpan_total_harga.php">
                    <?php
                    include '../koneksi.php';
                    $detailpenjualan = mysqli_query($koneksi, "SELECT SUM(subtotal) AS totalharga FROM detailpenjualan WHERE id_penjualan='$d[id_penjualan]'");
                    $row = mysqli_fetch_assoc($detailpenjualan);
                    $sum = $row['totalharga'];
                    ?>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="from-group">
                                <input type="text" class="form-control" name="totalharga" value="<?php echo $sum; ?>">
                                <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" hidden>
                                <input type="text" name="id_penjualan" value="<?php echo $d['id_penjualan']; ?>" hidden>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <?php
            }
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>
<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="simpan"){?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Simpan.
            </div>
            <?php } ?>
            <?php if($_GET['pesan']=="update"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Update.
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="hapus"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Hapus.
                </div>
            <?php } ?>
            <?php
        }
        ?>
        <table class="table table-bordered">
             <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.id_pelanggan=penjualan.id_pelanggan");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_pelanggan'] ?></td>
                        <td><?php echo $d['namapelanggan'] ?></td>
                        <td><?php echo $d['no'] ?></td>
                        <td><?php echo $d['alamat'] ?></td>
                        <td><?php echo $d['totalharga'] ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="detail_pembelian.php?id_pelanggan=<?php echo $d['id_pelanggan']; ?>">Detail</a>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php
                            echo $d['id_pelanggan']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php
                            echo $d['id_pelanggan']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>

<!-- Modal Edit Data -->
<div class="modal fade" id="edit-data<?php echo $d['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_update_pembelian.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>" class="form-control" hidden>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" value="<?php echo $d['namapelanggan']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" name="no" value="<?php echo $d['no']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Hapus Data -->
<div class="modal fade" id="hapus-data<?php echo $d['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="proses_hapus_pembelian.php">
                <div class="modal-body">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $d['id_pelanggan']; ?>">
                    Apakah anda yakin akan menghapus data <b><?php echo $d['namapelanggan']; ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_pembelian.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="text" name="id_pelanggan" value="<?php echo date("dmHis") ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input type="text" name="no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                        <input type="hidden" name="tanggalpenjualan" value="<?php echo date("Y-m-d") ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
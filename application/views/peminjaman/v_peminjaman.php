<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>peminjaman/add_peminjaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>
<br>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Id Buku</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) {
                    $tgl_kembali = new DateTime($row->tgl_kembali);
                    $tgl_sekarang = new DateTime();
                    $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                ?>
                    <tr>
                        <td><?= $row->id_pm; ?></td>
                        <td><?= $row->nama_anggota; ?></td>
                        <td><?= $row->id_buku ?></td>
                        <td><?= $row->judul_buku; ?></td>
                        <td><?= $row->tgl_pinjam; ?></td>
                        <td><?= $row->tgl_kembali; ?></td>
                        <td><?php
                            if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) {
                                echo "<span class='label label-warning'>Belum Dikimebalikan</span>";
                            } else {
                                echo "Telat <b style = 'color:red;'>" . $selisih . "</b> Hari <br> <span class='label label-danger'>Denda = 1.000";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>peminjaman/kembalikan/<?= $row->id_pm; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin mengembalikan buku ini?');">Kembalikan</a>
                            <a href="<?= base_url() ?>peminjaman/rusak/<?= $row->id_pm; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Buku sudah rusak peminjam didenda Rp100.000')">Rusak</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
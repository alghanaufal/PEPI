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
                    <th>NO</th>
                    <th>Nama Peminjam</th>
                    <th>Id Buku</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal di Kemgalikan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_anggota; ?></td>
                        <td><?= $row->id_buku ?></td>
                        <td><?= $row->judul_buku; ?></td>
                        <td><?= $row->tgl_pinjam; ?></td>
                        <td><?= $row->tgl_kembali; ?></td>
                        <td><?= $row->tgl_kembalikan; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
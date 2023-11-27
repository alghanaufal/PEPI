<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>anggota/add_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>
<br>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>NO. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->id_anggota; ?></td>
                        <td><?= $row->nama_anggota; ?></td>
                        <td><?= $row->gender; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->no_hp; ?></td>
                        <td>
                            <a href="<?= base_url() ?>anggota/edit/<?= $row->id_anggota; ?>" class="btn btn-success btn-xs">Edit</a>
                            <a href="<?= base_url() ?>anggota/delete/<?= $row->id_anggota; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this')">Hapus</a>
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
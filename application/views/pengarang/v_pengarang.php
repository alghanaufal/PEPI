<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>pengarang/add_pengarang" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>
<br>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Pengarang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row->nama_pengarang; ?></td>
                        <td>
                            <a href="<?= base_url() ?>pengarang/edit/<?= $row->id_pengarang; ?>" class="btn btn-success btn-xs">Edit</a>
                            <a href="<?= base_url() ?>pengarang/delete/<?= $row->id_pengarang; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this');">Hapus</a>
                        </td>
                    </tr>
                <?php  }
                ?>

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
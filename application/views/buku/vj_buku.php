<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Buku</th>
                    <th>Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data->result() as $row) { ?>
                    <tr>
                        <td><?= $row->id_buku; ?></td>
                        <td><?= $row->judul_buku; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
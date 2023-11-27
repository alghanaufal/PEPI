<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<!-- <div class="content-wrapper"> -->
<!-- Main content -->
<!-- <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="search" name="submit" value="Search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form action="<?php echo base_url(); ?>buku/cari">
                </div>
            </div>
        </div>
    </section>
</div> -->

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>buku/add_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>
<br>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data->result() as $row) { ?>
                    <tr>
                        <td><?= $row->id_buku; ?></td>
                        <td><?= $row->judul_buku; ?></td>
                        <td><?= $row->nama_pengarang; ?></td>
                        <td><?= $row->nama_penerbit; ?></td>
                        <td><?= $row->tahun_terbit; ?></td>
                        <td>
                            <a href="<?= base_url() ?>buku/edit/<?= $row->id_buku; ?>" class="btn btn-success btn-xs">Edit</a>
                            <a href="<?= base_url() ?>buku/rusak/<?= $row->id_buku; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah buku ini rusak')">Rusak</a>
                            <a href="<?= base_url() ?>buku/delete/<?= $row->id_buku; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus data buku ini?')">Hapus</a>
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
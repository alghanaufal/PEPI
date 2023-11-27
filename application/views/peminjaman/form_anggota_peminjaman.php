<?php
$tgl_pinjam = date('Y-m-d');

$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$tgl_kembali = date('Y-m-d', $tujuh_hari);
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>peminjaman/simpan" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id Peminjaman</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pm" value="<?= $id_pm; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Peminjam</label>
                <div class="col-sm-10">
                    <select name="id_anggota" class="form-control select2" required>
                        <option value="">Peminjam</option>
                        <?php foreach ($peminjam as $row) { ?>
                            <option value="<?= $row->id_anggota; ?>"><?= $row->nama_anggota; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Id Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="id_buku" class="form-control" placeholder="Id Buku" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi</label>
            <div class="col-sm-10">
                <select name="status" class="form-control">
                    <option value="pinjam">Pinjam</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="<?= base_url() ?>dashboard" class="btn btn-warning">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
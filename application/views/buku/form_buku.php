<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>buku/simpan" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id Buku</label>
                <div class="col-sm-10">
                    <input type="text" name="id_buku" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Judul buku</label>
                <div class="col-sm-10">
                    <input type="text" name="judul_buku" class="form-control" placeholder="Judul buku" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <select name="id_pengarang" class="form-control select2" required>
                        <option value="">Pilih Pengarang</option>
                        <?php foreach ($pengarang as $row) { ?>
                            <option value="<?= $row->id_pengarang; ?>"><?= $row->nama_pengarang; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <select name="id_penerbit" class="form-control select2" required>
                        <option value="">Pilih Penerbit</option>
                        <?php foreach ($penerbit as $row) { ?>
                            <option value="<?= $row->id_penerbit; ?>"><?= $row->nama_penerbit; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <select name="tahun_terbit" class="form-control select2" required>
                        <option value="">Pilih Tahun</option>
                        <?php for ($tahun = 2000; $tahun <= 2022; $tahun++) { ?>
                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="<?= base_url() ?>buku" class="btn btn-warning">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
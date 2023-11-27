<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>anggota/update" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="id_anggota" value="<?= $data['id_anggota']; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_anggota" value="<?= $data['nama_anggota']; ?>" class="form-control" placeholder="Nama Anggota" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-control" required>
                        <?php
                        if ($data['gender' == "Laki-laki"]) { ?>
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        <?php } else { ?>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                        <?php }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" cols="30" rows="10" required><?= $data['alamat']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">NO.Telp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" class="form-control" placeholder="NO.Telp" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update</button>
            <a href="<?= base_url() ?>anggota" class="btn btn-warning">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
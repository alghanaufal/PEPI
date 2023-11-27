<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="<?= base_url() ?>pengarang/update" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Id Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pengarang" value="<?= $data['id_pengarang'] ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pengarang" value="<?= $data['nama_pengarang'] ?>" class="form-control" placeholder="Nama Pengarang" required>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Update</button>
            <a href="<?= base_url() ?>pengarang" class="btn btn-warning">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
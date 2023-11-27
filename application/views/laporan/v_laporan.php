<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <form action="<?= base_url() ?>laporan/peminjaman">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="text-primary"><b>Filter Laporan Peminjaman</b></h4>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal" onfocus="(this.type = 'date')">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir" onfocus="(this.type = 'date')">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">Filter</button>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>laporan/refresh" class="btn btn-warning btn-block">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class=" card-body">
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
</body>

</html>
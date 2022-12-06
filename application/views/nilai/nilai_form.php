<section class="content-header">
    <h1>PENILAIAN</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Penilaian</a></li>
        <li class="active">Data Penilaian</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Berikan Penilaian</h3>
            <div class="pull-right">
                <a href="<?= site_url('nilai') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
            </div>
            <br>
        </div>
        <form action="<?= site_url('nilai/beri_nilai') ?>" method="post">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Ekskul</th>
                            <th>Semester</th>
                            <th>Jumlah Absen</th>
                            <th>Nilai Absen</th>
                            <th>Nilai Tes</th>
                            <th>Total</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get->result() as $nilai => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-xs-1">
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table><br>
                <div class="form-group pull-right">
                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan Nilai</button>
                </div>
            </div>
        </form>
    </div>
</section>
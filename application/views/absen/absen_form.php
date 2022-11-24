<section class="content-header">
    <h1>
        Tambah Absen
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Absen</a></li>
        <li class="active">Tambah Data Absen</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Absen</h3>
            <div class="pull-right">
                <a href="<?= site_url('absen') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
            </div>
            <br>
        </div>
        <form action="<?= site_url('absen/process') ?>" method="post">
            <!-- <div class="form-group">
                <label>Tanggal Absen :</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            <!-- </div> -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Ekskul</th>
                            <th>Status Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $absen => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td>
                                    <select class="form-control" name="status_absen">
                                        <option value="">-- Pilih --</option>
                                        <option value="Hadir">Hadir </option>
                                        <option value="Ijin">Ijin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table><br>
                <div class="form-group pull-right">
                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan Absen</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

<script>
    $('.datepicker').datepicker({
        autoclose: 1,
    })
</script>
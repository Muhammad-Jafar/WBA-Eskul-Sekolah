<section class="content-header">
    <h1>PENILAIAN</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Penilaian</a></li>
        <li class="active">Beri Penilaian</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Silahkan Lengkapi penilaian berikut</h3>
            <div class="pull-right"><a href="<?= site_url('nilai') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="id_level" value="<?= $this->session->userdata('user_type'); ?>">
                <div class="box-header">
                    <div class="box-body col-md-4 col-md-offset-4">
                        <dl class="dl-horizontal">
                            <dt>Nama</dt>
                            <dd><?= $row->nama_siswa ?></dd>
                            <dt>Kelas</dt>
                            <dd><?= $row->kelas ?></dd>
                            <dt>Jurusan</dt>
                            <dd><?= $row->jurusan ?></dd>
                            <dt>Semester</dt>
                            <dd><?= $row->semester ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <form action="" method="post">
                            <input type="hidden" name="id_pendaftaran" value="<?= $row->id_pendaftaran; set_value('id_pendaftaran'); ?>" class="form-control">
                                <div class="form-group  <?= form_error('nilai_presensi') ? 'has-error' : null ?>">
                                    <label>Presentase Nilai Presensi</label>
                                    <div class="input-group">
                                        <input type="text" name="nilai_presensi" value="<?= $row->nilai_presensi; set_value('nilai_presensi') ?>" class="form-control">
                                        <span class="input-group-addon">% (Dalam persen)</span>
                                    </div>
                                    <?= form_error('nilai_presensi') ?>
                                </div>
                                <div class="form-group <?= form_error('total_nilai_ujian') ? 'has-error' : null ?>">
                                    <label>Total Nilai Ujian</label>
                                    <input type="text" name="total_nilai_ujian" value="<?= $row->total_nilai_ujian; set_value('total_nilai_ujian') ?>" class="form-control">
                                    <?= form_error('total_nilai_ujian') ?>
                                </div>
                                <div class="form-group <?= form_error('nilai_ujian') ? 'has-error' : null ?>">
                                    <label>Presentase Nilai Ujian</label>
                                    <div class="input-group">
                                        <input type="text" name="nilai_ujian" value="<?= $row->nilai_ujian; set_value('nilai_ujian') ?>" class="form-control">
                                        <span class="input-group-addon">% (Dalam persen)</span>
                                    </div>
                                    </div>
                                <div class="form-group <?= form_error('total') ? 'has-error' : null ?>">
                                    <label>Total Presentase Penilaian</label>
                                    <input type="text" name="total" value="<?= $row->total; set_value('total') ?>" class="form-control">
                                    <?= form_error('total') ?>
                                </div>
                                <div class="form-group <?= form_error('predikat') ? 'has-error' : null ?>">
                                    <label>Pilih Predikat Nilai</label>
                                    <select name="predikat" value="<?= set_value('predikat') ?>" class="form-control">
                                        <option disable selected>Silahkan Pilih Jenis Predikat Nilai</option>
                                        <option value="E" <?=( ($row->predikat == 'E') ? 'selected' : '');?>>Predikat E</option>
                                        <option value="D" <?=( ($row->predikat == 'D') ? 'selected' : '');?>>Predikat D</option>
                                        <option value="C" <?=( ($row->predikat == 'C') ? 'selected' : '');?>>Predikat C</option>
                                        <option value="B" <?=( ($row->predikat == 'B') ? 'selected' : '');?>>Predikat B</option>
                                        <option value="A" <?=( ($row->predikat == 'A') ? 'selected' : '');?>>Predikat A</option>
                                    </select>
                                    <?= form_error('predikat') ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger"> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

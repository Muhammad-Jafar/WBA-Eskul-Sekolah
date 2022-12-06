<section class="content-header">
    <h1>PERBARUI DATA SISWA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Siswa</a></li>
        <li class="active">Perbarui Data Siswa</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Silahkan perbarui data berikut</h3>
            <div class="pull-right"><a href="<?= site_url('siswa') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="id_siswa" value="<?= $row->id_siswa; set_value('id_siswa'); ?>" class="form-control">
                <input type="hidden" name="id_level" value="<?= $this->session->userdata('user_type'); ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  <?= form_error('nama_siswa') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_siswa" value="<?= $row->nama_siswa; set_value('nama_siswa'); ?>" class="form-control">
                                    <?= form_error('nama_siswa') ?>
                                </div>
                            </div>
                            <div class="form-group <?= form_error('nis') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Nomor Induk Siswa (NIS)</label>
                                <div class="col-sm-9">
                                    <input type="number" name="nis" value="<?= $row->nis; set_value('nis') ?>" class="form-control">
                                    <?= form_error('nis') ?>
                                </div>
                            </div>
                            <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" value="<?= $row->jenis_kelamin; set_value('jenis_kelamin') ?>" class="form-control">
                                        <option disabled selected> -- Silahkan Pilih Jenis Kelamin -- </option>
                                        <option value="Laki-laki" <?=( ($row->jenis_kelamin=='Laki-laki') ? 'selected' : '');?>>Laki-laki</option>
                                        <option value="Perempuan" <?=( ($row->jenis_kelamin=='Perempuan') ? 'selected' : '');?>>Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= form_error('kelas') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Kelas</label>
                                <div class="col-sm-9">
                                    <select name="kelas" value="<?= $row->kelas; set_value('kelas') ?>" class="form-control">
                                        <option disabled selected>-- Silahkan Pilih Kelas -- </option>
                                        <option value="X" <?=( ($row->kelas=='X') ? 'selected' : '');?>>X</option>
                                        <option value="XI" <?=( ($row->kelas=='XI') ? 'selected' : '');?>>XI</option>
                                        <option value="XII" <?=( ($row->kelas=='XII') ? 'selected' : '');?>>XII</option>
                                    </select>
                                    <?= form_error('kelas') ?>
                                </div>
                            </div>
                            <div class="form-group <?= form_error('ttl') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ttl" value="<?= $row->ttl; set_value('ttl') ?>" class="form-control">
                                    <?= form_error('ttl') ?>
                                </div>
                            </div>
                            <div class="form-group <?= form_error('no_hp') ? 'has-error' : null ?>">
                                <label class="col-sm-3 control-label">Nomor Kontak</label>
                                <div class="col-sm-9">
                                    <input type="number" name="no_hp" value="<?= $row->no_hp; set_value('no_hp') ?>" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                <label>Username*</label>
                                <input type="text" name="username" value="<?= $row->username; set_value('username') ?>" class="form-control">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                <label>Password*</label>
                                <input type="password" name="password" value="<?= $row->password; set_value('password') ?>" class="form-control">
                                <?= form_error('password') ?>
                            </div> -->
                            </div>
                    </div>
                </div>
                <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                    <button type="reset" class="btn btn-danger"> Reset</button>
                </div>
            </form>
        </div>
    </div>
</section>
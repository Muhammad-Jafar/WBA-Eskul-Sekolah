<section class="content-header">
    <h1>IMPOR DATA SISWA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Siswa</a></li>
        <li class="active">Impor Data Siswa</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Silahkan impor data disini</h3>
            <div class="pull-right"><a href="<?= site_url('siswa') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></div>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="id_level" value="<?= $this->session->userdata('user_type'); ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header with-border"><h3 class="box-title"> Data Pribadi</h3></div>
                                <div class="box-body">
                                    <div class="form-group  <?= form_error('nama_siswa') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_siswa" value="<?= set_value('nama_siswa') ?>" class="form-control">
                                            <?= form_error('nama_siswa') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('ttl') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ttl" value="<?= set_value('ttl') ?>" class="form-control">
                                            <?= form_error('ttl') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>" class="form-control">
                                                <option disabled selected>Silahkan Pilih Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                            <?= form_error('jenis_kelamin') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('no_hp') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Nomor Kontak</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="no_hp" value="<?= set_value('no_hp') ?>" class="form-control" data-inputmask='"mask": "(08) 22-9364-2503"' data-mask>
                                            </div>
                                            <!-- <input type="number" name="no_hp" value="<?= set_value('no_hp') ?>" class="form-control"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header with-border"><h3 class="box-title">Data Sekolah</h3></div>
                                <div class="box-body">
                                    <div class="form-group <?= form_error('nis') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Nomor Induk Siswa (NIS)</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="nis" value="<?= set_value('nis') ?>" class="form-control">
                                            <?= form_error('nis') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('kelas') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Kelas</label>
                                        <div class="col-sm-9">
                                            <select name="kelas" value="<?= set_value('kelas') ?>" class="form-control">
                                                <option disabled selected>Silahkan Pilih Kelas</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>
                                            <?= form_error('kelas') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('jurusan') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Jurusan</label>
                                        <div class="col-sm-9">
                                            <select name="jurusan" value="<?= set_value('jurusan') ?>" class="form-control">
                                                <option disabled selected>Silahkan Pilih Jurusan</option>
                                                <option value="IPA-1">IPA 1</option>
                                                <option value="IPA-2">IPA 2</option>
                                                <option value="IPS-1">IPS 1</option>
                                                <option value="IPS-2">IPS 2</option>
                                            </select>
                                            <?= form_error('jurusan') ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header"><h3 class="box-title">Data Akun</h3></div>
                                <div class="box-body">
                                    <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">   
                                            </div>
                                            <?= form_error('username') ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                        <label class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                                            </div>
                                            <?= form_error('password') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"> Reset</button>
                </div>
            </form>
              
        </div>
    </div>
</section>
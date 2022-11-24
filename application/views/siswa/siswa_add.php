<section class="content-header">
    <h1>TAMBAH DATA SISWA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Siswa</a></li>
        <li class="active">Tambah Data Siswa</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lengkapi data berikut</h3>
            <div class="pull-right"><a href="<?= site_url('siswa') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i>Back</a></div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group  <?= form_error('nama_siswa') ? 'has-error' : null ?>">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_siswa" value="<?= set_value('nama_siswa') ?>" class="form-control">
                            <?= form_error('nama_siswa') ?>
                        </div>
                        <div class="form-group <?= form_error('nis') ? 'has-error' : null ?>">
                            <label>Nomor Induk Siswa (NIS)</label>
                            <input type="number" name="nis" value="<?= set_value('nis') ?>" class="form-control">
                            <?= form_error('nis') ?>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>" class="form-control">
                                <option disabled selected>Silahkan Pilih Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin') ?>
                        </div>
                        <div class="form-group <?= form_error('kelas') ? 'has-error' : null ?>">
                            <label>Kelas</label>
                            <select name="kelas" value="<?= set_value('kelas') ?>" class="form-control">
                                <option disabled selected>Silahkan Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            <?= form_error('kelas') ?>
                        </div>
                        <div class="form-group <?= form_error('ttl') ? 'has-error' : null ?>">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" name="ttl" value="<?= set_value('ttl') ?>" class="form-control">
                            <?= form_error('ttl') ?>
                        </div>
                        <div class="form-group <?= form_error('no_hp') ? 'has-error' : null ?>">
                            <label>Nomor Kontak</label>
                            <input type="number" name="no_hp" value="<?= set_value('no_hp') ?>" class="form-control">
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <input type="hidden" name="id_level" value="<?= $this->session->userdata('user_type'); ?>">

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn btn-danger btn-flat"> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
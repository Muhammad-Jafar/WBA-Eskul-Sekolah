<section class="content-header">
    <h1>PERBARUI DATA PEMBINA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Pembina</a></li>
        <li class="active">Perbarui Data Pembina</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Silahkan Perbarui data berikut</h3>
            <div class="pull-right"><a href="<?= site_url('pembina') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a></div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                    <input type="hidden" name="id_pembina" value="<?= $row->id_pembina; set_value('id_pembina'); ?>" class="form-control">
                        <div class="form-group  <?= form_error('nama_pembina') ? 'has-error' : null ?>">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_pembina" value="<?= $row->nama_pembina; set_value('nama_pembina') ?>" class="form-control">
                            <?= form_error('nama_pembina') ?>
                        </div>
                        <div class="form-group <?= form_error('nip') ? 'has-error' : null ?>">
                            <label>Nomor Induk Pegawai (NIP)</label>
                            <input type="number" name="nip" value="<?=  $row->nip;  set_value('nip') ?>" class="form-control">
                            <?= form_error('nip') ?>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : null ?>">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" value="<?= $row->jenis_kelamin; set_value('jenis_kelamin') ?>" class="form-control">
                                <option disabled selected>Silahkan Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?=( ($row->jenis_kelamin=='Laki-laki') ? 'selected' : '');?>>Laki-laki</option>
                                <option value="Perempuan" <?=( ($row->jenis_kelamin=='Perempuan') ? 'selected' : '');?>>Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin') ?>
                        </div>
                        <div class="form-group <?= form_error('no_hp') ? 'has-error' : null ?>">
                            <label>Nomor Kontak</label>
                            <input type="number" name="no_hp" value="<?= $row->no_hp; set_value('no_hp') ?>" class="form-control">
                        </div>
                        <div class="form-group <?= form_error('id_ekskul') ? 'has-error' : null ?>">
                            <label>Jenis Ekstrakurikuler</label>
                            <select name="id_ekskul" value="<?= $row->id_ekskul; set_value('id_ekskul') ?>" class="form-control">
                              <option disabled selected>Silahkan Pilih Jenis Eskul</option>
                              <?php foreach($jenis_eskul as $eskul) : ?>
                                <option value="<?=$row->id_ekskul;?>" <?=( ($row->id_ekskul==$eskul->id_ekskul) ? 'selected' : '');?>><?=$eskul->nama_ekskul;?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_ekskul') ?>
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
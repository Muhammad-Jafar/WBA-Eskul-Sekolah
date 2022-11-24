<section class="content-header">
    <h1>
        Pendaftaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Pendaftaran</a></li>
        <li class="active"><?= $page ?> Pendaftaran</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $page ?> Pendaftaran</h3>
            <div class="pull-right">
                <a href="<?= site_url('pendaftaran') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('pendaftaran/process') ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id_pendaftaran" value="<?= $row->id_pendaftaran ?>">
                            <input type="hidden" name="id_siswa" value="<?= $this->session->userdata('user_id'); ?>">

                            <label>Ekstrakurikuler*</label>
                            <select name="ekstrakurikuler" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($ekstrakurikuler->result() as $key => $data) { ?>
                                    <option value="<?= $data->id_ekskul ?>"> <?= $data->nama_ekskul  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
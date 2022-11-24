<section class="content-header">
    <h1>
        Ekstrakurikuler
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Ekstrakurikuler</a></li>
        <li class="active"><?= $page ?> Ekstrakurikuler</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $page ?> Esktrakurikuler</h3>
            <div class="pull-right">
                <a href="<?= site_url('ekstrakurikuler') ?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('ekstrakurikuler/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Ekstrakurikuler*</label>
                            <input type="hidden" name="id_ekskul" value="<?= $row->id_ekskul ?>">
                            <input type="text" name="nama_ekskul" value="<?= $row->nama_ekskul ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jadwal*</label><small> (Contoh : minggu, 07.00 - 08.00)</small>
                            <input type="text" name="jadwal" value="<?= $row->jadwal ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat*</label>
                            <input type="text" name="tempat" value="<?= $row->tempat ?>" class="form-control" required>
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
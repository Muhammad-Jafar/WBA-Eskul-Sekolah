<section class="content-header">
    <h1>INFORMASI / BERITA</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Berita</a></li>
        <li class="active"><?= $page ?> Berita</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $page ?>  Informasi / Berita</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('berita/process') ?>" method="post">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul berita atau artikel" value="<?= $row->judul ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Detil Informasi</label>
                            <input type="text" name="keterangan" value="<?= $row->keterangan ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

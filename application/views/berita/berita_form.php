<section class="content-header">
    <h1>
        Tambah Berita
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Berita</a></li>
        <li class="active"><?= $page ?> Berita</li>
    </ol>
</section>

<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Judul</h3>
        </div>

        <form action="<?= site_url('berita/process') ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">
                        <input type="hidden" name="id_berita" value="<?= $row->id_berita ?>">
                        <input type="text" name="judul" class="form-control" placeholder="Judul berita atau artikel" value="<?= $row->judul ?>" required>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
    </div>
    <!-- /.box -->

    <div class="row">
        <div class="col-md-8">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Keterangan</h3>
                </div>
                <div class="box-body">

                    <textarea id="ckeditor" name="keterangan" value="<?= $row->keterangan ?>" required></textarea>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Pengaturan Lainnya</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control select2" name="xkategori" style="width: 100%;">
                            <option value="">-Pilih-</option>
                            <option value="1">Biografi</option>
                            <option value="2">Teknologi</option>
                            <option value="3">Tips and Triks</option>
                            <option value="5">Penelitian</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="text" name="gambar" style="width: 100%;" value="<?= $row->gambar ?>" required>
                    </div>
                    <!-- /.form group -->


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </form>

            <!-- /.box -->
        </div>
        <!-- /.col (right) -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->

<script src="<?= base_url() ?>assets/bower_components/ckeditor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>
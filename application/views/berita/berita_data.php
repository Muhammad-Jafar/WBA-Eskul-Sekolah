<section class="content-header">
    <h1>
        Berita
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Berita</a></li>
        <li class="active">Data Berita</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Berita</h3>
            <div class="pull-right">
                <a href="<?= site_url('berita/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah data</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Tanggal Pos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $berita => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->judul ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td><?= $data->gambar ?></td>
                            <td><?= $data->tanggal_pos ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('berita/delete') ?>" method="post">
                                    <a href="<?= site_url('berita/edit/' . $data->id_berita) ?>" class="btn btn-primary btn-s"><i class="fa fa-pencil"></i></a>

                                    <input type="hidden" name="id_berita" value="<?= $data->id_berita ?>">
                                    <button onclick="return confirm('apakah anda ingin menghapus data ini ?')" class="btn btn-danger btn-s"><i class="fa fa-trash"></i></a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
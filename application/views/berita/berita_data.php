<section class="content-header">
    <h1>Berita</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Berita</a></li>
        <li class="active">Data Berita</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Berita</h3>
            <div class="pull-right">
                <a href="<?= site_url('berita/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Berita</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped text-center" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Deskripsi Berita</th>
                        <th>Tanggal Pos</th>
                        <th>ID</th>
                        <th>Aktivitas</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($row->result() as $berita => $data) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->judul ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td><?= $data->tanggal_pos ?></td>
                            <td><?= $data->id_berita ?></td>
                            <td width="22%">
                                <?php if ($data->status_berita == 'Usai') : ?>
                                    <a href="#" class="btn btn-default disabled"><i class="fa fa-check"> ditampilkan</i></a>
                                    <a href="<?= site_url('berita/hide/' . $data->id_berita) ?>" class="btn btn-danger"><i class="fa fa-close"> Sembunyikan</i></a>
                                <?php else: ?>
                                    <a href="<?= site_url('berita/show/' . $data->id_berita) ?>" class="btn btn-default"><i class="fa fa-check"> Tampilkan</i></a>
                                    <a href="#" class="btn btn-danger disabled"><i class="fa fa-close"> disembunyikan</i></a>
                                <?php endif; ?>
                            </td>
                            <td width="10%">
                                <form action="<?= site_url('berita/delete') ?>" method="post">
                                    <a href="<?= site_url('berita/edit/' . $data->id_berita) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <input type="hidden" name="id_berita" value="<?= $data->id_berita ?>">
                                    <button onclick="return confirm('apakah anda ingin menghapus data ini ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
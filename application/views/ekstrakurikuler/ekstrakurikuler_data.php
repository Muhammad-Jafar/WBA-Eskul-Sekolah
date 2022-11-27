<section class="content-header">
    <h1>
        Ekstrakurikuler
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Ekstrakurikuler</a></li>
        <li class="active">Data Ekstrakurikuler</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Ekstrakurikuler</h3>
            <div class="pull-right">
                <a href="<?= site_url('ekstrakurikuler/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
                <a href="<?= site_url('ekstrakurikuler/cetak') ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak data</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Jadwal</th>
                        <th>Tempat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $ekskul => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nama_ekskul ?></td>
                            <td><?= $data->jadwal ?></td>
                            <td><?= $data->tempat ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('ekstrakurikuler/delete') ?>" method="post">
                                    <a href="<?= site_url('ekstrakurikuler/edit/' . $data->id_ekskul) ?>" class="btn btn-primary btn-s"><i class="fa fa-pencil"></i></a>

                                    <input type="hidden" name="id_ekskul" value="<?= $data->id_ekskul ?>">
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
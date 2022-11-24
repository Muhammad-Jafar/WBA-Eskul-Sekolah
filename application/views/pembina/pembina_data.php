<section class="content-header">
    <h1>Data Pembina</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Pembina</a></li>
        <li class="active"> Data Pembina</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Seluruh Pembina</h3>
            <div class="pull-right">
                <a href="<?= site_url('pembina/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-user-plus"></i> Tambah data</a>
                <a href="<?= site_url('pembina/cetak') ?>" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Cetak data</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Kontak</th>
                        <th>Jenis Eskul</th>
                        <th>Username</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $pembina => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nama_pembina ?></td>
                            <td><?= $data->nip ?></td>
                            <td><?= $data->jenis_kelamin ?></td>
                            <td><?= $data->no_hp ?></td>
                            <td><?= $data->nama_ekskul ?></td>
                            <td><?= $data->username ?></td>

                            <td class="text-center" width="160px">
                                <form action="<?= site_url('pembina/delete') ?>" method="post">
                                    <a href="<?= site_url('pembina/edit/' . $data->id_pembina) ?>" class="btn btn-primary btn-s"><i class="fa fa-pencil"></i></a>

                                    <input type="hidden" name="id_pembina" value="<?= $data->id_pembina ?>">
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
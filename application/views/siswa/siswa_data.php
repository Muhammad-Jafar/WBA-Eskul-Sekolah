<section class="content-header">
    <h1>Data Siswa</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Siswa</a></li>
        <li class="active"> Data Siswa</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Seluruh Siswa</h3>
            <div class="pull-right">
                <dl class="dl-horizontal">
                    <?= form_open_multipart('siswa/import') ?>
                        <dt><button type="submit" class="btn btn-success"><i class="fa fa-table"></i> Import</button></dt>
                        <dd><input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx,.xls"></dd>
                    <?= form_close(); ?>
                    <dt><a href="<?= site_url('siswa/cetak') ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak data</a></dt>
                    <dd><a href="<?= site_url('siswa/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a></dd>
                </dl> 
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>TTL</th>
                        <th>No Hp</th>
                        <th>Username</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($row->result() as $siswa => $data) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nama_siswa ?></td>
                            <td><?= $data->nis ?></td>
                            <td><?= $data->kelas ?></td>
                            <td><?= $data->jurusan ?></td>
                            <td><?= $data->jenis_kelamin ?></td>
                            <td><?= $data->ttl ?></td>
                            <td><?= $data->no_hp ?></td>
                            <td><?= $data->username ?></td>
                            <td class="text-center">
                                <form action="<?= site_url('siswa/delete') ?>" method="post">
                                    <a href="<?= site_url('siswa/edit/' . $data->id_siswa) ?>" class="btn btn-primary btn-s"><i class="fa fa-pencil"></i></a>
                                    <input type="hidden" name="id_siswa" value="<?= $data->id_siswa ?>">
                                    <button onclick="return confirm('apakah anda ingin menghapus data ini ?')" class="btn btn-danger btn-s"><i class="fa fa-trash"></i></a>
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
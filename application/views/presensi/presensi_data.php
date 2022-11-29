<?php if ($this->session->userdata('user_type') == 'pembina') { ?>
    <section class="content-header">
        <h1>PRESENSI SISWA</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Presensi Siswa</a></li>
            <li class="active">Data Presensi Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Presensi Siswa</h3>
                <div class="pull-right">
                    <a href="<?= site_url('absen/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Presensi</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Ekskul</th>
                            <th>Status Presensi</th>
                            <th>Tanggal Presensi</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $absen => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->status_absen ?></td>
                                <td><?= $data->tanggal_absen ?></td>
                                <td class="text-center" width="160px">
                                    <form action="<?= site_url('absen/delete') ?>" method="post">
                                        <a href="<?= site_url('absen/edit/' . $data->id_absen) ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah Status</a>

                                        <input type="hidden" name="id_absen" value="<?= $data->id_absen ?>">

                                        <button onclick="return confirm('apakah anda ingin menghapus data ini ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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
<?php } ?>

<?php if ($this->session->userdata('user_type') == 'siswa') { ?>
    <section class="content-header">
        <h1>PRESENSI KEHADIRAN</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Presensi</a></li>
            <li class="active">Daftar Presensi</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Presensi</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Jadwal</th>
                            <th>Tempat</th>
                            <th>Status Absen</th>
                            <th>Tanggal Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_absen->result() as $absen => $data) { ?>
                            <tr>
                                <input type="hidden" name="id_absen" value="<?= $data->id_absen ?>">
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->jadwal ?></td>
                                <td><?= $data->tempat ?></td>
                                <td><?= $data->status_absen ?></td>
                                <td><?= $data->tanggal_absen ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php } ?>
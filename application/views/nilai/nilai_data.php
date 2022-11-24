<?php if ($this->session->userdata('user_type') == 'pembina') { ?>
    <section class="content-header">
        <h1>
            Nilai
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Nilai</a></li>
            <li class="active">Data Nilai</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Nilai</h3>
                <div class="pull-right">
                    <a href="<?= site_url('nilai/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Nilai</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Ekskul</th>
                            <th>Jumlah Absen</th>
                            <th>Nilai Absen</th>
                            <th>Nilai Tes</th>
                            <th>Total</th>
                            <th>Predikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $nilai => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->semester ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->jumlah_absen ?></td>
                                <td><?= $data->nilai_absen ?></td>
                                <td><?= $data->nilai_tes ?></td>
                                <td><?= $data->total ?></td>
                                <td><?= $data->predikat ?></td>
                                <td class="text-center" width="160px">
                                    <form action="<?= site_url('nilai/delete') ?>" method="post">
                                        <a href="<?= site_url('nilai/edit/' . $data->id_nilai) ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah Status</a>

                                        <input type="hidden" name="id_nilai" value="<?= $data->id_nilai ?>">
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
        <h1>
            Nilai
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Nilai</a></li>
            <li class="active">Data Nilai</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Nilai</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ekskul</th>
                            <th>Semester</th>
                            <th>Jumlah Absen</th>
                            <th>Nilai Absen</th>
                            <th>Nilai Tes</th>
                            <th>Total</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_nilai->result() as $nilai => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->semester ?></td>
                                <td><?= $data->jumlah_absen ?></td>
                                <td><?= $data->nilai_absen ?></td>
                                <td><?= $data->nilai_tes ?></td>
                                <td><?= $data->total ?></td>
                                <td><?= $data->predikat ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php } ?>
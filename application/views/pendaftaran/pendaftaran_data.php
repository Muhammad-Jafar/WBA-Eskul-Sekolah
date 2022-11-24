<?php if ($this->session->userdata('user_type') == 'pembina') { ?>
    <section class="content-header">
        <h1>
            Pendaftaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Pendaftaran</a></li>
            <li class="active">Data Pendaftaran</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pendaftaran</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Ekstrakurikuler</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th>Confirm Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $pendaftaran => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td>
                                    <?php if ($data->status_pendaftaran == 0) { echo '<span class="badge bg-yellow">Belum seleksi</span>'; }
                                    else { echo '<span class="badge bg-green">Lulus seleksi</span>'; } ?>
                                </td>
                                <td><?= $data->tanggal_pendaftaran ?></td>
                                <td>
                                    <form action="<?= site_url('pendaftaran/edit_status/' . $data->id_pendaftaran) ?>" class="btn btn-success btn-xs"><i class="fa fa-gear"> Ubah Status</form>
                                </td>
                                <td class="text-center" width="160px">
                                    <form action="<?= site_url('pendaftaran/delete') ?>" method="post">
                                        <a href="<?= site_url('pendaftaran/edit/' . $data->id_pendaftaran) ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>

                                        <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">

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
            Ekstrakurikuler
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Ekstrakurikuler</a></li>
            <li class="active">Daftar Ekstrakurikuler</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Maksimal mengikuti 3 ekstrakurikuler !!</h3>
                <div class="pull-right">
                    <a href="<?= site_url('pendaftaran/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Daftar</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ekstrakurikuler</th>
                            <th>Jadwal</th>
                            <th>Tempat</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_pendaftaran->result() as $pendaftaran => $data) { ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->jadwal ?></td>
                                <td><?= $data->tempat ?></td>
                                <td>
                                    <?php if ($data->status_pendaftaran == 0) {
                                        echo '<span class="badge bg-yellow">Belum seleksi</span>';
                                    } else {
                                        echo '<span class="badge bg-green">Lulus seleksi</span>';
                                    } ?>
                                </td>
                                <td><?= $data->tanggal_pendaftaran ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php } ?>
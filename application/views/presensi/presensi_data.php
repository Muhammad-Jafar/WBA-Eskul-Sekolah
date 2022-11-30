<?php if ($this->session->userdata('user_type') == 'pembina') : ?>
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
                <h3 class="box-title">Daftar Presensi Siswa </h3>
                <div class="pull-right">
                    <a href="<?= site_url('presensi/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Presensi</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>Nomor Presensi</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($set_presensi->result() as $presensi => $data) : ?>
                            <tr>
                                <?php if ($check_presensi = 1) : ?>
                                    <td> Pertemuan ke - 1 </td>
                                <?php elseif ($check_presensi > 1) : ?>
                                    <td> Pertemuan ke - <?= $check_presensi++; ?></td>
                                <?php endif; ?>
                                <!-- <td><?= $no++ ?></td> -->
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td class="text-center" width="12%">
                                    <a href="<?= site_url('pendaftaran/accept/' . $data->id_pendaftaran) ?>" class="btn btn-success btn-s"><i class="fa fa-check"> Hadir</i></a>
                                    <a href="<?= site_url('pendaftaran/reject/' . $data->id_pendaftaran) ?>" class="btn btn-danger btn-s"><i class="fa fa-close"> Tidak</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($this->session->userdata('user_type') == 'siswa') : ?>
    <section class="content-header">
        <h1>PRESENSI KEHADIRAN</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Presensi</a></li>
            <li class="active">Daftar Presensi</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header"><h3 class="box-title">Daftar Presensi</h3></div>
            <div class="box-body">
                <ul class="nav nav-tabs">
                    <?php foreach ($get_eskul as $eskul => $data) : ?>
                        <li class="<?php ($data->nama_ekskul == "Pramuka") ? "active" : ""; ?>"><a href="#" data-toggle="tab"><?= $data->nama_ekskul ?></a></li>
                    <?php endforeach; ?>
                    <!-- <li class=""><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> -->
                    <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="nama_eskul">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nomor Presensi</th>
                                        <th>Jenis Ekstrakurikuler</th>
                                        <th>Tanggal Presensi</th>
                                        <th>Status Presensi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($get_presensi as $absen => $data) : ?>
                                        <tr>
                                            <td> Presensi ke - <?= $no++?></td>
                                                <td><?= $data->nama_ekskul ?></td>
                                                <td><?= $data->tgl_presensi ?></td>
                                                <?php if ($data->status_presensi == 'Hadir' ) : ?>
                                                    <td> <label><badge class="badge bg-green"><i class="fa fa-check bg-green"></i></badge> 
                                                    <?= $data->status_presensi ?></label> </td>
                                                <?php else : ?>
                                                    <td> <label><badge class="badge bg-red"><i class="fa fa-close bg-red"></i></badge> 
                                                    <?= $data->status_presensi ?></label> </td>
                                                <?php endif; ?>
                                                <?php if ($data->ket_presensi == null) : ?>
                                                    <td> Tidak ada keterangan </td>  
                                                <?php else : ?>
                                                    <td><?= $data->ket_presensi ?></td>
                                                <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
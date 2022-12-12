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
            <div class="box-header with-border">
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
                            <th>Jurusan</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Data</th>
                            <th>Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($set_presensi->result() as $presensi => $data) : 
                            $tgl_presensi = new DateTime($data->tgl_presensi);
                            $tgl_sekarang = new DateTime(); 
                        ?>
                            <tr>
                                <td> Presensi ke- <?= $no++ ?> </td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->jurusan ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td width="12%">
                                    <?php if ( $tgl_sekarang > $tgl_presensi ) : ?>
                                        <a onclick="return confirm('Presensi sudah dilakukan minggu ini !')" class="btn btn-default btn-s"><i class="fa fa-check"> Hadir</i></a>
                                        <a onclick="return confirm('Presensi sudah dilakukan minggu ini!')" class="btn btn-default btn-s"><i class="fa fa-close"> Tidak</i></a>
                                    <?php else : ?>
                                        <a href="<?= site_url('presensi/present/' . $data->id_presensi) ?>" class="btn btn-success btn-s"><i class="fa fa-check"> Hadir</i></a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-s dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-close"> Tidak</i> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= site_url('presensi/absen_izin/' . $data->id_presensi) ?>">Izin</a></li>
                                                <li><a href="<?= site_url('presensi/absen_sakit/' . $data->id_presensi) ?>">Sakit</a></li>
                                                <li><a href="<?= site_url('presensi/absen_lainlain/' . $data->id_presensi) ?>">Lain-lain</a></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                 </td>
                                 <td width="10%">
                                    <?php if ( $tgl_sekarang > $tgl_presensi ) : ?>
                                        <a class="btn btn-default btn-s disabled"><i class="fa fa-check"> Presensi ditambahkan</i></a>
                                    <?php else : ?>
                                        <a href="<?= site_url('presensi/set_presensi/' . $data->id_pendaftaran) ?>" class="btn btn-default btn-s"><i class="fa fa-plus"> Tambah Presensi</i></a>
                                    <?php endif; ?>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Nomor Presensi</th>
                                <th>Jenis Ekstrakurikuler</th>
                                <th>Tanggal Presensi</th>
                                <th>Status Presensi</th>
                                <th>Keterangan </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($get_presensi as $absen => $data) : ?>
                                <tr>
                                    <td> Presensi ke - <?= $no++?></td>
                                    <td><?= $data->nama_ekskul ?></td>
                                    <td><?= $data->tgl_presensi ?></td>
                                    <?php if ($data->status_presensi == 'Hadir' ) : ?>
                                        <td> 
                                            <label><badge class="badge bg-green"><i class="fa fa-check bg-green"></i></badge> 
                                            <?= $data->status_presensi ?></label> 
                                        </td>
                                    <?php elseif ($data->status_presensi == 'Tidak Hadir') : ?>
                                        <td> 
                                            <label><badge class="badge bg-red"><i class="fa fa-close bg-red"></i></badge> 
                                            <?= $data->status_presensi ?></label> 
                                        </td>
                                    <?php else : ?>
                                        <td>
                                            <label><badge class="badge bg-yellow"><i class="fa fa-minus bg-yellow"></i></badge> 
                                            <?= $data->status_presensi ?></label> 
                                        </td>
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
    </section>
<?php endif; ?>

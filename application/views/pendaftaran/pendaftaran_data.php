<?php if ($this->session->userdata('user_type') == 'pembina') : ?>
    <section class="content-header">
        <h1>EKSTRAKURIKULER</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Ekstrakurikuler</a></li>
            <li class="active">Data Siswa Pendaftaran Ekstrakurikuler</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header"><h3 class="box-title">Data Pendaftar Ekstrakurikuler</h3></div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Status Seleksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($row->result() as $pendaftaran => $data) : ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= date_format( date_create($data->tanggal_pendaftaran), 'd - M - Y');  ?></td>
                                <td class="text-center " width="10px">
                                    <form action="<?= site_url('pendaftaran/accept') ?>" method="post">
                                        <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                        <button class="btn btn-success btn-s"><i class="fa fa-check"> Terima</i></a>
                                    </form>
                                </td>
                                <td class="text-center " width="10px">
                                    <form action="<?= site_url('pendaftaran/reject') ?>" method="post">
                                        <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                                        <button class="btn btn-danger btn-s"><i class="fa fa-close"> Tolak</i></a>
                                    </form>
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
        <h1>EKSTRAKURIKULER</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Ekstrakurikuler</a></li>
            <li class="active">Daftar Ekstrakurikuler</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Catatan: maksimal mengikuti 3 ekstrakurikuler</h3>
                <div class="pull-right">
                        <?php if($cek == 3) : ?>
                            <p>Maksimal terpenuhi</p>
                        <?php else : ?>
                            <a href="<?= site_url('pendaftaran/add') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Daftar</a>
                        <?php endif; ?>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Jenis Ekstrakurikuler</th>
                            <th class="text-center">Jadwal Kegiatan</th>
                            <th class="text-center">Tempat Latihan</th>
                            <th class="text-center">Tanggal Pendaftaran</th>
                            <th class="text-center">Status Seleksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ( $pendaftaran->result() as $daftar => $data) : ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                            <tr>
                                <td class="text-center"><?= $no++ ?>.</td>
                                <td class="text-center"><?= $data->nama_ekskul ?></td>
                                <td class="text-center"><?= $data->jadwal ?></td>
                                <td class="text-center"><?= $data->tempat ?></td>
                                <td class="text-center"><?= date_format( date_create($data->tanggal_pendaftaran), 'd - M - Y'); ?></td>
                                <td class="text-center"> 
                                    <?php switch ($data->status_pendaftaran) {
                                        case 'TIDAK LULUS': 
                                            echo '<label class="badge bg-red">TIDAK LULUS</label>';
                                        break; 
                                        case 'LULUS': 
                                            echo '<label class="badge bg-green">LULUS</label>';
                                        break;
                                        default: 
                                            echo '<label class="badge bg-yellow">BELUM SELEKSI</label>';
                                        break; 
                                     } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php endif; ?>
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
            <div class="box-header with-border"><h3 class="box-title">Data Pendaftar Ekstrakurikuler</h3></div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Status Seleksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($row->result() as $pendaftaran => $data) : ?>
                        <tr>
                            <td> Pendaftar - <?= $no++ ?></td>
                            <td><?= $data->nama_siswa ?></td>
                            <td><?= $data->kelas ?></td>
                            <td><?= $data->jurusan ?></td>
                            <td><?= $data->nama_ekskul ?></td>
                            <td><?= tgl_indo_medium($data->tanggal_pendaftaran)?></td>
                            <td width="12%">
                                <?php if ($data->status_pendaftaran == 'BELUM SELEKSI') : ?>
                                    <a href="<?= site_url('pendaftaran/accept/' . $data->id_pendaftaran) ?>" class="btn btn-success btn-s"><i class="fa fa-check"></i> Terima</a>
                                    <a href="<?= site_url('pendaftaran/reject/' . $data->id_pendaftaran) ?>" class="btn btn-danger btn-s"><i class="fa fa-close"></i> Tolak</a>
                                <?php elseif ($data->status_pendaftaran == 'LULUS') : ?>
                                    <a><label class="label bg-green">LULUS</label></a>
                                <?php elseif ($data->status_pendaftaran == 'TIDAK LULUS') : ?>
                                    <a><label class="label bg-red">TIDAK LULUS</label></a>
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
                        <a onclick="return confirm('Maksimal mengikuti kegiatan eskul terpenuhi!')" class="btn btn-warning"><i class="fa fa-plus"></i> Daftar Kegiatan</a>
                    <?php else : ?>
                        <a href="<?= site_url('pendaftaran/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Daftar Kegiatan</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Jadwal Kegiatan</th>
                            <th>Tempat Latihan</thclass=>
                            <th>Tanggal Pendaftaran</thclass=>
                            <th>Status Seleksi</thclass=>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ( $pendaftaran->result() as $daftar => $data) : ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $data->id_pendaftaran ?>">
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->jadwal ?></td>
                                <td><?= $data->tempat ?></td>
                                <td><?= tgl_indo_medium($data->tanggal_pendaftaran); ?></td>
                                <td> 
                                    <?php switch ($data->status_pendaftaran) :
                                        case 'TIDAK LULUS': 
                                            echo '<label class="label bg-red">TIDAK LULUS</label>';
                                        break; 
                                        case 'LULUS': 
                                            echo '<label class="label bg-green">LULUS</label>';
                                        break;
                                        default: 
                                            echo '<label class="label bg-yellow">BELUM SELEKSI</label>';
                                        break; 
                                        endswitch; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php endif; ?>

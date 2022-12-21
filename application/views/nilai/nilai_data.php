<?php if ($this->session->userdata('user_type') == 'pembina') : ?>
    <section class="content-header">
        <h1>
            PENILAIAN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Penilaian</a></li>
            <li class="active">Data Penilaian Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Penilaian Siswa</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Total Kehadiran</th>
                            <th>Nilai Presensi</th>
                            <th>Total Nilai Ujian</th>
                            <th>Nilai Ujian Akhir</th>
                            <th>Total</th>
                            <th>Predikat</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($set_nilai->result() as $nilai => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->kelas ?></td>
                                <td><?= $data->jurusan ?></td>
                                <td><?= $data->semester ?></td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->total_presensi ?></td>
                                <td><?= $data->nilai_presensi ?></td>
                                <td><?= $data->total_nilai_ujian ?></td>
                                <td><?= $data->nilai_ujian ?></td>
                                <td><?= $data->total ?></td>
                                <td><?= $data->predikat ?></td>
                                <td class="text-center" width="7%">
                                    <?php if ($data->status_penilaian == 'Belum dinilai') : ?>
                                        <a href="<?= site_url('nilai/beri_nilai/' . $data->id_pendaftaran) ?>" class="btn btn-success"><i class="fa fa-edit"></i> Beri Nilai</a>
                                    <?php else : ?>
                                        <a href="<?= site_url('nilai/beri_nilai/' . $data->id_pendaftaran) ?>" class="btn btn-default"><i class="fa fa-check"></i> Sudah dinilai</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($this->session->userdata('user_type') == 'siswa') : ?>
    <section class="content-header">
        <h1>PENILAIAN</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Penilaian</a></li>
            <li class="active">Data Penilaian</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Penilaian</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Ekstrakurikuler</th>
                            <th>Semester</th>
                            <th>Total Kehadiran</th>
                            <th>Nilai Presensi</th>
                            <th>Total Nilai Ujian</th>
                            <th>Nilai Ujian Akhir</th>
                            <th>Total Nilai</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($get_nilai as $nilai => $data) : 
                            
                        ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_ekskul ?></td>
                                <td><?= $data->semester ?></td>
                                <td><?= $data->total_presensi ?></td>
                                <td><?= $data->nilai_presensi ?></td>
                                <td><?= $data->total_nilai_ujian ?></td>
                                <td><?= $data->nilai_ujian ?></td>
                                <td><?= $data->total ?></td>
                                <td>
                                    <?php switch ($data->predikat) : 
                                    case 'E':
                                        echo '<p class="label label-danger">E</p>';
                                    break;
                                    case 'D':
                                        echo '<p class="badge bg-red">E</p>';
                                    break;
                                    case 'C':
                                        echo '<p class="badge bg-red">E</p>';
                                    break;
                                    case 'B':
                                        echo '<p class="badge bg-red">E</p>';
                                    break;
                                    case 'A':
                                        echo '<p class="badge bg-red"></p>';
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
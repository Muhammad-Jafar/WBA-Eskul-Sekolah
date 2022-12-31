<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Nilai Ekstrakurikuler Siswa</title>
    </head>
    <center>
        <br> <h2>Data Nilai Siswa Yang Mengambil Ekstrakurikuler </h2> <br>
        <body>
            <table border="1" width="90%" cellspacing="0" cellpadding="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Ekstrakurikuler</th>
                    <th>Semester</th>
                    <th>Total Presensi</th>
                    <th>Presentasi Presensi</th>
                    <th>Total Nilai Ujian</th>
                    <th>Presentasi Nilai Ujian</th>
                    <th>Total Nilai</th>
                    <th>Predikat</th>
                </tr>
                <?php $no = 1; foreach ($row as $data) : ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data->nama_siswa ?></td>
                        <td><?= $data->nis ?></td>
                        <td><?= $data->kelas ?></td>
                        <td><?= $data->jurusan ?></td>
                        <td><?= $data->nama_ekskul ?></td>
                        <td><?= $data->semester ?></td>
                        <td><?= $data->total_presensi ?></td>
                        <td><?= $data->nilai_presensi ?></td>
                        <td><?= $data->total_nilai_ujian ?></td>
                        <td><?= $data->nilai_ujian ?></td>
                        <td><?= $data->total ?></td>
                        <td><?= $data->predikat ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </body>
    </center>
</html>

<script type="text/javascript"> window.print(); </script>
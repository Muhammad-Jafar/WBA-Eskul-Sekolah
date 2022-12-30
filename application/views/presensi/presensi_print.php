<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Siswa</title>
</head>
<center>
    <br> <h2>Data Presensi Siswa Yang Mengambil Ekstrakurikuler  </h2> <br>
    <body>
        <table border=".2" style="width: 80%">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>TTL</th>
                <th>No Hp</th>
                <th>Presensi
                    <th>1</th><th>2</th><th>3</th><th>4</th>
                </th>
                <th>Status Presensi</th>
            </tr>
            <?php $no = 1;
            foreach ($row->result() as $siswa => $data) { ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $data->nama_siswa ?></td>
                    <td><?= $data->nis ?></td>
                    <td><?= $data->jenis_kelamin ?></td>
                    <td><?= $data->kelas ?></td>
                    <td><?= $data->ttl ?></td>
                    <td><?= $data->no_hp ?></td>
                    <td><?= $data->tgl_presensi ?></td>
                    <td><?= $data->presensi_point ?></td>
                    <td><?= $data->presensi_point ?></td>
                    <td><?= $data->presensi_point ?></td>
                    <td><?= $data->presensi_point ?></td>
                    <td><?= $data->status_presensi ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</center>
</html>

<script type="text/javascript"> window.print(); </script>
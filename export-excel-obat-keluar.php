<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export obat keluar Ke Excel</title>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data obat keluar.xls");
    ?>

    <p>Daftar Obat Keluar</p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Obat Keluar</th>
                <th>Nama Obat</th>
                <th>Stok Keluar</th>
            </tr>
        </thead>
        <tbody>
            <!--Jangan Dihapus-->
            <?php
            include 'koneksi.php';

            $sql = "SELECT obat_keluar.id, obat_keluar.id_obat, obat_keluar.tgl_obat_keluar, data_obat.nama, obat_keluar.stok_keluar FROM obat_keluar INNER JOIN data_obat ON obat_keluar.id_obat = data_obat.id";
            $query = mysqli_query($koneksi, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($query)) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['tgl_obat_keluar'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['stok_keluar'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
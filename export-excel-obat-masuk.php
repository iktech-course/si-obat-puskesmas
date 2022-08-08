<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export obat masuk Ke Excel</title>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data obat masuk.xls");
    ?>

    <p>Daftar Obat Masuk</p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Obat Masuk</th>
                <th>Nama Obat</th>
                <th>Stok Masuk</th>
            </tr>
        </thead>
        <tbody>
            <!--Jangan Dihapus-->
            <?php
            include 'koneksi.php';

            $sql = "SELECT obat_masuk.id, obat_masuk.id_obat, obat_masuk.tgl_obat_masuk, data_obat.nama, obat_masuk.stok_masuk FROM obat_masuk INNER JOIN data_obat ON obat_masuk.id_obat = data_obat.id";
            $query = mysqli_query($koneksi, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($query)) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['tgl_obat_masuk'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['stok_masuk'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
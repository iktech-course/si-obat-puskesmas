<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Keberangkatan Ke Excel</title>
</head>
<body>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Keberangkatan.xls");
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Obat</th>
                <th>Tanggal Obat keluar</th>
                <th>Stok keluar</th>
            </tr>
        </thead>
        <tbody>
            <!--Jangan Dihapus-->
            <?php
                include 'koneksi.php';

                $query = mysqli_query($koneksi,"SELECT * FROM Obat_Masuk");
                $no = 0;
                while($data = mysqli_fetch_array($query))
                {
                    $no++;
            ?>
            <tr>
                <td><?=$no ?></td>
                <td><?=$data['id_obat'] ?></td>
                <td><?=$data['tgl_obat_keluar'] ?></td>
                <td><?=$data['stok_keluar'] ?></td>
            </tr>
            <?php
                }
            ?>                                   
        </tbody>    
    </table>
</body>
</html>
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

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Obat</th>
                <th>Tanggal Obat Masuk</th>
                <th>Stok Masuk</th>
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
                <td><?=$data['tgl_obat_masuk'] ?></td>
                <td><?=$data['stok_masuk'] ?></td>
            </tr>
            <?php
                }
            ?>                                   
        </tbody>    
    </table>
</body>
</html>
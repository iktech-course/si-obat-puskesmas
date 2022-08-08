<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Stok obat Ke Excel</title>
</head>
<body>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=stok obat.xls");
    ?>

    <p>Daftar Stok Obat</p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            <!--Jangan Dihapus-->
            <?php
                include 'koneksi.php';

                $query = mysqli_query($koneksi,"SELECT * FROM Stok_obat");
                $no = 0;
                while($data = mysqli_fetch_array($query))
                {
                    $no++;
            ?>
            <tr>
                <td><?=$no ?></td>
                <td><?=$data['nama'] ?></td>
                <td><?=$data['stok'] ?></td>
            </tr>
            <?php
                }
            ?>                                   
        </tbody>    
    </table>
</body>
</html>
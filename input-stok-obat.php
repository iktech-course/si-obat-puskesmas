<?php
include "koneksi.php";

$id_obat = $_POST['nama_obat'];
$stok = $_POST['stok'];

$sql = "INSERT INTO stok_obat (id_obat, stok) VALUES ('$id_obat', '$stok')";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo "Data Berhasil Disimpan";
    echo "<meta http-equiv='refresh' content='2; url=stok-obat.php'>";
}
else {
    echo "Data Gagal Tersimpan";
    mysqli_error($koneksi);
}
?>
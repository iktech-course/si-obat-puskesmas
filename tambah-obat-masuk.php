<?php
include('koneksi.php');

$id = $_POST['id'];
$id_obat = $_POST['id_obat'];
$tgl_obat_masuk = $_POST['tgl_obat_masuk'];
$stok_masuk = $_POST['stok_masuk'];

$query = mysqli_query($koneksi, "INSERT INTO obat_masuk (id, id_obat, tgl_obat_masuk, stok_masuk) VALUES
	('$id','$id_obat','$tgl_obat_masuk','stok_masuk')");

if($query)
{
	echo "Data Berhasil Disimpan";
	echo "<meta http-equiv='refresh' content='1, url=obat-masuk.php'>";
	}
else
{
	echo "Data Gagal Tersimpan";
	// mysqli_eror($query);
 }

?>
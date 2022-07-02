<?php
include('koneksi.php');

$id = $_POST['id'];
$id_obat = $_POST['id_obat'];
$tgl_obat_masuk = $_POST['tgl_obat_masuk'];
$stok_masuk = $_POST['stok_masuk'];

$query = mysqli_query($koneksi, "UPDATE obat_masuk set id='$id', id_obat='$id_obat', tgl_obat_masuk='$tgl_obat_masuk', stok_masuk='$stok_masuk' WHERE id = '$id'");

if($query)
{
	echo "Data Berhasil Diupdate";
	echo "<meta http-equiv= 'refresh' content='1; url=obat-masuk.php'>";

}
else
{
	echo "Data Gagal Terupdate";

}
?>/
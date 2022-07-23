<?php
include('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$satuan = $_POST['satuan'];
$tgl_expired = $_POST['tgl_expired'];

$query = mysqli_query($koneksi, "UPDATE data_obat set nama='$nama', satuan='$satuan', tgl_expired='$tgl_expired' WHERE id = '$id'");

if($query)
{
	echo "Data Berhasil Diupdate";
	echo "<meta http-equiv= 'refresh' content='1; url=data-obat.php'>";

}
else
{
	echo "Data Gagal Terupdate";

}
?>
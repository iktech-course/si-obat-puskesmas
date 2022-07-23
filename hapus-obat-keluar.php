<?php
include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM obat_keluar WHERE id='$id'");

if($query)
{
	echo "Data Berhasil hapus";
	echo "<meta http-equiv= 'refresh' content='2; url=obat-keluar.php'>";
}
else
{
	echo "Data Gagal Hapus";
}
	?>
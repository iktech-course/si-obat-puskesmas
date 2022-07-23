<?php
include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM data_obat 
	WHERE id = $id
	");

if($query)
{
	echo "Data Berhasil hapus";
	echo "<meta http-equiv= 'refresh' content='2; url=data-obat.php'>";
}
else
{
	echo "Data Gagal Hapus";
	mysqli_error($koneksi);
}
?>
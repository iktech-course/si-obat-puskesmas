<?php
include('koneksi.php');

$nama = $_POST['nama'];
$satuan = $_POST['satuan'];
$tgl_expired = $_POST['tgl_expired'];

$query = mysqli_query($koneksi, "INSERT INTO data_obat (nama, satuan, tgl_expired) VALUES ('$nama', '$satuan', '$tgl_expired')");

// echo("INSERT INTO data_obat (nama, satuan, tgl_Expired) VALUES ('$data_obat', '$nama', '$satuan', '$tgl_Expired',)");

if($query)
{
	echo "Data Berhasil Disimpan";
	echo "<meta http-equiv='refresh' content='2; url=data-obat.php'>";
}
else 
{
	echo "Data Gagal Disimpan";
	// mysqli_eror ($query);
}
?>
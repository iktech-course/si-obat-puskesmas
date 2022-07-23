<?php
include('koneksi.php');
// Input Data Ke Tabel obat_masuk
$id_obat = $_POST['nama_obat'];
$tgl_obat_masuk = $_POST['tgl_obat_masuk'];
$stok_masuk = $_POST['stok_masuk'];


// Mengambil Data dari Tabel stok_obat
$sql_stok = "SELECT * FROM stok_obat WHERE id_obat = '$id_obat'";
$query_stok = mysqli_query($koneksi, $sql_stok);
$data_stok = mysqli_fetch_array($query_stok);
$stok_obat = $data_stok['stok'];

$sisa_obat = $stok_obat + $stok_masuk;

$sql_input = "INSERT INTO obat_masuk (id_obat, tgl_obat_masuk, stok_masuk) VALUES ('$id_obat', '$tgl_obat_masuk', '$stok_masuk')";
$query_input = mysqli_query($koneksi, $sql_input);

if($query_input)
{
	// Update Data Ke Tabel stok_obat
	$sql_update_stok = "UPDATE stok_obat SET stok = '$sisa_obat' WHERE id_obat = '$id_obat'";
	$query_update_stok = mysqli_query($koneksi, $sql_update_stok);

	echo "Data Berhasil Disimpan";
	echo "<meta http-equiv='refresh' content='1, url=obat-masuk.php'>";
	}
else
{
	echo "Data Gagal Tersimpan";
	// mysqli_eror($query);
 }

?>
<?php
include('koneksi.php');

$id = $_POST['id'];
$id_obat = $_POST['nama_obat'];
$tgl_obat_masuk = $_POST['tgl_obat_masuk'];
$stok_masuk = $_POST['stok_masuk'];


// Mengambil Data dari Tabel stok_obat
$sql_stok = "SELECT * FROM stok_obat WHERE id_obat = '$id_obat'";
$query_stok = mysqli_query($koneksi, $sql_stok);
$data_stok = mysqli_fetch_array($query_stok);
$stok_obat = $data_stok['stok'];

// Mengambil Data Dari Tabel obat_masuk
$sql_obat_masuk = "SELECT * FROM obat_masuk WHERE id_obat = '$id_obat'";
$query_obat_masuk = mysqli_query($koneksi, $sql_obat_masuk);
$data_obat_masuk = mysqli_fetch_array($query_obat_masuk);
$data_stok_masuk = $data_obat_masuk['stok_masuk'];

$sisa_obat;


// Logkia Edit Data Stok Obat
if ($stok_masuk > $data_obat_masuk) {
	$sisa_obat = $stok_obat + $stok_masuk;
}
else if ($stok_masuk < $stok_obat) {
	$sisa_obat = $stok_obat + ($stok_masuk - $data_stok_masuk);
}
else {
	$sisa_obat = $stok_obat;
}


$sql_input = "UPDATE obat_masuk set id_obat='$id_obat', tgl_obat_masuk='$tgl_obat_masuk', stok_masuk='$stok_masuk' WHERE id = '$id'";
$query_input = mysqli_query($koneksi, $sql_input);

if($query_input)
{
	// Update Data Ke Tabel stok_obat
	$sql_update_stok = "UPDATE stok_obat SET stok = '$sisa_obat' WHERE id_obat = '$id_obat'";
	$query_update_stok = mysqli_query($koneksi, $sql_update_stok);
	echo "Data Berhasil Diupdate";
	echo "<meta http-equiv= 'refresh' content='1; url=obat-masuk.php'>";

}
else
{
	echo "Data Gagal Terupdate";

}
?>
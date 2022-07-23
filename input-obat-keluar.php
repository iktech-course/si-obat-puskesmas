<?php
include('koneksi.php');
// Input Data Ke Tabel obat_keluar
$id_obat = $_POST['nama_obat'];
$tgl_obat_masuk = $_POST['tgl_obat_keluar'];
$stok_keluar = $_POST['stok_keluar'];


// Mengambil Data dari Tabel stok_obat
$sql_stok = "SELECT * FROM stok_obat WHERE id_obat = '$id_obat'";
$query_stok = mysqli_query($koneksi, $sql_stok);
$data_stok = mysqli_fetch_array($query_stok);
$stok_obat = $data_stok['stok'];

$sisa_obat = $stok_obat - $stok_keluar;

if($sisa_obat < $stok_keluar) {
	echo "Stok Obat Tidak Mencukupi";
	echo "<meta http-equiv= 'refresh' content='1; url=obat-keluar.php'>";
}
else {
	$query_input = mysqli_query($koneksi, "INSERT INTO obat_keluar (id_obat, tgl_obat_keluar, stok_keluar) VALUES ('$id_obat', '$tgl_obat_masuk', '$stok_keluar')");
	if($query_input)
	{
		// Update Data Ke Tabel stok_obat
		$sql_update_stok = "UPDATE stok_obat SET stok = '$sisa_obat' WHERE id_obat = '$id_obat'";
		$query_update_stok = mysqli_query($koneksi, $sql_update_stok);
		echo "Data Berhasil Diinput";
		echo "<meta http-equiv= 'refresh' content='1; url=obat-keluar.php'>";
	}
	else
	{
		echo "Data Gagal Diinput";
		mysqli_error($koneksi);
	}
}

?>
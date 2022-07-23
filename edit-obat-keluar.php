<?php
include('koneksi.php');

$id = $_POST['id'];
$id_obat = $_POST['nama_obat'];
$tgl_obat_keluar = $_POST['tgl_obat_keluar'];
$stok_keluar = $_POST['stok_keluar'];

// Mengambil Data dari Tabel stok_obat
$sql_stok = "SELECT * FROM stok_obat WHERE id_obat = '$id_obat'";
$query_stok = mysqli_query($koneksi, $sql_stok);
$data_stok = mysqli_fetch_array($query_stok);
$stok_obat = $data_stok['stok'];

// Mengambil Data Dari Tabel obat_keluar
$sql_obat_keluar = "SELECT * FROM obat_keluar WHERE id_obat = '$id_obat'";
$query_obat_keluar = mysqli_query($koneksi, $sql_obat_keluar);
$data_obat_keluar = mysqli_fetch_array($query_obat_keluar);
$data_stok_keluar = $data_obat_keluar['stok_keluar'];


$sisa_obat;

if($stok_keluar > $data_stok_keluar)
{
    $sisa_obat = $stok_obat - ($stok_keluar - $data_stok_keluar);
}
else if($stok_keluar < $data_stok_keluar)
{
    $sisa_obat = $stok_obat + ($data_stok_keluar - $stok_keluar);
}
else
{
    $sisa_obat = $stok_obat;
}

// $query_input = mysqli_query($koneksi, "UPDATE obat_masuk set id='$id', id_obat='$id_obat', tgl_obat_masuk='$tgl_obat_masuk', stok_masuk='$stok_masuk' WHERE id = '$id'");
$query_input = mysqli_query($koneksi, "UPDATE obat_keluar set id_obat='$id_obat', tgl_obat_keluar='$tgl_obat_keluar', stok_keluar='$stok_keluar' WHERE id = '$id'");

if($query_input)
{
	// Update Data Ke Tabel stok_obat
	$sql_update_stok = "UPDATE stok_obat SET stok = '$sisa_obat' WHERE id_obat = '$id_obat'";
	$query_update_stok = mysqli_query($koneksi, $sql_update_stok);
	echo "Data Berhasil Diupdate";
	echo "<meta http-equiv= 'refresh' content='1; url=obat-keluar.php'>";

}
else
{
	echo "Data Gagal Terupdate";

}
?>/
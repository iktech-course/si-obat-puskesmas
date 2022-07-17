<!--Script PHP -->
<?php
include("koneksi.php");

//Start Session
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$data = mysqli_fetch_array($query);
$jumlah = mysqli_num_rows($query);


//Jika Data Ditemukan Maka Proses Login Berhasil 
if($jumlah > 0)
{
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];

	header('location: beranda.php');
}
else 
{
	echo "Login Gagal";
	echo "<meta http-equiv='refresh' content='2; url=login.php'>";
}

?>



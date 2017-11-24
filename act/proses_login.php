<?php
	session_start();
	include"koneksi.php";
	$type = $_POST['login_type'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
if ($type== 'admin') {
	$query = mysql_query("SELECT * FROM petugas WHERE username = '$username'");
	$cek = mysql_num_rows($query);
	$hasil = mysql_fetch_array($query);
	if ($cek==0) {
		echo"<script>window.alert('USERNAME TIDAK TERDAFTAR');
		window.location=('../?page=login')</script>";
	}
	else {
		if ($hasil['password'] <> $pass) {
			echo"<script>window.alert('PASSWORD SALAH !!!!!');
		window.location=('../?page=login')</script>";
		}
		else{
			$_SESSION['admin'] = $hasil['username'];
			header("location:../?page=home");
		}
	}
}
else{
	if ($type=='peminjam') {
		$query = mysql_query("SELECT * FROM peminjam WHERE username = '$username'");
	$cek = mysql_num_rows($query);
	$hasil = mysql_fetch_array($query);
	if ($cek==0) {
		echo"<script>window.alert('$nama TIDAK TERDAFTAR');
		window.location=('../?page=home')</script>";
	}
	else {
		if ($hasil['password'] <> $pass) {
			echo"<script>window.alert('PASSWORD SALAH !!!!!');
		window.location=('../?page=home')</script>";
		}
		else{
			$_SESSION['peminjam'] = $hasil['username'];
			header("location:../?page=home");
		}
	}
	}
}
?>

<?php
	include 'koneksi.php';
	$nama = $_POST['nama'];
	$alm = $_POST['alamat'];
	$telp = $_POST['telp'];

	$insert = mysql_query("INSERT INTO penerbit (penerbit_nama, penerbit_alamat, penerbit_telp) values ('$nama','$alm','$telp')");
	header('location:../?page=penerbit');
?>
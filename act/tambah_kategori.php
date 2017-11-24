<?php
	include 'koneksi.php';
	$nama = $_POST['nama'];

	$insert = mysql_query("INSERT INTO kategori (kategori_nama) values ('$nama')");
	header('location:../?page=kategori');
?>
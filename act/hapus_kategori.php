<?php
	include 'koneksi.php';
	$get_kode = $_GET['kode'];
	$querrr = mysql_query("delete from kategori where kategori_kode = '$get_kode'");
	header('location:../?page=kategori');
?>
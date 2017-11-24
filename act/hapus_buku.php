<?php
	include 'koneksi.php';
	$kode = $_GET['kode'];
	$myhap = mysql_query("delete from buku where buku_kode = '$kode'");
	header('location:../?page=buku');
?>			
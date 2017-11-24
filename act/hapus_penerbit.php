<?php
	include 'koneksi.php';
	$get = $_GET['kode'];
	$hapus = mysql_query("delete from penerbit where penerbit_kode = '$get'");
	header('location:../?page=penerbit');
?>
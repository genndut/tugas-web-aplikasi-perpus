<?php
	include 'koneksi.php';
		$get = $_GET['kode'];
		$hapus = mysql_query("DELETE FROM peminjam where peminjam_kode = '$get'");
	header('location:../?page=peminjam');
?>


			
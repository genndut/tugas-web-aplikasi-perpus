<?php
	include"koneksi.php";
	$tgl_k = date('Y-m-d');
	$status = $_POST['status'];
	$kode = $_POST['kode'];


	$proses = mysql_query("UPDATE detail_pinjam set detail_status_kembali='$status' where peminjaman_kode = '$kode'");
	echo "<script>window.location=('../?page=peminjaman')</script>";
?>
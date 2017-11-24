<?php
include"koneksi.php";
	$nama = $_POST['nama'];
	$kode = $_POST['kode'];
	$ub = mysql_query("UPDATE kategori SET kategori_nama = '$nama' where kategori_kode = '$kode'");
	if ($ub) {
		echo"<script>window.alert('Perubahan Disimpan !');
		window.location=('../?page=kategori')</script>";
	}
	else{
		echo"<script>window.alert('Data Gagal Dirubah !');
		window.location=('../?page=kategori&aksi=edit&kode=$kode')</script>";
	}
?>
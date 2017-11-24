<?php
	include"koneksi.php";
	$nama = $_POST['nama'];
	$user = $_POST['user'];
	$pas = $_POST['pas'];
	$kode = $_POST['kode'];

	$gb = "upload/".$_FILES['gambar']['name'];
			move_uploaded_file($_FILES['gambar']['tmp_name'],"upload/".($_FILES['gambar']['name']));

	$proses = mysql_query("UPDATE petugas set petugas_nama = '$nama', password = '$pas', petugas_foto = '$gb' where petugas_kode = '$kode'");
	if ($proses) {
		echo "<script>window.alert('Perubahan Disimpan !');
		window.location=('../?page=akun&kode=$kode')</script>";
	}
	else{
		echo "<script>window.alert('Perubahan Gagal !');
		window.location=('../?page=akun&aksi=editadmin&kode=$kode')</script>";
	}
?>
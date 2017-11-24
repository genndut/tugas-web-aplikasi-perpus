<?php
	include"koneksi.php";
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];
	$kode = $_POST['kode'];

	$proses = mysql_query("UPDATE penerbit set penerbit_nama = '$nama',
		 penerbit_alamat = '$alamat', penerbit_telp = '$tlp' where penerbit_kode = '$kode'");
	if ($proses) {
		echo "<script>window.alert('Perubahan Disimpan !');
		window.location=('../?page=penerbit')</script>";
	}
	else{
		echo "<script>window.alert('Perubahan Gagal !');
		window.location=('../?page=penerbit&aksi=edit&kode=$kode')</script>";
	}
?>
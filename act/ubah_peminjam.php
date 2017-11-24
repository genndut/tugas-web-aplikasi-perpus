<?php
	include"koneksi.php";
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$pas = $_POST['pas'];
	$kode = $_POST['kode'];

	$gb = "upload/".$_FILES['gambar']['name'];
			move_uploaded_file($_FILES['gambar']['tmp_name'],"upload/".($_FILES['gambar']['name']));

	$proses = mysql_query("UPDATE peminjam set peminjam_nama = '$nama', peminjam_alamat = '$alamat', peminjam_telp = '$telp',
		 password = '$pas', peminjam_foto = '$gb' where peminjam_kode = '$kode'");
	if ($proses) {
		echo "<script>window.alert('Perubahan Disimpan !');
		window.location=('../?page=akun&kode=$kode')</script>";
	}
	else{
		echo "<script>window.alert('Perubahan Gagal !');
		window.location=('../?page=akun&aksi=edit_peminjam&kode=$kode')</script>";
	}
?>
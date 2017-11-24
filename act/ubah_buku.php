<?php
		include"koneksi.php";
		$kode = $_POST['kode_buku'];
		$kat = $_POST['kategori'];
		$terbit = $_POST['penerbit'];
		$judul = $_POST['judul'];
		$hal = $_POST['hal'];
		$dis = $_POST['diskripsi'];
		$tahun = $_POST['tahun'];
		$pengarang = $_POST['pengarang'];

		$gb = "upload/".$_FILES['gambar']['name'];
			move_uploaded_file($_FILES['gambar']['tmp_name'],"upload/".($_FILES['gambar']['name']));


		$que = mysql_query("UPDATE buku SET kategori_kode = '$kat',
		 penerbit_kode = '$terbit', 
		 buku_judul = '$judul', 
		 buku_jumhal ='$hal', 
		 buku_diskripsi = '$dis', 
		 buku_pengarang = '$pengarang', 
		 buku_tahun_terbit = '$tahun', buku_gambar = '$gb' where buku_kode = '$kode'") ;
		if ($que) {
			echo"<script>window.alert('Perubahan Disimpan');
		window.location=('../?page=buku')</script>";
		}
		else{
			echo"<script>window.alert('Perubahan Buku $_POST[judul] Gagal !!!!');
		window.location=('../?page=buku&aksi=ubah&kode=$kode')</script>";
		}
	?>
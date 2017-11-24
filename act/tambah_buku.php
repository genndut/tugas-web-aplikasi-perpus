<?php
		include"koneksi.php";
		$kat = $_POST['kategori'];
		$terbit = $_POST['penerbit'];
		$judul = $_POST['judul'];
		$hal = $_POST['jumhal'];
		$dis = $_POST['diskripsi'];
		$tahun = $_POST['tahun'];
		$pengarang = $_POST['pengarang'];
		$gb = "upload/".$_FILES['gambar']['name'];

		move_uploaded_file($_FILES['gambar']['tmp_name'],"upload/".($_FILES['gambar']['name']));

		$que = mysql_query("INSERT INTO buku (kategori_kode, penerbit_kode, buku_judul, buku_jumhal, buku_diskripsi, buku_pengarang, buku_tahun_terbit, buku_gambar) VALUES ('$kat','$terbit','$judul','$hal','$dis','$pengarang','$tahun','$gb')") ;
		header('location:../?page=buku');
	?>
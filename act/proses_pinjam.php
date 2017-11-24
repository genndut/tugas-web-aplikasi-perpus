<?php
include"koneksi.php";
$petugas = $_POST['petugas'];
$peminjam = $_POST['peminjam'];
$tgl = $_POST['tgl_pinjam'];
$kembali = $_POST['tgl_kembali'];

$proses = mysql_query("INSERT INTO peminjaman (petugas_kode, peminjam_kode, peminjaman_tgl, peminjaman_tgl_hrs_kembali) values ('$petugas', '$peminjam', '$tgl', '$kembali')");
$ambil = mysql_query("SELECT * FROM peminjaman");
		$h = mysql_fetch_array($ambil);
		$row = $h[count($h)-1];
		$rows = $h['peminjaman_kode'];
		echo "$rows<br>";
		echo "$tg<br>";
$buku = $_POST['buku'];
	 $p = mysql_query("INSERT INTO detail_pinjam (peminjaman_kode, buku_kode) values ('$rows', '$buku')");
?>

<script>
		 window.location=('../?page=peminjaman');
 </script>
<?php
	include"act/koneksi.php";
	$kode  = $_GET['kode'];
	$query = mysql_query("SELECT * FROM buku where buku_kode = '$kode' ");
		$tampil = mysql_fetch_array($query);
	$pen = mysql_query("SELECT * FROM penerbit where penerbit_kode = '$tampil[penerbit_kode]'");
		$t = mysql_fetch_array($pen);
	$kat = mysql_query("SELECT * FROM kategori where kategori_kode = '$tampil[kategori_kode]'");
		$t2 = mysql_fetch_array($kat);
	?>

	<div id="utama">
	<h3><?php echo "$tampil[buku_judul]"; ?></h3>
	<center>
	<table>
	<tr>
		<td rowspan="6"><img src="act/<?php echo "$tampil[buku_gambar]"; ?>" width='120px'></td>
		<tr><td>Pengarang</td><td>: <?php echo "$tampil[buku_pengarang]"; ?></td></tr>
		<tr><td>Jumlah Halaman</td><td>: <?php echo "$tampil[buku_jumhal]"; ?></td></tr>
		<tr><td>Tahun Terbit</td><td>: <?php echo "$tampil[buku_tahun_terbit]"; ?></td></tr>
		<tr><td>Penerbit</td><td>: <?php echo "$t[penerbit_nama]"; ?></td></tr>
		<tr><td>Kategori</td><td>: <?php echo "$t2[kategori_nama]"; ?></td></tr>
		<tr><td>Diskripsi :</td></tr>
		<tr><td colspan="3"><textarea rows='5' class="dis"><?php echo "$tampil[buku_diskripsi]"; ?></textarea></td></tr>
	</tr>
	<?php
		if ($_SESSION['peminjam']) {
		?>
		<tr><td><a href="?page=pinjam&kode=<?php echo "$tampil[buku_kode]"; ?>"><img src="image/ico/pinjam.png">Pinjam Buku</a></td></tr>
		<?php
		}
	?>
	</table>
	</center>
	</div>
<?php
include"act/koneksi.php";
$kata = $_POST['cari'];

$data = mysql_query("SELECT * FROM buku where buku_judul like '%$kata%'");
?>
<div id="utama">
<center>
	<table>
		<tr><td colspan="5"><h3>HASIL PENCARIAN BUKU</h3></td></tr>
			<tr>
				<th>No.</th>
				<th>Judul Buku</th>
				<th>Jumhal</th>
				<th>Pengarang</th>
				<th>Tahun Terbit</th>
				<?php
			if (isset($_SESSION['peminjam'])) {
			?>
				<th colspan="2">Pilihan</th>
			<?php
			} ?>
			</tr>
<?php	
	while ($hasil = mysql_fetch_array($data)) {
	$no++;
	?>
	<?php echo "<tr";
		if ($no%2==0) {
			$warna = '#fff';
		}
		else{
			$warna = '#3498db'; 
		}
		echo " bgcolor='$warna'>";?><td><?php echo "$no"; ?></td>
			<td><?php echo "$hasil[buku_judul]";?></td>
			<td><?php echo "$hasil[buku_jumhal]"; ?></td>
			<td><?php echo "$hasil[buku_pengarang]";?></td>
			<td><?php echo "$hasil[buku_tahun_terbit]";?></td>
			<?php
			if (isset($_SESSION['peminjam'])) {
			?>
				<td colspan="5" align="left"><a href="?page=pinjam&kode=<?php echo "$hasil[buku_kode]"; ?>"><img src="image/ico/pinjam.png" title="Pinjam Buku"></a></td>
			<?php
			} ?>
		</tr>
<?php
	}
	$cek = mysql_num_rows($data);
	?>
	<tr><th colspan="6" align="left">Jumlah = <?php echo "$cek"; ?> Hasil Dari Kata <?php echo "'$kata'"; ?></th></tr>
	</table>
	</center>
	</div>
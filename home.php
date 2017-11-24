<?php
	include 'act/koneksi.php';
	$query = mysql_query("SELECT * FROM buku order by buku_nama asc");	
?>
	<div id="hoomee">
		<h1 align="center">SELAMAT DATANG DI PERPUSTAKAAN 	AMIK PARBINA NUSANTARA PEMATANG SIANTAR</h1><br>
		<div class="gmbr">
			<a href="?page=buku">
			<img title="Lihat buku" src="image/Screenshot_1.png" width="100%" height="500px">
			</a>
		</div>
		<div class="kata">
		<strong><p align="center" class="aaaa">Selamat Berkunjung & Terima Kasih</p><br>
		</strong>
	</div>
<div id='baru'>
	<table>
		<tr><th bgcolor="#34495e" colspan="15"><h3>Buku Terbaru</h3></th></tr>
		<tr>
			<?php
				$data = mysql_query("SELECT * FROM buku order by kd_buku desc limit 15");
				while ($tp = mysql_fetch_array($data)) {
				?>
					<td align="center"><a href="?page=lihat&kode=<?php echo "$tp[kd_buku]"; ?>"><img src="act/<?php echo "$tp[gambar_buku]"; ?>" width='75px' height='100px' title="<?php echo "$tp[jdl_buku]"; ?>" /></a></td>
				<?php
				}
			?>
		</tr>
	</table>
</div>
	</div>
		


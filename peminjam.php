<?php
	include"act/koneksi.php";

	$query = mysql_query("SELECT * FROM peminjam order by nm_peminjam asc ");
	?>
	
	<div id="utama">
	<center>
		<table>
		<tr><td colspan="5"><h3>DATA PEMINJAM</h3></td></tr>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telpon</th>
				<th>Foto</th>
			<?php
			if (isset($_SESSION['admin'])) {
			?>	<th colspan="2">Pilihan</th>
				<?php } ?>
			</tr>
<?php	
	while ($hasil = mysql_fetch_array($query)) {
	$no++;
	?><?php echo "<tr";
		if ($no%2==0) {
			$warna = '#fff';
		}
		else{
			$warna = '#3498db'; 
		}
		echo " bgcolor='$warna'>";?><td><?php echo "$no"; ?></td>
			<td><?php echo "$hasil[nm_peminjam]";?></td>
			<td><?php echo "$hasil[alamat_peminjam]"; ?></td>
			<td><?php echo "$hasil[telp_peminjam]";?></td>
			<td><img src="act/<?php echo"$hasil[foto_peminjam]";?>" width="50px"></img></td>
			<?php
				if (isset($_SESSION['admin'])) { ?>
					<td><a href="act/hapus_peminjam.php?kode=<?php echo "$hasil[kd_peminjam]"; ?>"><img src="image/ico/hapus.png" align="center"></a></td>
				<?php } ?>
		</tr>
	
<?php
	}
$aa = mysql_num_rows($query);
?>
		<tr>
		<th colspan="6" align="left">Jumlah = <?php echo "$aa"; ?> Peminjam</th>
	</table>

</center>
</div>
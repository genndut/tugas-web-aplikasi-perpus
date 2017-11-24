<?php
	include"act/koneksi.php";
	$query = mysql_query("SELECT * FROM penerbit order by nm_penerbit asc");
		$cek = mysql_num_rows($query);
?>
<div id="utama">
<center>
	<table>
	<tr><td colspan="4"><h3>DATA PENERBIT</h3></td></tr>
		<tr>
		<th>No.</th>
		<th>Nama Penerbit</th>
		<th>Alamat</th>
		<th>Telp</th>
		<?php
		if (isset($_SESSION['admin'])) {
			?>	<th colspan="2">Pilihan</th><th><a href="?page=penerbit&aksi=tambah#tambah"><img src="image/ico/tambah.png" title="Tambah Penerbit"></a></th>
				<?php } ?>
		</tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;
				?><?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = 'orange';
			}
			else{ 
				$warna = '#3498db';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[nm_penerbit]"; ?></td>
					<td><?php echo "$tampil[alamat_penerbit]"; ?></td>
					<td><?php echo "$tampil[telp_penerbit]"; ?></td><?php
		if (isset($_SESSION['admin'])) {
			?>	<td><a href="?page=penerbit&aksi=edit&kode=<?php echo "$tampil[kd_penerbit]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit <?php echo "$tampil[nm_penerbit]"; ?>"></a></td>
					<td><a href="act/hapus_penerbit.php?kode=<?php echo "$tampil[kd_penerbit]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[nm_penerbit]"; ?>"></a></td>
					
				<?php } ?>
					</tr>
				<?php
			}
		?>
		<tr><th <?php
		if (isset($_SESSION['admin'])) {
			?> colspan="6"
				<?php } else {  echo "colspan='4'"; } ?> align="left"> Jumlah = <?php echo "$cek"; ?> Penerbit</th></tr>
	</table>



	<!-- TAMBAH -->
	<?php
		if ($_GET['aksi'] == 'tambah') {
			?>
			<div id="tambah">
			<form action="act/tambah_penerbit.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Tambah Penerbit</th></tr>
					<tr><td>Nama Penerbit</td><td><input type="text" name="nama" required placeholder='Nama Penerbit'></td></tr>
					<tr><td>Alamat</td><td><input type="text" name="alamat" required placeholder='Alamat Penerbit'></td></tr>
					<tr><td>Telp.</td><td><input type="text" name="telp" required placeholder='Telp Penerbit'></td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Tambah"></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=penerbit" class="batal">Batal</a></td></tr>
					</table>
			</form>
			</div>
			<?php
		}
	?>
	<?php
			if ($_GET['aksi'] == 'edit') {
				$get = $_GET['kode'];
				$query = mysql_query("select * from penerbit where kd_penerbit = '$get'");
				$u = mysql_fetch_array($query);
				?>
				<div id="edit">
				<form action="act/ubah_penerbit.php" method="post">
					<table>
						<tr><th colspan="2">Form Ubah Penerbit</th></tr>
						<tr><td>Nama Penerbit</td><td><input type="text" name="nama" value="<?php echo "$u[nm_penerbit]"; ?>" required></td></tr>
						<tr><td>Alamat Penerbit</td><td><input type="text" name="alamat" value="<?php echo "$u[alamat_penerbit]"; ?>" required></td></tr>
						<tr><td>Telpon Penerbit</td><td><input type="text" name="tlp" value="<?php echo "$u[telp_penerbit]"; ?>" required></td></tr>
						<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
						<tr><td colspan="2" align="right"><a href="?page=penerbit" class="batal">Batal</a></td></tr>
					</table>
					<input type="hidden" name="kode" value="<?php echo "$u[kd_penerbit]"; ?>">
				</form>
				</div>
<?php
			}
?>
	</center>
</div>

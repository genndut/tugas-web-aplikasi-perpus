<?php
	include"act/koneksi.php";
	$query = mysql_query("SELECT * FROM kategori order by nm_kategori asc");
		$cek = mysql_num_rows($query);
?>
<div id="utama">
<center>

	<table>
	<tr><td colspan="4"><h3>DATA KATEGORI</h3></td><td colspan="2">
	<tr>
		<th>No.</th>
		<th>Nama Kategori</th><?php
		if (isset($_SESSION['admin'])) {
			?>	<th colspan="2">Pilihan</th><th ><a href="?page=kategori&aksi=tambah#tambah"><img src="image/ico/tambah.png"></a></th>
				<?php } ?>
		</tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;?><?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '#fff';
			}
			else{ 
				$warna = '#3498db';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[nm_kategori]"; ?></td>
				<?php
						if (isset($_SESSION['admin'])) {
						?>

					<td><a href="?page=kategori&aksi=edit&kode=<?php echo "$tampil[kd_kategori]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit <?php echo "$tampil[nm_kategori]"; ?>"></a></td>
					<td><a href="act/hapus_kategori.php?kode=<?php echo "$tampil[kd_kategori]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[nm_kategori]"; ?>"></a></td>
					<?php
						}
					?>
					</tr>
				<?php
			}
		?>
		<tr><th colspan="<?php if (isset($_SESSION['admin'])) {
			echo "4";
		}else{ echo "2";} ?>" align="left">Jumlah = <?php echo "$cek"; ?> Kategori</th></tr>
	</table>

<!-- TAMBAH -->
	<?php
		if ($_GET['aksi'] == 'tambah') {
			?>
			<div id="tambah">
			<form action="act/tambah_kategori.php" method="post">
				<table>
					<tr><th colspan="2">Form Tambah Kategori</th></tr>
					<tr><td>Nama Kategori</td><td><input type="text" name="nama" placeholder='Nama Kategori'  required></td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Tambah">
					</td></tr>
					<tr><td align="right" colspan="2"><a href="?page=kategori" class="batal">Batal</a></td></tr>
				</table>
			</form>
			</div>
			<?php
		}else{
	if ($_GET['aksi']== 'edit') {
		$get = $_GET['kode'];
		$qw = mysql_query("select * from Kategori where kategori_kode = '$get'");
		$tmpl = mysql_fetch_array($qw);
		?>
					<div id="edit">
						<form action="act/ubah_kategori.php" method="post">
						<table>
							<tr><th colspan="2">Form Ubah Kategori</th></tr>
							<tr><td>Nama Kategori</td><td><input type="text" name="nama" value="<?php echo"$tmpl[nm_kategori]"; ?>" required></td></tr>
							<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
							<tr><td colspan="2" align="right"><a href="?page=kategori"  class="batal">Batal</a></td></tr>
						</table>
						<input type="hidden" value="<?php echo "$tmpl[kd_kategori]"; ?>" name="kode">
						</form>
				</div>
			<?php
			}
		}

	?>



	</center>
</div>

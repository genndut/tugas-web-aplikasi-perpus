<?php
	include"act/koneksi.php";
	$query = mysql_query("SELECT * FROM buku order by jdl_buku asc");
		$cek = mysql_num_rows($query);
?>
<div id="utama">
<center>
	<table>
	<tr><td colspan="8"><h3>DATA BUKU</h3></td>
		</tr>
		<tr>
		<th>No.</th>
		<th>Judul Buku</th>
		<th>Kategori</th>
		<th>Penerbit</th>
		<th>Jumhal</th>
		<th>pengarang</th>
		<th>Tahun Terbit</th>
		<th>Gambar</th>
			<?php
		if (isset($_SESSION['admin'])) {
			?>	<th colspan="2">Pilihan</th><th><a href="?page=buku&aksi=tambah#tambah"><img src="image/ico/tambah.png" title="Tambah Buku"></a></th>
				<?php } 
		if (isset($_SESSION['peminjam'])) {
			?>	<th colspan="2">Pilihan</th>
				<?php } ?>

			</tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;
					$query2 = mysql_query("SELECT * FROM kategori where kategori_kode = '$tampil[kategori_kode]'");
						$kat = mysql_fetch_array($query2);
					$query3 = mysql_query("SELECT * FROM penerbit where penerbit_kode = '$tampil[penerbit_kode]'");
						$pen = mysql_fetch_array($query3);
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
					<td><a href="?page=lihat&kode=<?php echo "$tampil[buku_kode]"; ?>"><?php echo "$tampil[buku_judul]"; ?></a></td>
					<td><?php echo "$kat[kategori_nama]"; ?></td>
					<td><?php echo "$pen[penerbit_nama]"; ?></td>
					<td><?php echo "$tampil[buku_jumhal]"; ?></td>
					<td><?php echo "$tampil[buku_pengarang]"; ?></td>
					<td><?php echo "$tampil[buku_tahun_terbit]"; ?></td>
					<td><?php echo "<img src='act/$tampil[buku_gambar]' width='50px'>"; ?></td>
					<?php
						if (isset($_SESSION['admin'])) {
						?>

					<td><a href="?page=buku&aksi=edit&kode=<?php echo "$tampil[buku_kode]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit Buku <?php echo "$tampil[buku_judul]"; ?>"></a></td>
					<td><a href="act/hapus_buku.php?kode=<?php echo "$tampil[buku_kode]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[buku_judul]"; ?>"></a></td>
				
						<?php
						} if (isset($_SESSION['peminjam'])) {
						?>
							<td><a href="?page=pinjam&kode=<?php echo "$tampil[buku_kode]"; ?>"><img src='image/ico/pinjam.png' title="Pinjam Buku" ></a></td>
						<?php
						}
					?>
					</tr>
				<?php
			}
		?>
		<tr><th colspan="10" align="left">Jumlah = <?php echo "$cek"; ?> Buku</th></tr>
	</table>



	<!-- TAMBAH -->
	<?php
		if ($_GET['aksi'] == 'tambah') {
			?>
			<div id="tambah">
			<form action="act/tambah_buku.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Tambah Buku</th></tr>
					<tr><td>Judul</td><td><input type="text" name="judul" required placeholder='Judul Buku'></td></tr>
					<tr>
						<td>Kategori</td>
						<td>
							<select name="kategori">
							<?php 
								$query4 = mysql_query("SELECT * FROM Kategori order by kategori_nama asc");
								while ($hasil = mysql_fetch_array($query4)) {
							?>
								<option value="<?php echo "$hasil[kategori_kode]"; ?>"><?php echo "$hasil[kategori_nama]"; ?></option>
							<?php
								}
							?>
							</select></td></tr>
					<tr><td>Penerbit</td>
						<td><select name="penerbit">
							<?php 
								$query5 = mysql_query("SELECT * FROM penerbit order by penerbit_nama asc");
								while ($has = mysql_fetch_array($query5)) {
							?>
								<option value="<?php echo "$has[penerbit_kode]"; ?>"><?php echo "$has[penerbit_nama]"; ?></option>
							<?php
								}
							?>
							</select></td></tr>
					<tr><td>Jumlah Halaman</td><td><input type="text" name="jumhal" required placeholder='Jumlah Halaman Buku'></td></tr>
					<tr><td>Pengarang</td><td><input type="text" name="pengarang" required placeholder='Pengarang Buku'></td></tr>
					<tr><td>Tahun Terbit</td><td><input type="text" name="tahun" required placeholder='Tahun Terbit Buku'></td></tr>
					<tr><td>Diskripsi</td><td><textarea name="diskripsi"></textarea></td></tr>
					<tr><td>Gambar</td><td><input type="file" name="gambar"></td></tr>
					<tr><td colspan="2" ><input type="submit" value="Tambah"></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=buku" class="batal" >Batal</a></td></tr>
				</table>
			</form>
			</div>
			<?php
		}else{
	
	if ($_GET['aksi'] == 'edit') {
			$get = $_GET['kode'];
			$qw = mysql_query("SELECT * FROM buku where buku_kode = '$get'");
			$tp = mysql_fetch_array($qw);
		?>
		<div id="edit">
			<form action="act/ubah_buku.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Ubah Data Buku</th></tr>
					<tr>
						<td>Kategori</td>
						<td>
							<select name="kategori">
								<?php
									include"act/koneksi.php";

									$aqq = mysql_query("select * from kategori order by kategori_nama asc");
									$aqq2 = mysql_query("select * from kategori where kategori_kode = '$tp[kategori_kode]'");
									$asf =mysql_fetch_array($aqq2);
										echo "<option value='$tp[kategori_kode]'>$asf[kategori_nama]</option>";
									while ($qqq = mysql_fetch_array($aqq)) {
										echo "<option value='$qqq[kategori_kode]'>$qqq[kategori_nama]</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Penerbit</td>
						<td>
							<select name="penerbit">
								<?php
									include"act/koneksi.php";

									$aqa = mysql_query("select * from penerbit order by penerbit_nama asc");
									$aqa2 = mysql_query("select * from penerbit where penerbit_kode = '$tp[penerbit_kode]'");
									$has22 = mysql_fetch_array($aqa2);
									echo "<option value='$tp[penerbit_kode]'>$has22[penerbit_nama]</option>";
									while ($has = mysql_fetch_array($aqa)) {
										echo "<option value='$has[penerbit_kode]'>$has[penerbit_nama]</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr><td>Judul Buku</td><td><input type="text" name="judul" required value="<?php echo "$tp[buku_judul]"; ?>"></td></tr>
					<tr><td>Jumlah Halaman</td><td><input type="number" name="hal" required value="<?php echo "$tp[buku_jumhal]"; ?>"></td></tr>
					<tr><td>Diskripsi</td><td><textarea name="diskripsi"><?php echo "$tp[buku_diskripsi]"; ?></textarea></td></tr>
					<tr><td>Pengarang Buku</td><td><input type="text" name="pengarang" required value="<?php echo "$tp[buku_pengarang]"; ?>"></td></tr>
					<tr><td>Tahun Terbit</td><td><input type="number" name="tahun" required value="<?php echo "$tp[buku_tahun_terbit]"; ?>"></td></tr>
					<tr><td>Gambar</td><td><img src="act/<?php echo "$tp[buku_gambar]"; ?>" width='100px'><input type="file" name="gambar"></td></tr>
					<tr><td colspan="2"><input type="submit" value="Ubah"></td><td></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=buku" class="batal">Batal</a></td></tr>
				</table>
				<input type="hidden" name="kode_buku"  value="<?php echo "$tp[buku_kode]"; ?>">
			</form>
		</div>
		<?php
		}
		}
?>
	</center>
</div>

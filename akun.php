<?php
	include"act/koneksi.php";
	if (isset($_SESSION['admin'])) {
		$kode  = $_SESSION['admin'];
		$query = mysql_query("SELECT * FROM petugas where username = '$kode' ");
			$tampil = mysql_fetch_array($query);
		?>
		<div id="utama">
			<h3>Data Anda</h3>
			<center>
			<table>
		<tr>
			<td rowspan="5"><img src="act/<?php echo "$tampil[petugas_foto]"; ?>" width='120px'></td>
			<tr><td>Nama</td><td>: <?php echo "$tampil[petugas_nama]"; ?></td></tr>
			<tr><td>Username</td><td>: <?php echo "$tampil[username]"; ?></td></tr>
			<tr><td>Password</td><td>: <?php echo "$tampil[password]"; ?></td></tr>
			<tr><td>Status</td><td>: <?php echo "Admin"; ?></td></tr>
		</tr>
		<tr><th><a href="?page=akun&aksi=edit_petugas&kode=<?php echo "$tampil[petugas_kode]"; ?>">Edit</a></th></tr>
	<?php
	}else{
		if (isset($_SESSION['peminjam'])) {
			$kode  = $_SESSION['peminjam'];
			$query = mysql_query("SELECT * FROM peminjam where username = '$kode' ");
				$tampil = mysql_fetch_array($query);
					// ini untuk menampilkan kartu pendaftarannya. tapi sudah di hapus
					// karena tidak penting
					//$kk = mysql_query("SELECT * FROM kartu_pendaftaran where peminjam_kode = '$tampil[peminjam_kode]'");
						//$kartu = mysql_fetch_array($kk);
				?>
				<div id="utama">
			<center>
			<table>
			<tr><th colspan="3"><h3>Data Anda</h3></th></tr>
		<tr>
			<td rowspan="7"><img src="act/<?php echo "$tampil[peminjam_foto]"; ?>" width='120px'></td>
			<tr><td>Nama</td><td>: <?php echo "$tampil[peminjam_nama]"; ?></td></tr>
			<tr><td>Alamat</td><td>: <?php echo "$tampil[peminjam_alamat]"; ?></td></tr>
			<tr><td>Telp.</td><td>: <?php echo "$tampil[peminjam_telp]"; ?></td></tr>
			<tr><td>Username</td><td>: <?php echo "$tampil[username]"; ?></td></tr>
			<tr><td>Password</td><td>: <?php echo "$tampil[password]"; ?></td></tr>
			<tr><td>Status</td><td>: <?php echo "Peminjam"; ?></td></tr>
			<!-- ini tidak di pakai 
			karerna dbnya sudah di hapus dan berkesan tidak penting
			<tr><td>Kode Kartu Peminjaman</td><td>: <?php echo "$kartu[kartu_barkode]"; ?></td></tr>-->
		</tr>
		<tr><th colspan="3">Buku Yang Anda Pinjam</th></tr>
		<tr><td colspan="3">
		<table>
				<tr><td>No.</td><td>Judul</td><td>Status Penjam</td></tr>
			<?php
				$s = mysql_query("SELECT * FROM peminjaman where peminjam_kode = '$tampil[peminjam_kode]'");
					$c = mysql_num_rows($s);
				while ( $a = mysql_fetch_array($s)) {
						$ad = mysql_query("SELECT * FROM detail_pinjam where peminjaman_kode = '$a[peminjaman_kode]'");
							$asss = mysql_fetch_array($ad);
						$no++;
							$book = mysql_query("SELECT * FROM buku where buku_kode = '$asss[buku_kode]'");
								$bk = mysql_fetch_array($book);
						?>
						<tr><td><?php echo "$no"; ?></td><td><?php echo "$bk[buku_judul]"; ?></td>
						<td>
						<?php
							if ($asss['detail_status_kembali'] == 2) {
								echo "Sudah Dikembalikan";	
							}
							else{
									if ($asss['detail_status_kembali'] == 1) {
									 ?>
										<form action="act/pengembalian.php" class="kembali" method="post">
											<input type="hidden" name="status" value="2">
											<input type="hidden" name="kode" value="<?php echo "$asss[peminjaman_kode]"; ?>">
											<input type="submit" value="Kembalikan">
										</form>
									<?php
								}
									else{
										if ($asss['detail_status_kembali'] == 0) {
											echo "Belum Dikonfirmasi";
										}
									}
							}
						?>
						</td></tr>
					<?php
					}					
			?>
			<tr><th colspan="3">Jumlah : <?php echo "$c"; ?> Buku.</th></tr>
			</table>
		</td></tr>
		<tr><th><a href="?page=akun&aksi=edit_peminjam&kode=<?php echo "$tampil[peminjam_kode]"; ?>">Edit Akun</a></th></tr>
				<?php
			}
	}

	?>
	</table>
	<?php
		if ($_GET['aksi']=='edit_peminjam') {
			$kodead = $_GET['kode'];
			$admini = mysql_query("SELECT * FROM peminjam where peminjam_kode = '$kodead'");
				$adminina = mysql_fetch_array($admini);
	?>
		<div id="edit">
			<form action="act/ubah_peminjam.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2"><h3>Edit Akun Peminjam</h3></th></tr>
					<tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo "$adminina[peminjam_nama]"; ?>"></td></tr>
					<tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo "$adminina[peminjam_alamat]"; ?>"></td></tr>
					<tr><td>Telp.</td><td><input type="text" name="telp" value="<?php echo "$adminina[peminjam_telp]"; ?>"></td></tr>
					<tr><td>Password</td><td><input type="text" name="pas" value="<?php echo "$adminina[password]"; ?>"></td></tr>
					<tr><td>foto</td><td><img src="act/<?php echo "$adminina[peminjam_foto]"; ?>" width='100px'><input type="file" name="gambar" required></td></tr>
					<input type="hidden" name="kode" value="<?php echo "$adminina[peminjam_kode]"; ?>">
					<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
					<tr><td align="right" colspan="2"><a href="?page=akun" class="batal">Batal</a></td></tr>
				</table>				
			</form>	
		</div>
		<?php

			} else{
		?>

		<?php
		if ($_GET['aksi']=='edit_petugas') {
			$kodead = $_GET['kode'];
			$admini = mysql_query("SELECT * FROM petugas where petugas_kode = '$kodead'");
				$adminina = mysql_fetch_array($admini);
	?>
		<div id="edit">
			<form action="act/ubah_admin.php" method="post"  enctype="multipart/form-data">
				<table>
					<tr><th colspan="2"><h3>Edit Akun Admin</h3></th></tr>
					<tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo "$adminina[petugas_nama]"; ?>"></td></tr>
					<tr><td>Password</td><td><input type="text" name="pas" value="<?php echo "$adminina[password]"; ?>"></td></tr>
					<tr><td>foto</td><td><img src="act/<?php echo "$adminina[petugas_foto]"; ?>" width='100px'><input type="file" name="gambar"  required></td></tr>
					<input type="hidden" name="kode" value="<?php echo "$adminina[petugas_kode]"; ?>">
					<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
					<tr><td align="right" colspan="2"><a href="?page=akun" class="batal">Batal</a></td></tr>
				</table>				
			</form>	
		</div>
		<?php

			}
			}
		?>

	</center>
	</div>
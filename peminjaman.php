<?php
include"act/koneksi.php";
$data = mysql_query("SELECT * FROM peminjaman order by kd_peminjaman desc");

?>
<div id="utama">
<center>
<h3>DATA PEMINJAMAN BUKU</h3>
	<table>
			<tr>
				<th>No.</th>
				<th>Judul Buku</th>
				<th>Peminjam</th>
				<th>Tgl Pinjam</th>
				<th>Tgl Harus Kembali</th>
				<th>Tgl Kembali</th>
				<th>Denda</th>
				<th>Status Kembali</th>
			<?php
				if ($_SESSION['peminjam']) {
				?>
				<th>Aksi</th>
				<?php
				}
			?>
			<?php
				if ($_SESSION['admin']) {
				?>
				<th>Aksi</th>
				<?php
				}
			?>
			</tr>
<?php	
	while ($hasil = mysql_fetch_array($data)) {
		$petugas = mysql_query("SELECT * FROM petugas where kd_petugas = '$hasil[kd_petugas]'");
			$c = mysql_fetch_array($petugas);
		$peminjam = mysql_query("SELECT * FROM peminjam where kd_peminjaman = '$hasil[kd_peminjaman]'");
			$d = mysql_fetch_array($peminjam);
		//$detail = mysql_query("SELECT * FROM detail_pinjam where peminjaman_kode = '$hasil[peminjaman_kode]'");
			//$e = mysql_fetch_array($detail);
		$buku = mysql_query("SELECT * FROM buku where kd_buku = '$e[kd_buku]'");
			$b = mysql_fetch_array($buku);

					$tgl1 = $hasil['peminjaman_tgl_hrs_kembali'];
					$tgl2 = $e['detail_tgl_kembali'];

					$pecah1 = intval($pecah['"-",$tgl1']);
					$date1 = $pecah1[2];
					$month1 = $pecah1[1];
					$year1 = $pecah1[0];

					$pecah2 = intval($pecah['"-",$tgl2']);
					$date2 = $pecah2[2];
					$month2 = $pecah2[1];
					$year2 = $pecah2[0];

					$jd1 = gregoriantojd($month1, $date1, $year1);
					$jd2 = gregoriantojd($month2, $date2, $year2);
					$selisih = $jd2-$jd1;
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
			<td><?php echo "$b[jdl_buku]";?></td>
			<td align="center"><?php echo "$d[nm_peminjam]";?></td>
			<td align="center"><?php echo "$hasil[tgl_peminjaman]";?></td>
			<td  align="center"><?php echo "$hasil[peminjaman_tgl_hrs_kembali]"; ?></td>
			<td align="center">
				<?php 
					if ($e['detail_tgl_kembali'] == 00-00-00){
							echo "---"; 
						} else{
							echo "$e[detail_tgl_kembali]";
						}
				?>
			</td>
			<td align="center"><?php 
				if($e['detail_tgl_kembali'] == 00-00-00){
					echo "---";
				}else{
					echo "Rp. $e[detail_denda],00- Telat $selisih Hari";
				}
				?></td>
			<td align="center">
				<?php
					if ($e['detail_status_kembali'] == 0) {
						echo "Belum Dikonfirmasi";
					}
					else{
						if ($e['detail_status_kembali'] == 1) {
							echo "Masih Dipinjam";
						}
						else{
							if ($e['detail_status_kembali'] == 2) {
							?>
								<img src="image/ico/cek.png">
							<?php
							}
						}
					}
				?>
			</td>
			<?php 
				if ($_SESSION['peminjam']) {
					$ii = $_SESSION['peminjam'];
					$as = mysql_query("SELECT * FROM peminjaman where kd_peminjaman = '$hasil[kd_peminjaman]'");
						$ass = mysql_fetch_array($as);
					$i = mysql_query("SELECT * FROM peminjam where username = '$ii'");
						$ttt = mysql_fetch_array($i);
				?>
					<td align="center">
						<?php
						$ppp = $ttt['peminjam_kode'];
						if ($ppp == $ass['peminjam_kode']) {
								 if ($e['detail_status_kembali'] == 0) {
									 echo "Belum Dikonfirmasi";
								}
								 else{
									 if ($e['detail_status_kembali'] == 2) {
									echo "---";
									}
									else{
										if ($e['detail_status_kembali'] == 1) {
										 ?>
										<form action="act/pengembalian.php" class="kembali" method="post">
											<input type="hidden" name="status" value="2">
											<input type="hidden" name="kode" value="<?php echo "$e[kd_peminjaman]"; ?>">
											<input type="submit" value="Kembalikan">
										</form>
									<?php
										}
									}
								}
								
							 }
						else{
								echo "Bukan Anda Yang Pinjam";
						}								
						?>
					</td>
						<?php
				}
					?>


			<?php
				if (isset($_SESSION['admin'])) {
				?>
				<td align="center">
				<?php
					if ($e['detail_status_kembali'] == 0) {
						?>
							<form action="act/konfirmasi.php" method="post">
							<input type="hidden" name="status" value="1">
							<input type="hidden" name="kode" value="<?php echo "$e[kd_peminjaman]"; ?>">
							<input type="submit" value="Komfirmasi">
							</form>
						<?php
					}
					else{
						if ($e['detail_status_kembali'] == 1) {
							echo "Sedang Dipinjam";
						}
						else{
							if ($e['detail_status_kembali'] == 2) {
								?>
								<a href="?page=peminjaman&aksi=hapus&kode=<?php echo "$hasil[kd_peminjaman]"; ?>">Hapus</a>
								<?php
							}
						}
					}
					?>
					</td>
					<?php
				}
			?>
			
		</tr>
<?php
	}
	$cek = mysql_num_rows($data);
	?>
	<tr><th colspan="9" align="left">Jumlah = <?php echo "$cek"; ?> Peminjaman</th></tr>
	</table>
	</center>
	</div>

	<?php
		if ($_GET['aksi']=='hapus') {
			$get = $_GET['kode'];

			$hps = mysql_query("DELETE from peminjaman where kd_peminjaman='$get'");
			echo "<script>window.location=('?page=peminjaman')</script>";
		}
	?>
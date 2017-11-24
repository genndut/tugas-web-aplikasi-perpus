<div id="utama">
<center>
<div class="log2">
<?php
	$tanggal= date('yyyy-mmm-dd');

	$tgl = $tanggal;
	$date = strtotime('+30 day',strtotime($tgl));
	$date = date('yyyy-mmm-dd',$date);

	$query = mysql_query("SELECT * FROM petugas order by kd_petugas");
		
?>
<h3>Daftar Peminjam</h3>

	<form action="act/proses_daftar.php" method="post" enctype="multipart/form-data">
	<table>
	<tr><td>Petugas</td>
	<td>
		<?php
		while ($tampil = mysql_fetch_array($query)) {
		?>
		<select name="petugas">
			<option value="<?php echo "$tampil[kd_petugas]"; ?>"><?php echo "$tampil[nm_petugas]"; ?></option>
		</select>
		<?php
		}
		?>
	</td>
	</tr>
	<tr><td>Nama Anda</td><td><input type="text" name="nama" placeholder="Masukan Nama Anda" required></td></tr>
	<tr><td>Alamat Anda</td><td><input type="text" name="alamat" required placeholder="Masukan Alamat Anda"></td></tr>	
	<tr><td>Telp. Anda</td><td><input type="number" name="tlp" required placeholder="Masukan No Telepon Anda"></td></tr>	
	<tr><td>Username Anda</td><td><input type="text" name="username" required placeholder="Masukan Username Anda"></td></tr>
	<tr><td>Password Anda</td><td><input type="password" name="password" required placeholder="Masukan Password Anda"></td></tr>
	<tr><td>Ulangi Password</td><td><input type="password" name="password2" required placeholder="Ulangi Password"></td></tr>	
	<tr><td>Foto</td><td><input type="file" name="foto" required>
		</td></tr>
	<tr><td colspan="2"><label align='left'><input type="checkbox" name="cek" required>Saya bertanggung jawab atas data yang saya buat ini
		</label><strong><input type="submit" value="Daftar"></strong></td></tr>
		<input type="hidden" name="tgl" value="<?php echo "$tanggal"; ?>">
		<input type="hidden" name="berakhir" value="<?php echo "$date"; ?>">
		<input type="hidden" name="st" value="1">
		
	</table>
	</form>
</div>
</center>

</div>
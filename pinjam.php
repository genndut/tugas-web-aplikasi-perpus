<?php
session_start();
if (!isset($_SESSION['peminjam'])) {
	echo "<script>window.location=('?page=home')</script>";
}
include"act/koneksi.php";
$tanggal = date('Y-m-d');
$kata = $_POST['cari'];
$get = $_GET['kode'];
$pmj = $_SESSION['peminjam'];

$tgl = $tanggal;
$date = strtotime('+3 day',strtotime($tgl));
$date = date('Y-m-d',$date);

$buku = mysql_query("SELECT * FROM buku where buku_kode ='$get' ");
	$hasil = mysql_fetch_array($buku);
$buku2 = mysql_query("SELECT * FROM buku order by buku_judul ");

$petugas = mysql_query("SELECT * FROM petugas");

$peminjam = mysql_query("SELECT * FROM peminjam where username ='$pmj' ");
	$tampil = mysql_fetch_array($peminjam);
?>
<div id="utama">
<center>
<?php
		$kdo_peminjam = $tampil['peminjam_kode'];
	$s = mysql_query("SELECT * FROM peminjaman where peminjam_kode = '$kdo_peminjam'");
					while ($c = mysql_fetch_array($s)) {
						$ad = mysql_query("SELECT * FROM detail_pinjam where peminjaman_kode = '$c[peminjaman_kode]'");
							$asss = mysql_fetch_array($ad);
							$bukunya = $asss['detail_status_kembali'] == '1';
						$sl = mysql_query("SELECT * FROM detail_pinjam where detail_status_kembali = '1' and peminjaman_kode = '$asss[peminjaman_kode]'");
							$jumlahnya = mysql_num_rows($sl);
	 }
	 if ($jumlahnya>=2) {
	 	?>
	 	<table><tr><td>Kembalikan Buku Yang Anda Pinjam, Maksimal Peminjaman adalah 3 buku.</td></tr></table>
	 	<?php
	 } else{
?>
<form action="act/proses_pinjam.php" method="post">
	<table>
	<tr><td colspan="2"><h3>PENGISIAN DATA PEMINJAMAN BUKU</h3></td></tr>
		<tr>
			<td>Buku</td>
			<?php
			if ($_GET['kode'] ) {
			?>
				<td><input name="buku" type="hidden" value="<?php echo "$hasil[buku_kode]"; ?>"><?php echo "$hasil[buku_judul]"; ?></td>
			<?php
			}
			else{
			?>
			<td>
				<select name="buku">
					<?php
						while ($kode_buku = mysql_fetch_array($buku2)) {
					?>
						<option value="<?php echo "$kode_buku[buku_kode]"; ?>"><?php echo "$kode_buku[buku_judul]"; ?></option>
					<?php
						}
					?>
				</select>
			</td>
			<?php
				}
			?>
		</tr>
		<tr><td>Petugas</td>
			<td>
				<select name="petugas">
					<?php
						while ($ptg = mysql_fetch_array($petugas)) {
					?>
						<option value="<?php echo "$ptg[petugas_kode]"; ?>"><?php echo "$ptg[petugas_nama]"; ?></option>
					<?php
						}
					?>
				</select>		
			</td>
		</tr>
		<tr>
			<td>Kode Peminjam</td><td><input type="hidden" name="peminjam" value="<?php echo "$tampil[peminjam_kode]"; ?>"><?php echo "$tampil[peminjam_nama]"; ?></td>
		</tr>
		<input type="hidden" name="tgl_pinjam" value="<?php echo "$tanggal"; ?>">
		<tr><td>Tanggal Harus Kembali</td><td><input type="hidden" name="tgl_kembali" value="<?php echo "$date"; ?>"><?php echo "$date"; ?></td></tr>
		<tr><td colspan="2" align="left"><label class="setuju"><input type="checkbox" required> Saya setuju</label></td></tr>
		<tr><th colspan="2"><input type="submit" value="Pinjam"></th></tr>
	</table>
</form>
<?php
	}
?>
</center>
</div>
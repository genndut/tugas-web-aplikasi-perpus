<?php
	session_start();
	include"act/koneksi.php";
?>
<html>
	<head><title>PERPUSTAKAAN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<div id='menu'>
		<hr color='#3498DB' size="2">
			<div class="logo">
				<a href="?page=home"><h3>PERPUSTAKAAN</h3></a>
			</div>
			<ul>
				<!-- <li><a href=""><img src="image/ico/menu.png"></a> -->
					<!-- <ul class="b"> -->
			<?php
				if (isset($_SESSION['admin'])) { 
						$aa = mysql_query("SELECT * FROM petugas where username = '$_SESSION[admin]'");
							$tr = mysql_fetch_array($aa);
					?><li><a href=""><img src="act/<?php echo "$tr[petugas_foto]"; ?>" width='23px'><?php echo "Hay $tr[username]"; ?></a>
					<ul class="b">
					<li><img src="image/ico/gear.png" align="left"><a href="?page=akun&kode=<?php echo "$tr[petugas_kode]"; ?>">Akun</a></li>
					<li><img src="image/ico/logout.png" align="left"><a href="?page=logout">Logout</a></li>
			<?php }else{
				if (isset($_SESSION['peminjam'])) { 
					$ab = mysql_query("SELECT * FROM peminjam where username = '$_SESSION[peminjam]'");
							$to = mysql_fetch_array($ab);
					?>
						<li><a href=""><img src="act/<?php echo "$to[peminjam_foto]"; ?>" width='23px'><?php echo "Hay $to[username]"; ?></a>
					<ul class="b">
					<li><img src="image/ico/book.png" align="left"><a href='?page=pinjam'>Pinjam Buku</a></li>
					<li><img src="image/ico/gear.png" align="left"><a href="?page=akun&kode=<?php echo "$to[peminjam_kode]"; ?>">Akun</a></li>
					<li><img src="image/ico/logout.png" align="left"><a href="?page=logout">Logout</a></li>
			<?php }else{
			?>			
						<li><a href=""><img src="image/ico/menu.png"></a>
					<ul class="b">
						<li><a href="?page=login"><img src="image/ico/admin.png" align="left">Login</a></li>
						<li><a href="?page=daftar"><img src="image/ico/daftar.png" align="left">Daftar</a></li>
			<?php
				} }  ?>
					</ul>
				</li>
				<strong>
				<li><a href="?page=home" <?php if ($_GET['page']==home) {
				?>
					class="active"
				<?php
				} ?> >Home</a></li>
				<li><a href="?page=buku" <?php if ($_GET['page']==buku) {
				?>
					class="active"
				<?php
				} ?> >Buku</a></li>
				<li><a href="?page=kategori" <?php if ($_GET['page']==kategori) {
				?>
					class="active"
				<?php
				} ?> >Kategori</a></li>
				<li><a href="?page=penerbit" <?php if ($_GET['page']==penerbit) {
				?>
					class="active"
				<?php
				} ?> >Penerbit</a></li>
				<li><a href="" <?php if ($_GET['page']==peminjam) {
				?>
					class="active"
				<?php
				} else{ if ($_GET['page']==peminjaman) {
				?>
					class="active"
				<?php
				} } ?> >Peminjaman</a></strong>
					<ul>
						<li><a href="?page=peminjam"><img src="image/ico/minjam.png" align="left">Peminjam</a></li>
						<li><a href="?page=peminjaman"><img src="image/ico/book.png" align="left">Peminjaman</a></li>
					</ul>
				</li>
			</ul>
			<div class="kanan">
				<form action="?page=cari" method="post" class="cari">
					<input type="text" name="cari" placeholder="cari disini" required>
					<input type="submit" value="">
				</form>
			</div>
		</div>

		<div id='awal'>


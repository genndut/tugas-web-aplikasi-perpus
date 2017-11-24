<?php
$page=(isset($_GET['page']))?$_GET['page']:'home';
switch ($page) {
	case 'buku':include"buku.php";break;
	case 'kategori':include"kategori.php";break;
	case 'penerbit':include"penerbit.php";break;
	case 'peminjam':include"peminjam.php";break;
	case 'cari':include"proses_cari.php";break;
	case 'peminjaman':include"peminjaman.php";break;
	case 'login':include"login.php";break;
	case 'logout':include"logout.php";break;
	case 'pinjam':include"pinjam.php";break;
	case 'akun':include"akun.php";break;
	case 'lihat':include"tampil_buku.php";break;
	case 'daftar':include"daftar_peminjam.php";break;
	case 'home':default:include"home.php";break;
}
?>
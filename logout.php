<?php
if (isset($_SESSION['admin'])) {
	session_start('admin');
	unset($_SESSION['admin']);
}else{
	if (isset($_SESSION['peminjam'])) {
		session_start('peminjam');
		unset($_SESSION['peminjam']);
	}
}
		echo"<script>;
		window.location=('?page=home')</script>";
?>
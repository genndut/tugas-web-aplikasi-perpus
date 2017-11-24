<?php
		session_start();
		include"koneksi.php";
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$tlp = $_POST['tlp'];
		$user1 = $_POST['username'];
		$ps = $_POST['password'];
		$ps2 = $_POST['password2'];

		$tgl = $_POST['tgl'];
		$berakhir = $_POST['berakhir'];
		$status = $_POST['st'];
		$petugas = $_POST['petugas'];

		$foto ="upload/".$_FILES['foto']['name'];

		if ($ps <> $ps2) {
			echo "<script>window.alert('password tidak sama');
			window.location=('../?page=daftar')</script>";
		}
		else{
			move_uploaded_file($_FILES['foto']['tmp_name'],"upload/".basename($_FILES['foto']['name']));
		$que = mysql_query("INSERT INTO peminjam (peminjam_nama, peminjam_alamat, peminjam_telp, peminjam_foto, username, password) VALUES ('$nama','$alamat','$tlp','$foto','$user1','$ps')") ;
			
			if ($que) {
			$quey = mysql_query("SELECT * FROM peminjam where username = '$user1'");
				$tp = mysql_fetch_array($quey);
			$_SESSION['peminjam'] = $tp['username'];
					
					$row = $tp[count($tp)-1];
					$rows = $tp['peminjam_kode'];
				$proses = mysql_query("INSERT INTO kartu_pendaftaran (petugas_kode, peminjam_kode, kartu_tgl_pembuatan, kartu_tgl_akhir, kartu_status_aktif) values ('$petugas', '$rows', '$tgl','$berakhir', '$status')");
		
			echo"<script>window.alert('Pendaftaran Sukses');
			window.location=('../?halaman=home')</script>";
		}
		else{
			echo"<script>window.alert('Pendaftaran gagal');
			window.location=('../?halaman=home')</script>";
		}	

		}
		
	?>
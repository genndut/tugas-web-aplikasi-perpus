<?php
	include"koneksi.php";
	$tgl_k = date('Y-m-d');
	$status = $_POST['status'];
	$kode = $_POST['kode'];

	$cek = mysql_query("SELECT * FROM peminjaman where peminjaman_kode = '$kode'");
		$t = mysql_fetch_array($cek);
	
	$tgl1 = $t['peminjaman_tgl_hrs_kembali'];
	$tgl2 = $tgl_k;

	$pecah1 = explode("-",$tgl1);
	$date1 = $pecah1[2];
	$month1 = $pecah1[1];
	$year1 = $pecah1[0];

	$pecah2 = explode("-",$tgl2);
	$date2 = $pecah2[2];
	$month2 = $pecah2[1];
	$year2 = $pecah2[0];

	$jd1 = GregorianToJD($month1, $date1, $year1);
	$jd2 = GregorianToJD($month2, $date2, $year2);
	$selisih = $jd2-$jd1;
	$d = $selisih*1000;


			if ($jd2 >= $jd1) {
				$denda = $d ;
			}
			else{
				$denda = 0;
			}


	$proses = mysql_query("UPDATE detail_pinjam set detail_tgl_kembali='$tgl_k', detail_denda='$denda', detail_status_kembali='$status' where peminjaman_kode = '$kode'");
	echo "<script>window.location=('../?page=peminjaman')</script>";
?>
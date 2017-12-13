<?php
	error_reporting("E_ALL ^ E_NOTICE");
	include ("koneksi/connection.php");
	include ("controller/controller.php");

	$id = $_POST['id'];
	$uang_makan = $_POST['uang_makan'];
	$bonus = $_POST['bonus'];
	$kasbon = $_POST['kasbon'];
	$banyak1 = $_POST['banyak1'];
	$banyak2 = $_POST['banyak2'];
	$banyak3 = $_POST['banyak3'];
	$namabarang1 = $_POST['namabarang1'];
	$namabarang2 = $_POST['namabarang2'];
	$namabarang3 = $_POST['namabarang3'];
	$harga1 = $_POST['harga1'];
	$harga2 = $_POST['harga2'];
	$harga3 = $_POST['harga3'];
	$gaji = $uang_makan + $bonus - $kasbon;
	$jumlah1 = $banyak1*$harga1;
	$jumlah2 = $banyak2*$harga2;
	$jumlah3 = $banyak3*$harga3;
	$jumlah_total = $jumlah1 + $jumlah2 + $jumlah3;
	$gaji_total = $gaji + $jumlah_total;

	update_and_insert_data_gaji_karyawan_admin($id,$uang_makan,$bonus,$kasbon,$banyak1,$banyak2,$banyak3,$namabarang1,$namabarang2,$namabarang3,$harga1,$harga2,$harga3,$jumlah1,$jumlah2,$jumlah3,$jumlah_total,$gaji,$gaji_total);
?>
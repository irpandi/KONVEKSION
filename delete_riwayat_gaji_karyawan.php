<?php
	//koneksi ke database
	include ("koneksi/connection.php");

	//koneksi ke contorller.php
	include ("controller/controller.php");

	//mengambil url  dari riwayat.penggajian(admin).php
	$id = $_GET['id'];


	//memannggil fungsi dari controller.php
	delete_data_riwayat_gaji_karyawan($id);
?>
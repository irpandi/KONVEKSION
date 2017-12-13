<?php
	//koneksi ke database
	include ("koneksi/connection.php");

	//koneksi ke controller.php
	include ("controller/controller.php");

	//mengambil url dari data-gaji-karyawan(admin).php
	$id = $_GET['id'];

	//memanggil fungsi dari controller.php
	delete_data_gaji_karyawan_admin($id);
?>
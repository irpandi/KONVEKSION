<?php
	//koneksi ke database
	include ("koneksi/connection.php");
	//koneksi ke contoroller fungsi php
	include ("controller/controller.php");

	//mengambil url id dari data-karyawan(admin).php
	$id = $_GET['id'];

	//fungsi yg dipanggil dari controller.php
	delete_data_karyawan_admin($id);
?>
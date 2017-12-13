<?php
	function update_and_insert_data_gaji_karyawan_admin($id,$uang_makan,$bonus,$kasbon,$banyak1,$banyak2,$banyak3,$namabarang1,$namabarang2,$namabarang3,$harga1,$harga2,$harga3,$jumlah1,$jumlah2,$jumlah3,$jumlah_total,$gaji,$gaji_total){ //fungsi untuk mengupdate sekaligus insert dengan paramater untuk data-gaji-karyawan(admin).php
		include ("koneksi/connection.php"); //koneksi ke database

		//quer untuk update
		$query_update = mysqli_query($connect, "UPDATE tbl_data SET uang_makan='$uang_makan', bonus='$bonus', kasbon='$kasbon',banyak_1='$banyak1', banyak_2='$banyak2', banyak_3='$banyak3', nama_barang_1='$namabarang1', nama_barang_2='$namabarang2', nama_barang_3='$namabarang3', harga_1='$harga1', harga_2='$harga2', harga_3='$harga3', jumlah_1='$jumlah1', jumlah_2='$jumlah2', jumlah_3='$jumlah3', jumlah_total='$jumlah_total', gaji='$gaji', gaji_total='$gaji_total' WHERE id_karyawan='$id'");

		//query untuk insert
		$query_insert = mysqli_query($connect, "INSERT INTO tbl_riwayat SET id_karyawan='$id',tanggal = NOW(), uang_makan='$uang_makan', bonus='$bonus', kasbon='$kasbon',banyak_1='$banyak1', banyak_2='$banyak2', banyak_3='$banyak3', nama_barang_1='$namabarang1', nama_barang_2='$namabarang2', nama_barang_3='$namabarang3', harga_1='$harga1', harga_2='$harga2', harga_3='$harga3', jumlah_1='$jumlah1', jumlah_2='$jumlah2', jumlah_3='$jumlah3', jumlah_total='$jumlah_total', gaji='$gaji', gaji_total='$gaji_total'");

		if($query_update && $query_insert){ //jika query update dan insert berhasil
			echo "<script>alert('Data Berhasil DiUpdate'); window.location='data-gaji-karyawan(admin).php'; </script>";
		}else{ //jika gagal
			echo "<script>alert('Data gagal Diubah'); window.location='data-gaji-karyawan(admin).php'; </script>";
		}
	}

	function delete_data_karyawan_admin($id){ //fungsi untuk delete data-karyawan(admin).php dengan parameter id.
	include ("koneksi/connection.php"); //koneksi ke database
	
	//query
	$sql = mysqli_query($connect, "SELECT * FROM tbl_data WHERE id_karyawan = '$id'");
	$fetch = mysqli_fetch_array($sql);
	unlink("images/".$fetch['foto']);

	$query = mysqli_query($connect, "DELETE FROM tbl_data WHERE id_karyawan = '$id'");

		if($query){ //jika query berhasil
			echo "<script>alert('Data sudah dihapus'); window.location = 'data-karyawan(admin).php'; </script>";
		}else{ //jika query gagal
			echo "<script>alert('Data gagal dihapus'); window.location = 'data-karyawan(admin).php'; </script>";
		}	
	}

	function delete_data_gaji_karyawan_admin($id){ //fungsi untuk delete data-gaji-karyawan(admin).php dengan parameter id
	include ("koneksi/connection.php"); //koneksi ke database

	//query
	$query = mysqli_query($connect, "DELETE FROM tbl_data WHERE id_karyawan = '$id'");

		if($query){ //jika query berhasil
			echo "<script>alert('Data sudah dihapus'); window.location = 'data-gaji-karyawan(admin).php'; </script>";
		}else{ //jika gagal
			echo "<script>alert('Data gagal dihapus'); window.location = 'data-gaji-karyawan(admin).php'; </script>";
		}	
	}

	function delete_data_riwayat_gaji_karyawan($id){ //fungsi untuk delete di riwayat-penggajian(admin).php dengan parameter id
	include ("koneksi/connection.php"); //koneksi ke database

	//query
	$query = mysqli_query($connect, "DELETE FROM tbl_riwayat WHERE id_riwayat = '$id'");

		if($query){ //jika query berhasil
			echo "<script>alert('Data sudah dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
		}else{ //jika query gagal
			echo "<script>alert('Data gagal dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
		}
	}
?>
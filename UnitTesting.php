<?php
	class UnitTesting{
		public function select(){
			include "koneksi/connection.php";
			$sql = "SELECT * FROM tbl_data";
			$query = mysqli_query($connect,$sql);

			if($query)
				return false;
			else
				return true;
		}

		public function delete_data($id){

		include ("koneksi/connection.php");

		$query = mysqli_query($connect, "DELETE FROM tbl_riwayat WHERE id_karyawan = '$id'");

			if($query){ //jika query berhasil
				return false;
				//echo "<script>alert('Data sudah dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
			}else{ //jika query gagal
				return true;
				//echo "<script>alert('Data gagal dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
			}
		}

		public function update_and_insert_data_gaji_karyawan_admin($id,$uang_makan,$bonus,$kasbon,$banyak1,$banyak2,$banyak3,$namabarang1,$namabarang2,$namabarang3,$harga1,$harga2,$harga3,$jumlah1,$jumlah2,$jumlah3,$jumlah_total,$gaji,$gaji_total){ //fungsi untuk mengupdate sekaligus insert dengan paramater untuk data-gaji-karyawan(admin).php
		include ("koneksi/connection.php"); //koneksi ke database

		//quer untuk update
		$query_update = mysqli_query($connect, "UPDATE tbl_data SET uang_makan='$uang_makan', bonus='$bonus', kasbon='$kasbon',banyak_1='$banyak1', banyak_2='$banyak2', banyak_3='$banyak3', nama_barang_1='$namabarang1', nama_barang_2='$namabarang2', nama_barang_3='$namabarang3', harga_1='$harga1', harga_2='$harga2', harga_3='$harga3', jumlah_1='$jumlah1', jumlah_2='$jumlah2', jumlah_3='$jumlah3', jumlah_total='$jumlah_total', gaji='$gaji', gaji_total='$gaji_total' WHERE id_karyawan='$id'");

		//query untuk insert
		$query_insert = mysqli_query($connect, "INSERT INTO tbl_riwayat SET id_karyawan='$id',tanggal = NOW(), uang_makan='$uang_makan', bonus='$bonus', kasbon='$kasbon',banyak_1='$banyak1', banyak_2='$banyak2', banyak_3='$banyak3', nama_barang_1='$namabarang1', nama_barang_2='$namabarang2', nama_barang_3='$namabarang3', harga_1='$harga1', harga_2='$harga2', harga_3='$harga3', jumlah_1='$jumlah1', jumlah_2='$jumlah2', jumlah_3='$jumlah3', jumlah_total='$jumlah_total', gaji='$gaji', gaji_total='$gaji_total'");

			if($query_update && $query_insert){ //jika query update dan insert berhasil
				//echo "<script>alert('Data Berhasil DiUpdate'); window.location='data-gaji-karyawan(admin).php'; </script>";
				return true;
			}else{ //jika gagal
				//echo "<script>alert('Data gagal Diubah'); window.location='data-gaji-karyawan(admin).php'; </script>";
				return false;
			}
		}
	}
?>